<?php

namespace App\Models\Sensor;

use Illuminate\Database\Eloquent\Model;

class SensorValue extends Model
{
    protected $primaryKey='SensorValue_ID';
    public $timestamps = false;

    protected $fillable=['Sensor_ID', 'QuantityValue_ID', 'Member_ID' , 'SValue', 'Timestamp'];
}
