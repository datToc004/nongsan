<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThanhtoanRequest;
use App\Models\Chitietdonhang;
use App\Models\Donhang;
use App\Models\Hinhsanpham;
use App\Models\Nhom;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function getList(request $request)
    {
        if ($request->nhom) {

            if ($request->start) {
                $sanpham = DB::table('sanpham')
                    ->join('loaisanpham', 'loaisanpham.id', '=', 'sanpham.loaisanpham_id')
                    ->join('nhom', 'nhom.id', '=', 'loaisanpham.nhom_id')
                    ->where('nhom.id', $request->nhom)
                    ->whereBetween('sanpham.sanpham_gia', [$request->start, $request->end])
                    ->paginate(4);
            } else {
                $sanpham = DB::table('sanpham')
                    ->join('loaisanpham', 'loaisanpham.id', '=', 'sanpham.loaisanpham_id')
                    ->join('nhom', 'nhom.id', '=', 'loaisanpham.nhom_id')
                    ->where('nhom.id', $request->nhom)
                    ->paginate(4);
            }
        } else if ($request->xh) {
            if ($request->xh == "bc") {
                $sanpham = DB::table('sanpham')
                    ->join('chitietdonhang', 'sanpham.id', '=', 'chitietdonhang.sanpham_id')
                    ->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
                    ->select(DB::raw('sum(chitietdonhang.chitietdonhang_so_luong) as daban'), 'sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_anh', 'sanpham.sanpham_gia')
                    ->where('tinhtranghd_id', 4)
                    ->groupBy('sanpham.id')
                    ->orderBy('daban', 'desc')
                    ->paginate(6);
            }
            if ($request->xh == "km") {
                $sanpham = DB::table('sanpham')
                    ->join('sanphamkhuyenmai', 'sanpham.id', '=', 'sanphamkhuyenmai.sanpham_id')
                    ->join('khuyenmai', 'khuyenmai.id', '=', 'sanphamkhuyenmai.khuyenmai_id')
                    ->select('sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_anh', 'sanpham.sanpham_gia')
                    ->where('sanpham.sanpham_khuyenmai', 1)
                    ->where('khuyenmai.khuyenmai_tinh_trang', 1)
                    ->groupBy('sanpham.id')
                    ->paginate(6);
            }
        } else {
            $sanpham = Sanpham::paginate(6);
        }
        $sanphambc = DB::table('sanpham')
            ->join('chitietdonhang', 'sanpham.id', '=', 'chitietdonhang.sanpham_id')
            ->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
            ->select(DB::raw('sum(chitietdonhang.chitietdonhang_so_luong) as daban'), 'sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_anh', 'sanpham.sanpham_gia')
            ->where('tinhtranghd_id', 4)
            ->groupBy('sanpham.id')
            ->orderBy('daban', 'desc')
            ->take(5)
            ->get();
        $nhom = Nhom::all();

        return view('frontend.product.shop', compact('sanpham', 'nhom', 'sanphambc'));
    }

    public function getSearch(request $request)
    {
        $sanpham = DB::table('sanpham')
            ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->join('loaisanpham', 'loaisanpham.id', '=', 'sanpham.loaisanpham_id')
            ->join('nhom', 'nhom.id', '=', 'loaisanpham.nhom_id')
            ->orderBy('lohang.created_at', 'desc')
            ->select('sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_anh', 'lohang.lohang_so_luong_nhap', 'lohang.lohang_so_luong_hien_tai', 'lohang.lohang_gia_ban_ra')
            ->groupBy('sanpham.id')
            ->where('sanpham.sanpham_ten', 'LIKE', "%{$request->Search}%")
            ->paginate(6);

        $sanphambc = DB::table('sanpham')
            ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->join('chitietdonhang', 'sanpham.id', '=', 'chitietdonhang.sanpham_id')
            ->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
            ->select(DB::raw('sum(lohang.lohang_so_luong_da_ban) as daban'), 'sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_anh', 'lohang.lohang_so_luong_nhap', 'lohang.lohang_so_luong_hien_tai', 'lohang.lohang_gia_ban_ra')
            ->groupBy('sanpham.id')
            ->orderBy('daban', 'desc')
            ->take(5)
            ->get();
        $nhom = Nhom::all();

        return view('frontend.product.shop', compact('sanpham', 'nhom', 'sanphambc'));
    }

    public function getDetail($id)
    {
        $sanpham = Sanpham::findOrFail($id);
        $hinhsanpham = Hinhsanpham::where('sanpham_id', $id)->take(4)->get();

        return view('frontend.product.detail', compact('sanpham', 'hinhsanpham'));
    }

    public function getCart()
    {
        $cart = Cart::Content();
        $total = Cart::total(0, "", ".");

        return view('frontend.product.cart', compact('cart', 'total'));
    }

    public function addCart(request $request, $id)
    {
        $sanpham = Sanpham::findOrFail($id);
        $giakm=$sanpham->sanpham_gia;
        if ($sanpham->sanpham_khuyenmai == 1) {
            $tylegias = DB::select('select khuyenmai_phan_tram from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1 and sp.id=' . $sanpham->id);
            $tyle = 0;
            foreach ($tylegias as $tylegia) {
                $giakm -= $tylegia->khuyenmai_phan_tram * $sanpham->sanpham_gia * 0.01;
                $tyle += $tylegia->khuyenmai_phan_tram * 0.01;
            }
        }
        if ($request->quantity != '') {
            $qty = $request->quantity;
        } else {
            $qty = 1;
        }

        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->sanpham_ten,
            'qty' => $qty,
            'price' => $giakm,
            'weight' => 0,
            'options' => ['img' => $sanpham->sanpham_anh]
        ]);


        return redirect()->route('cart.getCart');
    }

    public function removeCart($id)
    {
        Cart::remove($id);
        return redirect()->route('cart.getCart');
    }
    public function updateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);
    }

    public function getCheckout()
    {
        $cart = Cart::Content();
        $total = Cart::total(0, "", ".");

        return view('frontend.checkout.checkout', compact('cart', 'total'));
    }

    public function postCheckout(ThanhtoanRequest $request)
    {
        $khachhang = DB::table('khachhang')->where('user_id', Auth::user()->id)->first();
        $don_hang = new Donhang();
        $don_hang->donhang_nguoi_nhan = $request->txtName;
        $don_hang->donhang_nguoi_nhan_dia_chi = $request->txtAddress;
        $don_hang->donhang_nguoi_nhan_email = $request->txtEmail;
        $don_hang->donhang_nguoi_nhan_sdt = $request->txtPhone;
        $don_hang->donhang_ghi_chu = $request->txtNote;
        $don_hang->donhang_don_gia = Cart::total(0, "", "");
        $don_hang->tinhtranghd_id = 1;
        $don_hang->khachhang_id = $khachhang->id;
        $don_hang->save();

        foreach (Cart::content() as $product) {
            $order = new Chitietdonhang();
            $order->sanpham_id = $product->id;
            $order->chitietdonhang_don_gia = $product->price;
            $order->chitietdonhang_so_luong = $product->qty;
            $order->donhang_id = $don_hang->id;
            $order->save();
        }
        Cart::destroy();
        return redirect()->route('complete.get');
    }

    public function getComplete()
    {
        $donhang = Donhang::where('khachhang_id', Auth::user()->khachhang->id)->orderBy('created_at', 'desc')->take(3)->get();

        return view('frontend.checkout.complete', compact('donhang'));
    }
}
