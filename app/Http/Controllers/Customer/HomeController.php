<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Khachhang;
use App\Models\Khuyenmai;
use App\Models\Loaisanpham;
use App\Models\Nhanvien;
use App\Models\Nhom;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getList()
    {
        $loaisp=Loaisanpham::all()->take(6);
        $sanphambc = DB::table('sanpham')
                    ->join('chitietdonhang', 'sanpham.id', '=', 'chitietdonhang.sanpham_id')
                    ->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
                    ->select(DB::raw('sum(chitietdonhang.chitietdonhang_so_luong) as daban'), 'sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_anh', 'sanpham.sanpham_gia')
                    ->where('tinhtranghd_id', 4)
                    ->groupBy('sanpham.id')
                    ->orderBy('daban', 'desc')
                    ->take(4)->get();
        $sanphamkm = DB::table('sanpham')
                    ->join('sanphamkhuyenmai', 'sanpham.id', '=', 'sanphamkhuyenmai.sanpham_id')
                    ->join('khuyenmai', 'khuyenmai.id', '=', 'sanphamkhuyenmai.khuyenmai_id')
                    ->select('sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_anh', 'sanpham.sanpham_gia')
                    ->where('sanpham.sanpham_khuyenmai', 1)
                    ->where('khuyenmai.khuyenmai_tinh_trang', 1)
                    ->groupBy('sanpham.id')
                    ->take(4)->get();
        $nhanvien=Nhanvien::all()->take(4);

        return view('frontend.home',compact('loaisp','sanphambc','sanphamkm','nhanvien'));
    }
    public function getLogin()
    {
        return view('frontend.checkout.login');
    }

    public function getRegister()
    {
        return view('frontend.checkout.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->txtUsername;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPass);
        $user->loainguoidung_id = 2;
        $user->save();
        $khachhang = new Khachhang();
        $khachhang->khachhang_ten = $request->txtUsername;
        $khachhang->khachhang_email = $request->txtEmail;
        $khachhang->khachhang_sdt = $request->txtPhone;
        $khachhang->khachhang_dia_chi = $request->txtAddress;
        $khachhang->user_id = $user->id;
        $khachhang->save();

        return redirect()->route('customer.login');
    }

    public function getAccount()
    {
        return view('frontend.checkout.account');
    }

    public function postAccount(AccountRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->txtUsername;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPass);
        $user->loainguoidung_id = 2;
        $user->save();
        $khachhang = Khachhang::where('user_id', Auth::user()->id)->first();
        $khachhang->khachhang_ten = $request->txtUsername;
        $khachhang->khachhang_email = $request->txtEmail;
        $khachhang->khachhang_sdt = $request->txtPhone;
        $khachhang->khachhang_dia_chi = $request->txtAddress;
        $khachhang->user_id = $user->id;
        $khachhang->save();

        return redirect()->back()->with('thongbao', 'Bạn đã thay đổi thông tin thành công');
    }

    public function getContact()
    {

        return view('frontend.contact.contact');
    }

    public function getPromotion()
    {
        $prom = Khuyenmai::where('khuyenmai_tinh_trang', 1)->paginate(4);

        return view('frontend.promotion.promotion', compact('prom'));
    }

    public function getDetailPromotion($id)
    {

        $prom = Khuyenmai::find($id);

        return view('frontend.promotion.detail_promotion', compact('prom'));
    }
}
