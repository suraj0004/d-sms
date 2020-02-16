<?php

namespace App\Http\Controllers;

use App\SingleMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SingleMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            "base_page" => "mail",
            "page" => "single mail",
            "page_title" => "Compose Single Mail",
            "contacts" => $contacts,
        ];
        // print_r($data);die;
        return view('single_mail')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SingleMail  $singleMail
     * @return \Illuminate\Http\Response
     */
    public function show(SingleMail $singleMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SingleMail  $singleMail
     * @return \Illuminate\Http\Response
     */
    public function edit(SingleMail $singleMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SingleMail  $singleMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SingleMail $singleMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SingleMail  $singleMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(SingleMail $singleMail)
    {
        //
    }
}
