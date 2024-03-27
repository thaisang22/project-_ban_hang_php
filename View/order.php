<div class="table-responsive">
<?php 
  if(!isset($_SESSION['user']));
  {
    echo '  <script> alert("pls login");</script>';
?>
    <form action="" method="post">
      <table class="table table-bordered" border="0">
      <tr>
          <td colspan="4">
            <h2 style="color: red;">HÓA ĐƠN</h2>
          </td>
        </tr>
      <tr>
          <td colspan="2">Số Hóa đơn: </td>
          <td colspan="2"> Ngày lập:</td>
        </tr>
      <tr>
          <td colspan="2">Họ và tên:</td>
          <td colspan="2"></td>
        </tr>
      <tr>
          <td colspan="2">Địa chỉ:  </td>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2">Số điện thoại: </td>
          <td colspan="2"></td>
        </tr>
        ?>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td></td>
              <td></td>
              <td>Màu:  Size: </td>
              <td>Đơn Giá:  - Số Lượng: <br />
              </td>
            </tr>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b> <sup><u>đ</u></sup></b>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <?php 
      }
    ?>
</div>
</div>