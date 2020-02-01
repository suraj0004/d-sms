<?php

namespace App\Exports;

use App\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Auth;
class ContactsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user_id = Auth::id();
        return Contact::select('name','email','mobile')->where('user_id',$user_id)->get();
    }
}
