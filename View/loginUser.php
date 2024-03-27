<?php
if (isset($_SESSION['user'])) {
    echo "<script>";
    echo "alert('Bạn đang đăng nhập  ');";
    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=product';";
    echo "</script>";
    exit();
} 
?>
<div id="PageContainer" class="">
    <main class="main-content" role="main">
        <section id="page-wrapper">
            <div class="wrapper">
                <div class="inner">

                    <div class="grid">

                        <div class="grid__item large--one-third push--large--one-third text-center">


                            <div class="note form-success" id="ResetSuccess" style="display:none;">
                                Chúng tôi đã gửi một email với đường dẫn để giúp bạn cập nhật mật khẩu.
                            </div>

                            <div id="CustomerLoginForm" class="form-vertical">
                                <form accept-charset="UTF-8" action="index.php?action=login&act=login_act" id="customer_login" method="post">
                                    <input name="form_type" type="hidden" value="customer_login">
                                    <input name="utf8" type="hidden" value="✓">
                                    <h1>Đăng nhập</h1>
                                    <label for="CustomerEmail" class="hidden-label">user name</label>
                                    <input type="text" name="user" id="username" class="input-full"
                                        placeholder="username" autocorrect="off" autocapitalize="off" autofocus=""> 
                                        <span id="messageUsername" class="form-message my-custom-class"></span>  
                                    <label for="CustomerPassword" class="hidden-label">Mật khẩu</label>
                                    <input type="password" value="" name="password" id="password" class="input-full" placeholder="Mật khẩu">
                                        <span id="messagePassword" 
                                        class="form-message my-custom-class">
                                        </span> 
                                    <p>
                                        <input type="submit" class="btn btn--full" value="Đăng nhập">
                                    </p>
                                    <div class="note form-error" id="loginErrorMessage" style=" text-align: center; ;display:<?php echo !empty($errorMsg) ? 'block' : 'none'; ?>;">
        <?php echo $errorMsg; ?>
    </div>
                                    <p><a href="/">Trở về</a></p>
                                    <p><a href="/account/register" id="customer_register_link">Đăng kí</a></p>

                                    <p><a href="index.php?action=forget" id="RecoverPassword">Quên mật khẩu?</a></p>



                                    <input id="f608dec45c65417aa7164c1d96f70690" name="g-recaptcha-response"
                                        type="hidden"
                                        value="03AFcWeA6rhHjJ9m2jxokAy_HgJGjKixLK8yaiq_6s1tKgNZVQcpfv2_meT5ZugtOmr8Z6ygpQz21BFXM1DEg30wUU8mkLpL_vQIB-2ZiY0v8m4bscFO6FI1jCNaxNycPNo1u-Qwx2Y3qzT4xZ-SySAdJlxH-b0LQ5Q0VdxUoMy_mYXkRtom3-h3N9f5-kPbScrYe1yqjfciO_jQHsLy_XguIqGldGwCkQQ6mIklXjdgJ19XPDyhdfZayrwjvh4bT-KdsAcqxP45Gf3bldrPzoSxW0AsDQsrSfaKdai8ONjYBVGbKTqi0KR4PFv8GtyNNv5Xzp_U0rsENzj6D9ViGJE_MHEkIXaIfiFLq4bVBNYpKV-mXLQXWJs-IqFq6l7vEGBxkFX5DnNTlFjjxSD5veleCrwa4UDW-5V2WlOFuc_ni7GdSyxbbsXE6dUbjODKw_NxTn7ZruSVh6AjDsbschv-yoZ0D--NPowMxqrOsWqqMQcRmUfWDrOnMxJdnGMZ8aCMp_pKOCblng9FNkZc0ixhbNj3TAkyQZKA">
                                    <script
                                        src="https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-"></script>
                                    <script>grecaptcha.ready(function () { grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', { action: 'submit' }).then(function (token) { document.getElementById('f608dec45c65417aa7164c1d96f70690').value = token; }); });</script>
                                </form>
                            </div>

                            <div id="RecoverPasswordForm" style="display: none;">
                                <h2>Cài đặt lại mật khẩu</h2>
                                <p>Mật khẩu mới sẽ được gửi về email của bạn.</p>
                                <div class="form-vertical">
                                    <form accept-charset="UTF-8" action="/account/recover" method="post">
                                        <input name="form_type" type="hidden" value="recover_customer_password">
                                        <input name="utf8" type="hidden" value="✓">
                                        <label for="RecoverEmail" class="hidden-label">username</label>
                                        <input type="email" value="" name="email" id="RecoverEmail" class="input-full"
                                            placeholder="Email" autocorrect="off" autocapitalize="off">

                                        <p>
                                            <input type="submit" class="btn btn--full" value="Gửi">
                                        </p>
                                        <button type="button" id="HideRecoverPasswordLink" class="text-link">Bỏ
                                            qua</button>

                                        <input id="ed1c1fb5d40e4385a1685518e8e160eb" name="g-recaptcha-response"
                                            type="hidden"
                                            value="03AFcWeA6gSKx8Y1LKici_QIl7Sap3LMMeC4ZNyuqU290Tk4QPtWkW182mUvq_AWVoYjbcBAcnANdHKN8MPjzal2v69EEpPg5XkleLUn-l4ZJdNUSA-SNhvbM0O0yQ5VE-HjfBUrl1WqkJJKl6j7061gzg_I4HB2zqtpnjgZdil8vV5KlfZ5_KuuBETXCs-eeG3UfRXUlMGMhxwtt9wwRc1jTFZZVh7BhGBAuNXq8emVIjTpSPU_SW1dad49ghYY0pnFvQlREnXGPPaPMuN1XVj42Qwxdl1r_mWVpby6AOeSUdCpI5ChjU_5FnG2muxVpA2qStK2KW9Pi-35UXW9xDWmeZ9LRSPekGjS7BIIzb1jn8pHVyST7Yq0MDNmZJirkXMZrNyH-LkEBkJ6mPxJogeV7fLpsK5WUbXwyZk0cd_JThJL08p79ja43VkvXjs8S94xBcUUWYQHhd-cOVE-n6NtHEilCW74-9FXd6C9LkmAOCrvRqUuZeqYYeEevmhKH3vrKxwZwRlOqB1_t4L53STtgsyF0lp9gh-w">
                                        <script
                                            src="https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-"></script>
                                        <script>grecaptcha.ready(function () { grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', { action: 'submit' }).then(function (token) { document.getElementById('ed1c1fb5d40e4385a1685518e8e160eb').value = token; }); });</script>
                                    </form>
                                </div>

                            </div>




                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>
</div>

<script>
    document.getElementById('customer_login').addEventListener('submit', function (event) {
        var usernameInput = document.getElementById('username').value;
        var passwordInput = document.getElementById('password').value;

        var messageUsername = document.getElementById('messageUsername');
        var messagePassword = document.getElementById('messagePassword');

        // Reset previous error messages
        messageUsername.innerHTML = '';
        messagePassword.innerHTML = '';

        // Validate username
        if (usernameInput.trim() === '') {
            messageUsername.innerHTML = 'Vui lòng nhập tài khoản.';
            event.preventDefault(); // Prevent form submission
        }

        // Validate password
        if (passwordInput.trim() === '') {
            messagePassword.innerHTML = 'Vui lòng nhập mật khẩu.';
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
