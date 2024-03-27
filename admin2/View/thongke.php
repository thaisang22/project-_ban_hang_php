<!DOCTYPE html>
<html>
<head>
    <title>Biểu đồ thống kê</title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #chart_div, #chart_div_sanpham {
            width: 80%;
            height: 400px;
            margin-left: 280px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div>
        <a href="index.php?action=thongke&act=updatethongke" style="margin-left: 280px;" class="btn btn-primary">Cập nhật thông kê</a>
    </div>

    <div id="chart_div"></div>
    <div id="chart_div_sanpham"></div>

    <?php 
    // Kết nối CSDL
    $db = new Connect();

    // Truy vấn để lấy dữ liệu từ bảng thongke
    $getthongke ="SELECT `id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban` FROM `thongke` WHERE 1";
    $rsthongke = $db->getList($getthongke);

    // Chuyển kết quả thành mảng
    $thongkeArray = array();
    while ($row = $rsthongke->fetch(PDO::FETCH_ASSOC)) {
        $thongkeArray[] = $row;
    }

    // Mã hóa mảng thành chuỗi JSON
    $thongkeJSON = json_encode($thongkeArray);

    // Truy vấn để lấy dữ liệu từ bảng thongkesanpham
    $getthongkesanpham = "SELECT `id`, `name_product`, `soluongbanduoc`, `tong_tiensanpham` FROM `thongkesanpham` WHERE 1";
    $rsthongkesanpham= $db->getList($getthongkesanpham);
    
    // Chuyển kết quả thành mảng
    $thongkesanphamArray = array();
    while ($row = $rsthongkesanpham->fetch(PDO::FETCH_ASSOC)) {
        $thongkesanphamArray[] = $row;
    }
    
    // Mã hóa mảng thành chuỗi JSON
    $thongkesanphamJSON = json_encode($thongkesanphamArray);
    ?>

    <script type="text/javascript">
        // Load visualization library
        google.load('visualization', '1.0', {'packages':['corechart']});
        google.setOnLoadCallback(drawChart);

        // Dữ liệu từ PHP
        var thongkeJSON = <?php echo $thongkeJSON; ?>;
        var thongkesanphamJSON = <?php echo $thongkesanphamJSON; ?>;

        // Hàm vẽ biểu đồ
        function drawChart() {
            // Biểu đồ cho dữ liệu từ bảng thongke
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('string', 'Ngày');
            dataTable.addColumn('number', 'Doanh thu');
            dataTable.addColumn('number', 'Số lượng bán');

            // Thêm dữ liệu vào biểu đồ cho thongke
            for (var i = 0; i < thongkeJSON.length; i++) {
                dataTable.addRow([
                    thongkeJSON[i].ngaydat,
                    parseFloat(thongkeJSON[i].doanhthu),
                    parseInt(thongkeJSON[i].soluongban)
                ]);
            }

            // Tùy chọn của biểu đồ thongke
            var options = {
                title: 'Biểu đồ doanh thu và số lượng bán theo ngày',
                hAxis: {title: 'Ngày'},
                vAxis: {title: 'Doanh thu (VNĐ) và Số lượng bán'},
                backgroundColor: '#f9f9f9',
                tooltip: {isHtml: true}
            };

            // Vẽ biểu đồ thongke
            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(dataTable, options);

            // Biểu đồ cho dữ liệu từ bảng thongkesanpham
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tên sản phẩm');
            data.addColumn('number', 'Số lượng bán');
            data.addColumn('number', 'Tổng doanh thu');

            // Thêm dữ liệu vào biểu đồ cho thongkesanpham
            for (var i = 0; i < thongkesanphamJSON.length; i++) {
                data.addRow([
                    thongkesanphamJSON[i].name_product,
                    parseInt(thongkesanphamJSON[i].soluongbanduoc),
                    parseFloat(thongkesanphamJSON[i].tong_tiensanpham)
                ]);
            }

            // Tùy chọn của biểu đồ thongkesanpham
            var options_sanpham = {
                title: 'Thống kê sản phẩm',
                hAxis: {title: 'Tên sản phẩm',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
                backgroundColor: '#f9f9f9'
            };

            // Vẽ biểu đồ thongkesanpham
            var chart_sanpham = new google.visualization.ColumnChart(document.getElementById('chart_div_sanpham'));
            chart_sanpham.draw(data, options_sanpham);
        }

        // Vẽ biểu đồ thongkesanpham
        chart_sanpham.draw(data, options_sanpham);
    
    </script>

    <script type="text/javascript">
        // Gọi hàm vẽ biểu đồ khi thư viện Google Charts đã được tải
        google.setOnLoadCallback(function() {
            drawChart();
            drawThongKeSanPhamChart();
        });
    </script>
</body>
</html>

