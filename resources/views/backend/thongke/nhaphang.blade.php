@extends('backend.master')
@section('title')
    <h1 class="page-header">Thống kê nhập hàng</h1>
@stop
@section('content')
    <div class="row">
        <form method="get" class="colorlib-form-2 filterForm">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <label for="guests">Năm:</label>
                    <div class="form-field">
                        <i class="icon icon-arrow-down3"></i>
                        <select name="nam" id="myselect1" class="form-control">
                            <option @if (isset($_GET['nam']) && $_GET['nam'] == 2022) selected @endif value="{{ date('Y') }}">{{ date('Y') }}
                            </option>
                            <option @if (isset($_GET['nam']) && $_GET['nam'] == 2021) selected @endif value="{{ date('Y') - 1 }}">{{ date('Y') - 1 }}
                            </option>
                            <option @if (isset($_GET['nam']) && $_GET['nam'] == 2020) selected @endif value="{{ date('Y') - 2 }}">{{ date('Y') - 2 }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <label for="guests"> </label>
                    <button type="submit" style="width: 100%;border: none;height: 40px;">Lọc</button>
                </div>

            </div>
        </form>


        <div class="col-lg-3 col-md-6">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Sơ đồ thống kê doanh thu theo tháng
                </div>
                <!-- /.panel-heading -->
                <div class="container-fluid">
                    <canvas id="myChart" style="width:50%;"></canvas>
                </div>
                <!-- So do so luong san pham hang thang -->

            </div>
            <!-- /.panel -->
            <!-- /.panel -->
        </div>

        {{-- @include('backend.blocks.doanhthu')
    @include('backend.blocks.comment') --}}
    </div>
    <div class="row">
        <form action="{{ route('admin.thongke.nhaphangt2') }}" method="get" class="colorlib-form-2 filterForm">
            <div class="col-lg-3 col-md-6">
                <input type="hidden" name="nam" value="@if (isset($_GET['nam'])) {{ $_GET['nam'] }} @else {{ date('Y') }} @endif">
                <div class="form-group">
                    <label for="guests">Tháng:</label>
                    <div class="form-field">
                        <i class="icon icon-arrow-down3"></i>
                        <select name="thang" id="thang" class="form-control">
                            <option value="0"> Chọn tháng</option>
                            @php
                                $month = date('m');
                            @endphp
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}"> Tháng {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <label for="guests"> </label>
                    <button type="submit" style="width: 100%;border: none;height: 40px;">Thống kê</button>
                </div>

            </div>
        </form>

        <div class="col-lg-3 col-md-6">

        </div>
        <div class="col-lg-2 col-md-5">

        </div>

    </div>
    {{-- <div class="row">

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th>Kí hiệu</th>
                    <th>Tên</th>
                    <th>ĐVT</th>
                    <th>Số lượng mua</th>
                    <th>Tổng tiền mua</th>
                </tr>
            </thead>
            <tbody id="table_1">
            </tbody>
        </table>

    </div> --}}
    <!-- /.row -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        var data = {
                labels:[@foreach ($monthjs as $month)
                    "{{ $month }}",
                @endforeach],
            datasets: [{
                    label: "VND",
                    data:[@foreach ($numberjs as $number)
                        {{ $number }},
                    @endforeach],
                backgroundColor: "#4082c4"
            }]
        }
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                "hover": {
                    "animationDuration": 0
                },
                "animation": {
                    "duration": 1,
                    "onComplete": function() {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;

                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart
                            .defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function(dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function(bar, index) {
                                var data = dataset.data[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 5);
                            });
                        });
                    }
                },


            }
        });
    </script>

@stop
@section('script_tknhaphang')
    {{-- <script>
        $('#thang').on('change', function() {
            var nam = $("#myselect1").val();
            var thang = $("#thang").val();


            list = document.getElementById("table_1");
            while (list.hasChildNodes()) {
                list.removeChild(list.firstChild);
            }
            $("#city-dropdown").html('');
            $.ajax({
                url: "{{ route('admin.thongke.nhaphangt1') }}",
                type: "POST",
                data: {
                    nam: nam,
                    thang: thang,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    var tongtien = 0;

                    $.each(result, function(key, value) {
                        var html = `<tr class="odd gradeX" align="left">
                    <td>${value.sanpham_ky_hieu}</td>
                    <td>${value.sanpham_ten}</td>
                    <td>${value.donvitinh_ten}</td>
                    <td>${value.soluong}</td>
                    <td>${new Intl.NumberFormat().format(value.tongtien)}</td>
                </tr>`;
                        tongtien += Number(value.tongtien);
                        console.log(tongtien);
                        $("#table_1").append(html);
                    });

                    $("#tongtien").html(new Intl.NumberFormat().format(tongtien) + ' VND');
                }
            });

        });


        function getMessage() {
            $.ajax({
                type: 'POST',
                url: '/getmsg',
                data: '_token = <?php echo csrf_token(); ?>',
                success: function(data) {
                    $("#msg").html(data.msg);
                }
            });
        }
    </script> --}}
@endsection
