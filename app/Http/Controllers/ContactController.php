<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;
class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        ini_set('memory_limit', '-1');
    }

    public function index()
    {
        $contact = new Contact;
        $contacts = $contact->getContacts(Auth::id());
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
        $contact = new Contact;
        $status = $contact->addContact($request->client_name,$request->email,$request->mobile,Auth::id());
        if ($status !== true) {
            return response()->json([
                "status" => 0,
                "message" => "Email Already Exists",
                'error' => $status,
             ]);
        }
        return response()->json([
            "status" => 1,
            "message" => "Contact Added Successfully",
           
         ]);
    }
    public function editContact(Request $request)
    {
        $contact = new Contact;
        $status = $contact->editContact($request->client_name,$request->email,$request->number,$request->id);
        if ($status !== true) {
            return response()->json([
                "status" => 0,
                "message" => "Opps! Something went wrong",
                'error' => $status,
             ]);
        }
        return response()->json([
            "status" => 1,
            "message" => "Contact Updated Successfully",
           
         ]);
    }public function deleteContact(Request $request)
    {
        $contact = new Contact;
        $status = $contact->deleteContact($request->id);
        if ($status !== true) {
            return response()->json([
                "status" => 0,
                "message" => "Opps! Something went wrong",
                'error' => $status,
             ]);
        }
        return response()->json([
            "status" => 1,
            "message" => "Contact Deleted Successfully",
           
         ]);
    }


}
