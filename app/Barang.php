<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $table = 'barangs';
     protected $fillable = ['nama_barang','persediaan','kondisi'];
     public $timestamps = true;
  public function Member() 
    {
		return $this->belongsToMany('App\Member', 'peminjams', 'id_barang', 'id_member');
}
}


