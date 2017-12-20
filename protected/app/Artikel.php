<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';
	protected $primaryKey = 'id';
    protected $fillable = ['name','url','keterangan','user_id'];

    public function User()
    {
    	return $this -> belongsTo('App\User', 'user_id', 'id');
    }
}
