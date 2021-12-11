<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhom extends Model
{
    protected $table="nhom";

    protected $fillable = ['nhom_ten','nhom_mo_ta','nhom_url','nhom_anh'];

	public $timestamps = false;

    public function sanphams()
    {
        return $this->hasManyThrough(Sanpham::class, Loaisanpham::class);
    }
}
