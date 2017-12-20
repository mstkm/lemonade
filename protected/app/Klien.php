<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'kliens';
	protected $primaryKey = 'id';
    protected $fillable = ['phone','alamat','user_id'];

    public function User()
    {
    	return $this -> belongsTo('App\User', 'user_id', 'id');
    }
}
