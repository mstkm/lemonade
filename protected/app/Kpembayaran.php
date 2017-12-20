<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kpembayaran extends Model
{
    protected $table = 'kpembayarans';
	protected $primaryKey = 'id';
    protected $fillable = ['name','nominal','tanggal','cara','foto','event_id'];

    public function Event()
    {
    	return $this -> belongsTo('App\Event', 'event_id', 'id');
    }
}
