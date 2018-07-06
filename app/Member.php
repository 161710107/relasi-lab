<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     protected $table = 'members';
     protected $fillable = ['nama','nis','jurusan','no_hp','alamat'];
     public $timestamps = true;
 public function Barang() 
    {
return $this->belongsToMany('App\Barang', 'peminjams', 'id_member', 'id_barang');
    }
}
