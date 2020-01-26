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
        $data = [
            "name" => Auth::user()->name,
            "page" => "contacts",
            "page_title" => "My Contacts",
        ];
        // print_r($data);die;
        return view('contacts')->with($data);
    }

    public function addClient(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->client_name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->user_id = Auth::id();
        $contact->save();

    }

}
