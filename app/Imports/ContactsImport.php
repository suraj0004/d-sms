<?php

namespace App\Imports;

use App\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Auth;
class ContactsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (count($row) < 2) {
            return;
        }
        if (empty($row)) {
            return;
        }
        if (empty($row[0]) || empty($row[1]) ) {
            return;
        }
        $user_id = Auth::id();
        $conflict = Contact::withTrashed()->where('email',$row[1])->where('user_id',$user_id)->exists();
        if($conflict){
            Contact::withTrashed()->where('email',$row[1])->where('user_id',$user_id)->forceDelete(); 
        }
        
            return new Contact([
                'name'     => $row[0],
                'email'    => $row[1],
                'mobile'    => isset($row[2])?$row[2]:0,
                'user_id' => $user_id,
            ]);
        
    }
}
