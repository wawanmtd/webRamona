<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Person\Person;

class Member extends Model
{
    protected $primaryKey='Member_ID';
    //public $timestamps = false;

    public function AreaData(){
	return $this->hasMany('Area', 'Member_ID');
}

    public function PersonData(){

    	return $this->BelongsTo('App\Models\Person\Person', 'Person_ID');
    }
    public function MemberRoleData(){
    	return $this->BelongsTo('App\Models\Member\MemberRole', "MemberRole_ID");
    }

}
