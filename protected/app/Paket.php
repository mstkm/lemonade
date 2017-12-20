<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'pakets';
	protected $primaryKey = 'id';
    protected $fillable = ['name','harga','keterangan'];
}
