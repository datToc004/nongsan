@extends('backend.master')

@section('content')
    <form action="{!! route('admin.lohang.postEdit', $donhangnhap->id) !!}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-green">
                    <div class="panel-heading" style="height:60px;">
                        <h3>
                            <a href="{!! URL::route('admin.khuyenmai.list') !!}" style="color:blue;"><i class="fa fa-product-hunt"
                                    style="color:blue;">Khuyến mãi</i></a>
                            /Thêm mới
                        </h3>
                        <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                            <button type="submit" class="btn btn-primary">Lưu</button><a href="{!! URL::route('admin.lohang.list') !!}"><i
                                    class="btn btn-default">Hủy</i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="newRow" class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Thông tin Đơn hàng nhập</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="input">Nhà cung cấp</label>
                                            <div>
                                                <select id="input" name="txtLHVendor" class="form-control">
                                                    <option value="">--Chọn nhà cung cấp--</option>
                                                    <?php Select_Function($vendor, $donhangnhap->nhacungcap_id); ?>
                                                </select>
                                            </div>
                                            <div>
                                                {!! $errors->first('txtLHVendor') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="input">Nhà cung cấp</label>
                                            <div>
                                                <select id="input" name="txtStatus" class="form-control">
                                                    <option value="">--Chọn nhà cung cấp--</option>
                                                    <option @if ($donhangnhap->donhangnhap_tinh_trang == 0) selected @endif value="0">
                                                        Chưa được thanh toán
                                                    </option>
                                                    <option @if ($donhangnhap->donhangnhap_tinh_trang == 1) selected @endif value="1">
                                                        Đã được thanh toán
                                                    </option>

                                                </select>
                                            </div>
                                            <div>
                                                {!! $errors->first('txtLHVendor') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Ghi Chú</label>
                                            <textarea class="form-control" rows="3" name="txtNote"
                                                placeholder="Ghi chú...">{{ $donhangnhap->donhangnhap_ghichu }}</textarea>
                                            <div>
                                                {!! $errors->first('txtNote') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <a href="{!! URL::route('admin.nhacungcap.getAdd') !!}"><i class="btn btn-primary">Thêm mới</i></a>
                                    </div>

                                </div>
                            </div>
                            @foreach ($donhangnhap->lohang as $lh)
                                <div id="{{ $lh->sanpham_id }}" class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Thông tin sản phẩm {{ $lh->sanpham->sanpham_ten }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-lg-12 ">

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Ngày sản xuất</label>
                                                    <input type="date" class="form-control"
                                                        name="txtLHNgaySX[{{ $lh->sanpham_id }}]"
                                                        value="{{ $lh->ngaysx }}" placeholder="Ngày sản xuất..." />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Hạn sử dụng</label>
                                                    <input class="form-control" name="txtLHShelf[{{ $lh->sanpham_id }}]"
                                                        value="{{ $lh->lohang_han_su_dung }}"
                                                        placeholder="Nhập số ngày.." />
                                                    <div>
                                                        {!! $errors->first('txtLHShelf') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Số lượng</label>
                                                    <input class="form-control" name="txtLHQuant[{{ $lh->sanpham_id }}]"
                                                        value="{{ $lh->lohang_so_luong_nhap }}"
                                                        placeholder="Số lượng..." />
                                                    <div>
                                                        {!! $errors->first('txtLHQuant') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Giá mua vào</label>
                                                    <input class="form-control"
                                                        name="txtLHBuyPrice[{{ $lh->sanpham_id }}]"
                                                        value="{{ $lh->lohang_don_gia }}"
                                                        placeholder="Giá mua vào..." />
                                                    <div>
                                                        {!! $errors->first('txtLHBuyPrice') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default " style="margin-left:-22px;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Thêm sản phẩm nhập</h3>
                                    <div class="navbar-right" style="margin-right:10px;margin-top:-25px;">
                                        <a href="{!! URL::route('admin.sanpham.getAdd') !!}"><i class="btn btn-primary">Thêm mới</i></a>
                                    </div>

                                </div>
                                <div class="panel-body">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover"
                                            id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Sản phẩm</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($donhangnhap->sanpham as $item)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" onClick="add(this)"
                                                                name="products[{!! $item->id !!}]"
                                                                id="{!! $item->id !!}"
                                                                value="{!! $item->id !!}" checked>
                                                            <div id="ten_{!! $item->id !!}" style="display:none"
                                                                data-value="{!! $item->sanpham_ten !!}"></div>
                                                            @foreach ($item->lohang as $lh)
                                                                <div id="mua_vao_{!! $item->id !!}"
                                                                    style="display:none"
                                                                    data-value="{{ $lh->lohang_don_gia }}"></div>
                                    
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {!! $item->sanpham_ten !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>
                                                            <input onClick="add(this)" type="checkbox"
                                                                name="products[{!! $item->id !!}]"
                                                                id="{!! $item->id !!}"
                                                                value="{!! $item->id !!}">
                                                            <div id="ten_{!! $item->id !!}" style="display:none"
                                                                data-value="{!! $item->sanpham_ten !!}"></div>
                                                            @if (!$item->lohang->isEmpty())
                                                                @foreach ($item->lohang as $lh)
                                                                    @if ($loop->last)
                                                                        <div id="mua_vao_{!! $item->id !!}"
                                                                            style="display:none"
                                                                            data-value="{{ $lh->lohang_don_gia }}">
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <div id="mua_vao_{!! $item->id !!}"
                                                                    style="display:none" data-value="0">
                                                                </div>
                                                            @endif


                                                        </td>
                                                        <td>
                                                            {!! $item->sanpham_ten !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@section('script_nhaphang')
    <script type="text/javascript">
        function add(input) {
            if (input.checked) {
                var html = '';
                var dt = 13;
                var mua_vao = document.getElementById(`mua_vao_${input.id}`).getAttribute('data-value');
                var ten = document.getElementById(`ten_${input.id}`).getAttribute('data-value');
                html += `<div id="${input.id}" class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Thông tin sản phẩm ${ten}</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12 ">

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Ngày sản xuất</label>
                                                <input type="date" class="form-control" name="txtLHNgaySX[${input.id}]"
                                                    value="{!! old('txtLHSignt') !!}" placeholder="Ngày sản xuất..." />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Hạn sử dụng</label>
                                                <input class="form-control" name="txtLHShelf[${input.id}]"
                                                    value="{!! old('txtLHShelf') !!}" placeholder="Nhập số ngày.." />
                                                <div>
                                                    {!! $errors->first('txtLHShelf') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Số lượng</label>
                                                <input class="form-control" name="txtLHQuant[${input.id}]"
                                                    value="{!! old('txtLHQuant') !!}" placeholder="Số lượng..." />
                                                <div>
                                                    {!! $errors->first('txtLHQuant') !!}
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Giá mua vào</label>
                                            <input class="form-control" name="txtLHBuyPrice[${input.id}]"
                                                value="${mua_vao}" placeholder="Giá mua vào..." />
                                            <div>
                                                {!! $errors->first('txtLHBuyPrice') !!}
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>`;
                $('#newRow').append(html);
            } else {
                document.getElementById(input.id).remove();
            }
        }
    </script>
@endsection
