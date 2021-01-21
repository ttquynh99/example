@extends('backend.layouts.master')

@section('title')
Báo cáo Đơn hàng
@endsection

@section('feature-title')
Báo cáo Đơn hàng
@endsection

@section('feature-description')
Báo cáo Đơn hàng
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="get" action="#" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tuNgay">Từ ngày</label>
                <input type="text" class="form-control" id="tuNgay" name="tuNgay">
            </div>
            <div class="form-group">
                <label for="denNgay">Đến ngày</label>
                <input type="text" class="form-control" id="denNgay" name="denNgay">
            </div>
            <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button>
        </form>
    </div>
    <div class="col-md-12">
    <!-- Bắt buộc để vẽ biểu đồ -->
        <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas> 
    </div>
</div>
@endsection


@section('custom-scripts')
<!-- Các script dành cho thư viện Numeraljs -->
<script src="{{ asset('vendor/numeraljs/numeral.min.js') }}"></script>
<script>
    // Đăng ký tiền tệ VNĐ
    numeral.register('locale', 'vi', {
        delimiters: {
            thousands: ',',
            decimal: '.'
        },
        abbreviations: {
            thousand: 'k',
            million: 'm',
            billion: 'b',
            trillion: 't'
        },
        ordinal: function(number) {
            return number === 1 ? 'một' : 'không';
        },
        currency: {
            symbol: 'vnđ'
        }
    });

    // Sử dụng locate vi (Việt nam)
    numeral.locale('vi');
</script>

<!-- Các script dành cho thư viện ChartJS -->
<script src="{{ asset('vendor/Chart.js/Chart.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var objChart; //Tạo biến
        var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");
        //Đăng kí sự kiện
        $("#btnLapBaoCao").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('backend.baocao.donhang.data') }}', //gửi request đến nơi cần xử lý
                type: "GET",
                data: {
                    tuNgay: $('#tuNgay').val(), //tìm dựa vào id, lấy dữ liệu nhập
                    denNgay: $('#denNgay').val(),
                },
                success: function(response) {
                    var myLabels = []; // Trục hoành nhãn
                    var myData = []; //Trục tung giá trị
                    $(response.data).each(function() {
                        myLabels.push((this.thoiGian)); 
                        myData.push(this.tongThanhTien);
                    });
                    myData.push(0); // creates a '0' index on the graph
                    //Đã vẽ thì xóa
                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }
                    // Vẽ biểu đồ
                    $objChart = new Chart($chartOfobjChart, {
                        // The type of chart we want to create
                        type: "bar", //Kiểu

                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#9ad0f5",
                                borderWidth: 1
                            }]
                        },

                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                            },
                            title: { //Tiêu đề
                                display: true,
                                text: "Báo cáo đơn hàng"
                            }, 
                            scales: {
                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Ngày nhận đơn hàng'
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            return numeral(value).format('0,0 $') // Định dạng kiểu số
                                        }
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Tổng thành tiền'
                                    }
                                }]
                            },
                            tooltips: { //Định dạng kiểu số khi re chuột vào cột
                                callbacks: {
                                    label: function(tooltipItem, data) {
                                        return numeral(tooltipItem.value).format('0,0 $')
                                    }
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });
                }
            });
        });
    });
</script>
@endsection