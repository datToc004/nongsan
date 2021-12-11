<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\LohangAddRequest;
use App\Http\Requests\LohangEditRequest;
use App\Models\Donhangnhap;
use App\Models\Lohang;
use App\Models\Sanpham;
use App\Models\Nhacungcap;
use Illuminate\Support\Facades\DB;
use Input;
use PDF;

class LohangController extends Controller
{
    public function getList()
    {
        $data = Donhangnhap::orderBy('id', 'DESC')->get();
        return view('backend.lohang.testdanhsach', compact('data'));
    }

    public function getAdd()
    {
        $products = DB::table('sanpham')->get();
        foreach ($products as $key => $val) {
            $product[] = ['id' => $val->id, 'name' => $val->sanpham_ten];
        }
        $vendors = DB::table('nhacungcap')->get();
        foreach ($vendors as $key => $val) {
            $vendor[] = ['id' => $val->id, 'name' => $val->nhacungcap_ten];
        }
        return view('backend.lohang.them', compact('product', 'vendor'));
    }

    public function postAdd(LohangAddRequest $request)
    {
        $lohang = new Lohang;
        $lohang->lohang_ky_hieu = $request->txtLHSignt;
        $lohang->lohang_han_su_dung = $request->txtLHShelf;
        $lohang->lohang_gia_mua_vao = $request->txtLHBuyPrice;
        $lohang->lohang_gia_ban_ra = $request->txtLHSalePrice;
        $lohang->lohang_so_luong_nhap = $request->txtLHQuant;
        $lohang->lohang_so_luong_da_ban = 0;
        $lohang->lohang_so_luong_doi_tra = 0;
        $lohang->lohang_so_luong_hien_tai = $request->txtLHQuant;
        $lohang->sanpham_id = $request->txtLHProduct;
        $lohang->nhacungcap_id = $request->txtLHVendor;
        $lohang->save();
        return redirect()->route('admin.lohang.list')->with(['flash_level' => 'success', 'flash_message' => 'Thêm lô hàng thành công!!!']);
    }

    public function getEdit($id)
    {
        $donhangnhap = Donhangnhap::findOrFail($id);
        $vendors = DB::table('nhacungcap')->get();
        foreach ($donhangnhap->sanpham as $key => $val) {
            $spc[] = $val->id;
        }
        $data = Sanpham::whereNotIn('id', $spc)->orderBy('id', 'DESC')->get();
        foreach ($vendors as $key => $val) {
            $vendor[] = ['id' => $val->id, 'name' => $val->nhacungcap_ten];
        }
        return view('backend.lohang.testsua', compact('data', 'vendor', 'donhangnhap'));
    }

    public function postEdit(Request $r, $id)
    {
        $tongtien = 0;
        foreach ($r->txtLHShelf as $key => $value) {
            $tongtien += $r->txtLHBuyPrice[$key] * $r->txtLHQuant[$key];
        }
        $dhn = Donhangnhap::findOrFail($id);
        $dhn->donhangnhap_ghichu = $r->txtNote;
        $dhn->donhangnhap_tong_tien = $tongtien;
        $dhn->nhacungcap_id = $r->txtLHVendor;
        $dhn->donhangnhap_tinh_trang = $r->txtStatus;
        $dhn->save();
        Lohang::where('donhangnhap_id', $dhn->id)->delete();
        foreach ($r->txtLHShelf as $key => $value) {
            $lohang = new Lohang;
            $lohang->lohang_han_su_dung = $r->txtLHShelf[$key];
            $lohang->lohang_don_gia = $r->txtLHBuyPrice[$key];
            $lohang->lohang_so_luong_nhap = $r->txtLHQuant[$key];
            $lohang->ngaysx = $r->txtLHNgaySX[$key];
            $lohang->lohang_tinh_trang = 0;
            $lohang->sanpham_id = $key;
            $lohang->donhangnhap_id = $dhn->id;
            $lohang->save();
        }
        return redirect()->route('admin.lohang.list')->with(['flash_level' => 'success', 'flash_message' => 'Sua đơn hàng thành công thành công!!!']);
    }

    public function getDelete($id)
    {
        DB::table('lohang')->where('id', $id)->delete();
        return redirect()->route('admin.lohang.list')->with(['flash_level' => 'success', 'flash_message' => 'Xóa đơn vị tính thành công!!!']);
    }

    public function getNhaphang($id)
    {
        $sanpham = Sanpham::findOrFail($id);
        $vendors = DB::table('nhacungcap')->get();
        foreach ($vendors as $key => $val) {
            $vendor[] = ['id' => $val->id, 'name' => $val->nhacungcap_ten];
        }
        return view('backend.lohang.nhaphang', compact('sanpham', 'vendor'));
    }

    public function postNhaphang(LohangAddRequest $request, $id)
    {
        $lohang = new Lohang;
        $lohang->lohang_ky_hieu = $request->txtLHSignt;
        $lohang->lohang_han_su_dung = $request->txtLHShelf;
        $lohang->lohang_gia_mua_vao = $request->txtLHBuyPrice;
        $lohang->lohang_gia_ban_ra = $request->txtLHSalePrice;
        $lohang->lohang_so_luong_nhap = $request->txtLHQuant;
        $lohang->ngaysx = $request->txtLHNgaySX;
        $lohang->lohang_so_luong_da_ban = 0;
        $lohang->lohang_so_luong_doi_tra = 0;
        $lohang->lohang_so_luong_hien_tai = $request->txtLHQuant;
        $lohang->sanpham_id = $id;
        $lohang->nhacungcap_id = $request->txtLHVendor;
        $lohang->save();
        return redirect()->route('admin.lohang.list')->with(['flash_level' => 'success', 'flash_message' => 'Thêm lô hàng thành công!!!']);
    }


    public function getNhaphang1()
    {
        $data = Sanpham::orderBy('id', 'DESC')->get();
        $vendors = Nhacungcap::all();
        foreach ($vendors as $key => $val) {
            $vendor[] = ['id' => $val->id, 'name' => $val->nhacungcap_ten];
        }
        return view('backend.lohang.testnhaphang', compact('data', 'vendor'));
    }

    public function postNhaphang1(Request $r)
    {
        $tongtien = 0;
        foreach ($r->products as $key => $value) {
            $tongtien += $r->txtLHBuyPrice[$key] * $r->txtLHQuant[$key];
        }
        $dhn = new Donhangnhap();
        $dhn->donhangnhap_ghichu = $r->txtNote;
        $dhn->donhangnhap_tong_tien = $tongtien;
        $dhn->nhacungcap_id = $r->txtLHVendor;
        $dhn->donhangnhap_tinh_trang = 0;
        $dhn->save();
        foreach ($r->products as $key => $value) {
            $lohang = new Lohang;
            $lohang->lohang_han_su_dung = $r->txtLHShelf[$key];
            $lohang->lohang_don_gia = $r->txtLHBuyPrice[$key];
            $lohang->lohang_so_luong_nhap = $r->txtLHQuant[$key];
            $lohang->ngaysx = $r->txtLHNgaySX[$key];
            $lohang->lohang_tinh_trang = 0;
            $lohang->sanpham_id = $key;
            $lohang->donhangnhap_id = $dhn->id;
            $lohang->save();
        }
        return redirect()->route('admin.lohang.list')->with(['flash_level' => 'success', 'flash_message' => 'Thêm đơn hàng  thành công!!!']);;
    }
    public function pdf($id)
    {
        $donhang = Donhangnhap::findOrFail($id);
        // print_r($khachhang);
        $pdf = PDF::loadView('backend.lohang.hoadon', compact('donhang'));
        return $pdf->stream();
    }
}
