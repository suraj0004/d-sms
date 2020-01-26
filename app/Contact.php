<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
class Contact extends Model
{
    use SoftDeletes;
    public function getContacts($user_id)
    {
        return $this::where('user_id',$user_id)->orderBy('created_at', 'desc')->get();
    }
    public function addContact($name,$email,$mobile,$user_id)
    {
        try {
            $this->name = $name;
            $this->email = $email;
            $this->mobile = $mobile;
            $this->user_id = $user_id;
            $this->save();
            return true;
        } catch (Exception $e) {
           return $e->getMessage();
        }
    }
    public function editContact($name,$email,$mobile,$customer_id)
    {
        try {
            $contact = $this::findOrFail($customer_id);
            $contact->name = $name;
            $contact->email = $email;
            $contact->mobile = $mobile;
            $contact->save();
            return true;
        } catch (Exception $e) {
           return $e->getMessage();
        }
    }

    public function deleteContact($customer_id)
    {
        try {
            $contact = $this::findOrFail($customer_id);
            $contact->delete();
            return true;
        } catch (Exception $e) {
           return $e->getMessage();
        }
    }
   
}
