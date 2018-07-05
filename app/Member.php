<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     protected $table = 'members';
     protected $fillable = ['nama','nis','jurusan','no_hp','alamat'];
     public $timestamps = true;

	}