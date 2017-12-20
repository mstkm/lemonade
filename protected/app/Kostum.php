<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kostum extends Model
{
    protected $table = 'kostums';
	protected $primaryKey = 'id';
    protected $fillable = ['name','foto','keterangan'];

}
