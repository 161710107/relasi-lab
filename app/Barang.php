<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $table = 'barangs';
     protected $fillable = ['nama_barang','persediaan','kodisi'];
     public $timestamps = true;

	}
