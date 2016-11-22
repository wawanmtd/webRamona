<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $primaryKey='Vendor_ID';
    public $timestamps = false;

//belongsto
public function CountryData(){
	return $this->belongsTo('Country', 'Country_ID');
}

















}
