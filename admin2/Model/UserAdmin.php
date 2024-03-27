<?php 
    class UserAdmin {

        
    function checkLoginAdmin($userName, $pass){
        $db = new connect();
        // Use prepared statements to prevent SQL injection
        $select = "SELECT * FROM `tbl_admin` WHERE username = '$userName' AND password = '$pass';";
        $result = $db->getInstance($select);
        return $result;
    }

    function getUsernameById($id)
    {
        $db = new connect();
        $select = "SELECT `username` FROM `tbl_user` WHERE `id_user` = $id";
        $result = $db->getInstance($select);
        return $result['username']; // Trả về tên người dùng
    }

    function getUserAdmin() {
        $db = new connect();
        $select="SELECT `id_admin`, `username`, `password`, `email`, `role`
        FROM `tbl_admin`
        WHERE `role` = 2;
        ";
        $rs = $db->getList($select);
        return $rs;
    }
    function getUserAdminID($id_admin) {
        $db = new connect();
        $select="SELECT `id_admin`, `username`, `password`, `email`, `role`
        FROM `tbl_admin`
        WHERE `id_admin` = $id_admin;
        ";
        $rs = $db->getInstance($select);
        return $rs;
    }
// Hàm lưu thông báo cho nhân viên vào cơ sở dữ liệu
function saveThongBaoNhanVien($id_admin,$username, $email, $noidungthongbao) {
        $db = new Connect();
        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng thongbaonhanvien
        $sql = "INSERT INTO `thongbaonhanvien` (`id_admin`,`email_nhanvien`, `name_nhanvien`, `noidung`, `ngaythongbao`) 
                VALUES ($id_admin,'$email', '$username',  '$noidungthongbao', NOW())";
        $result = $db->exec($sql);
        return $result; // Trả về kết quả (true nếu thành công, false nếu thất bại)
}

function NoiDungThongBao($id_admin) {
    $db = new Connect();
    $sql = "SELECT `id_thongbao`, `id_admin`, `email_nhanvien`, `name_nhanvien`, `noidung`, `ngaythongbao` FROM `thongbaonhanvien` WHERE `id_admin` = $id_admin";
    $rs = $db->getList($sql);
    return $rs;
}

function GetListTaiKhoan() {
    $db = new Connect();
    $sql = "SELECT `id_user`, `username`, `pass`, `email_user`, `fullname`, `diachi`, `sodienthoai` FROM `tbl_user` WHERE 1";
    $rs = $db->getList($sql);
    return $rs;

}
    }

?>