<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos';
	protected $primaryKey = 'id';
    protected $fillable = ['name','artikel_id'];

    public function Artikel()
    {
    	return $this -> belongsTo('App\Artikel', 'artikel_id', 'id');
    }
}
