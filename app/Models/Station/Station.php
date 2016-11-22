<?php

namespace App\Models\Station;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $primaryKey='Station_ID';
    public $timestamps = false;


//belongsto
public function CountryData(){
	return $this->belongsTo('Country', 'Country_ID');
}










}