<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table = "sanpham";

    protected $fillable = ['id','sanpham_ky_hieu','sanpham_ten','sanpham_url','sanpham_anh','sanpham_mo_ta','loaisanpham_id','sanpham_khuyenmai','donvitinh_id'];

	public $timestamps = true;

    public function loaisanpham()
    {
        return $this->belongsTo(Loaisanpham::class);
    }

    public function hinhanhs()
    {
        return $this->hasMany(Hinhsanpham::class);
    }

    public function lohang()
    {
        return $this->hasMany(Lohang::class);
    }

    public function donhang()
    {
        return $this->belongsToMany(Donhang::class, 'chitietdonhang');
    }
    public function donvitinh()
    {
        return $this->belongsTo(Donvitinh::class);
    }

}
