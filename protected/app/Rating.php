<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
	protected $primaryKey = 'id';
    protected $fillable = ['comment','rate','event_id','is_show','is_deleted'];
}
