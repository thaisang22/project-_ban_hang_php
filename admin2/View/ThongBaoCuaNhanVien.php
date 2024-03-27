<style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-left: 600px;
            width: 450px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            display: inline-block;
        }
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .card-content {
            padding: 10px;
        }
        .card-content h2 {
            margin-top: 0;
        }
        .card-content p {
            margin-bottom: 0;
        }
    </style>
<?php
// Bạn cần phải thay đổi các dòng này để kết nối cơ sở dữ liệu và lấy dữ liệu từ hàm NoiDungThongBao()
$db = new UserAdmin();
$id_admin = $_SESSION['id_admin'];
$getThongBao = $db->NoiDungThongBao($id_admin);



// Kiểm tra xem có dữ liệu không
if ($getThongBao) {
    // Duyệt qua dữ liệu và hiển thị thông báo trong thẻ card
    foreach ($getThongBao as $row) {
        echo "<div class='card'>";
        echo "<div class='card-content'>";
        echo "<h2>" . $row["noidung"] . "</h2>";
        echo "<p><strong>Ngày thông báo:</strong> " . $row["ngaythongbao"] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Không có thông báo nào.";
}
?>
