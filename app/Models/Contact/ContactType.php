<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $primaryKey='ContactType_ID';
    public $timestamps = false;


public function PersonContactData(){
	return $this->hasMany('PersonContact', 'ContactType_ID');
}




















}