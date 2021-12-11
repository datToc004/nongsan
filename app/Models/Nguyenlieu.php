<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nguyenlieu extends Model
{
    protected $table = 'nguyenlieu';

	protected $fillable = ['sanpham_id','monngon_id'];

	public $timestamps = false;
}
