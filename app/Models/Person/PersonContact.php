<?php

namespace App\Models\Person;

use Illuminate\Database\Eloquent\Model;

class PersonContact extends Model
{
    protected $primaryKey='PersonContact_ID';
    public $timestamps = false;


public function ContactTypeData(){
	return $this->BelongsTo('ContactType', 'ContactType_ID');
}
























}