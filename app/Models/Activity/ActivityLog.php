<?php

namespace App\Models\Activity;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $primaryKey='ActivityLog_ID';
}

public function ActvityTypeData(){
	return $this->belongsTo('App\Models\Activity\ActivityLog', 'ActivityType_ID');
}
