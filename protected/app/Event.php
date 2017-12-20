<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
	protected $primaryKey = 'id';
    protected $fillable = ['name','status','startevent','endevent','alamat','gedung','gedung_id','keterangan','paket_id','kostum_id','klien_id','user_id'];

    public function User()
    {
    	return $this -> belongsTo('App\User', 'user_id', 'id');
    }

    public function Paket()
    {
    	return $this -> belongsTo('App\Paket', 'paket_id', 'id');
    }

    public function Klien()
    {
    	return $this -> belongsTo('App\Klien', 'klien_id', 'id');
    }

    public function Kostum()
    {
    	return $this -> belongsTo('App\Kostum', 'kostum_id', 'id');
    }

    public function Gedung()
    {
        return $this -> belongsTo('App\Gedung', 'gedung_id', 'id');
    }
}
