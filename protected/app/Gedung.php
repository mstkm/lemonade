<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $table = 'gedungs';
	protected $primaryKey = 'id';
    protected $fillable = ['name','alamat','keterangan'];
}
