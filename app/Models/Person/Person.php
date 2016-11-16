<?php

namespace App\Models\Person;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table = 'persons';
    protected $primaryKey='Person_ID';
    //public $timestamps = false;
}
