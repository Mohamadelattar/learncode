<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
    	'title',
    	'link',
    ];

    public function course() {
    	return $this->belongsTo('App\Course');
    }

}
