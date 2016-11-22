<?php

namespace App\Models\Activity;

use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    protected $primaryKey='ActivityType_ID';

    public $timestamps = false;
}

public function ActvityLogData(){
	return $this->hasOne('App\Models\Activity\ActivityLog', 'ActivityType_ID');
}
