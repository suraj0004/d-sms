<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Contact;
use Exception;
use App\Exports\ContactsExport;
use App\Imports\ContactsImport;
use Maatwebsite\Excel\Facades\Excel;
class ContactController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
        ini_set('memory_limit', '-1');
       
    }

    public function index()
    {
        
        $user_id = Auth::id();
        $contacts = User::findOrFail($user_id)->contacts()->orderBy('created_at','desc')->get();
        $data = [
            "name" => Auth::user()->name,
            "page" => "contacts",
            "page_title" => "My Contacts",
            "contacts" => $contacts,
        ];
        // print_r($data);die;
        return view('contacts')->with($data);
    }

    public function addContact(Request $request)
    {
        $user_id = Auth::id();
        $error = Contact::where('email',$request->email)->exists();
        if($error){
            return response()->json([
                "status" => 0,
                "message" => "Email Already Exists",
             ]);
        }
        $contact = new Contact;
        $contact->name = $request->client_name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;

        $user = User::findOrFail($user_id);
        try{
            $user->contacts()->save($contact);
            return response()->json([
                "status" => 1,
                "message" => "Contact Added Successfully",
                "data" => [
                    "name" => $request->client_name,
                    "email" => $request->email,
                    "mobile" => $request->mobile,
                    "saved_on" => date("Y-m-d H:i:s"),
                    "id" => $contact->id
                ] 
             ]);
        }
        catch(Exception $e){
            return response()->json([
                "status" => 0,
                "message" => "Opps! Something went wrong",
                'error' => $e->getMessage(),
             ]);
        }
      
    }
    public function editContact(Request $request)
    {
        $contact =  Contact::findOrFail($request->id);
        if (Auth::id() !== $contact->user_id ) {
            return response()->json([
                "status" => 0,
                "message" => "Unauthorise Access",
             ]);
        }
        $contact->name = $request->client_name;
        $contact->email = $request->email;
        $contact->mobile = $request->number;

        try{
            $contact->save();
            return response()->json([
                "status" => 1,
                "message" => "Contact Added Updated", 
             ]);
        }
        catch(Exception $e){
            return response()->json([
                "status" => 0,
                "message" => "Opps! Something went wrong",
                'error' => $e->getMessage(),
             ]);
        }
    }
    
    public function deleteContact(Request $request)
    {
         try{
            Contact::destroy($request->id);
            return response()->json([
                "status" => 1,
                "message" => "Contact Deleted Successfully", 
             ]);
        }
        catch(Exception $e){
            return response()->json([
                "status" => 0,
                "message" => "Opps! Something went wrong",
                'error' => $e->getMessage(),
             ]);
        }

    }



    public function importContacts() 
    {
        // try {
            Excel::import(new ContactsImport,request()->file('file'));
            return response()->json([
                "status" => 1,
                "message" => "Congrats! Clients imported successfully.",
               
             ]);
        // } catch (Exception $e) {
        //     return response()->json([
        //         "status" => 0,
        //         "error" => "Opps! Something went wrong",
        //         'message' => $e->getMessage(),
        //      ]);
        // }
        
      
    }

    public function exportContacts() 
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }

}
