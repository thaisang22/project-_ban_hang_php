
<div id="PageContainer" class="">
    <main class="main-content" role="main">
        <section id="page-wrapper">
            <div class="wrapper">
                <div class="inner">

                    <h1>Tài khoản của bạn</h1>

                    <hr class="hr--small">

                    <div class="grid">

                        <div class="grid__item two-thirds medium-down--one-whole">
                            <h2 class="h4">Lịch sử giao dịch</h2>
                            <p>Bạn chưa có đơn hàng nào</p>
                        </div>
                        <div class="grid__item one-third medium-down--one-whole">
                            <h2 class="h4">Thông tin tài khoản</h2>
                            <h3 class="h5"><span id="display-username"><?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?></span></h3>
                            <p>
                                <br>
                                <br>
                                <br>
                                <br>
                                70000<br>
                                Vietnam<br>
                            </p>



                            <p><a href="/account/addresses">Xem địa chỉ (1)</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>
</div>