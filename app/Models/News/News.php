<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'News_ID';
    protected $table = 'news';


    //belongs
    public function MemberData(){
    	return $this->BelongsTo('App\Models\Member\Member','Member_ID');
    }
    public function NewsTypeData(){
    	return $this->BelongsTo('App\Models\News\NewsType','NewsType_ID');
    }








}
