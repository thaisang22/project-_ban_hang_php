<div id="PageContainer" class="">
    <main class="main-content" role="main">
        <section id="page-wrapper">
            <div class="wrapper">
                <div class="inner">
                    <div class="grid">
                        <div class="grid__item large--one-third push--large--one-third text-center">
                            <h1>Tạo tài khoản</h1>
                            <div class="container" style="margin-top:0px ; position: unset;">
                                <div class="forms-container">
                                    <div class="signin-signup">
                                        <form action="index.php?action=dangky&act=dangky_act" method="post"
                                            autocomplete="off" id="form-register" class="sign-in-form">
                                            <h2 class="title">Đăng ký</h2>
                                            <div class="input-field form-group">
                                                <i class="fas fa-user"></i>
                                                <input id="username" name="txtName" type="text" placeholder="Tên đăng nhập"> <br>
                                                <span id="messageUsername" class="form-message"></span> 
                                            </div>
                                            <div class="input-field form-group">
                                                <i class="fas fa-user"></i>
                                                <input id="fullname" name="fullname" type="text" placeholder="Họ và tên"><br>
                                                <span id="messageUsername" class="form-message"></span> 
                                            </div>
                                            <div class="input-field form-group">
                                                <i class="fas fa-user"></i>
                                                <input id="diachi" name="diachi" type="text" placeholder="Địa chỉ"> <br>
                                                <span id="messageĐịa chỉ" class="form-message"></span> 
                                            </div>
                                            <div class="input-field form-group">
                                                <i class="fas fa-user"></i>
                                                <input id="sodienthoai" name="sodienthoai" type="number" placeholder="Số Điện thoại"> <br>
                                                <span id="messagesodienthoai" class="form-message"></span> 
                                            </div>
                                            

                                            <div class="input-field form-group">
                                                <i class="fas fa-envelope"></i>
                                                <input id="email" name="txtEmail" type="text" placeholder="Email"> <br>
                                                <span id="messageEmail" class="form-message"></span>
                                            </div>
                                            <div class="input-field form-group">
                                                <i class="fas fa-lock"></i>
                                                <input id="passwordr" name="txtPass" type="password"
                                                    placeholder="Password"> <br>
                                                <span id="messagePassword" class="form-message"></span>
                                            </div>
                                            <button  class="form-submit btn solid" type="submit" name="submit">Đăng
                                                ký</button>
                                                <div class="note form-error" id="loginErrorMessage" style=" text-align: center; ;display:<?php echo !empty($errorMsg) ? 'block' : 'none'; ?>;">
        <?php echo $errorMsg; ?></div>
                                <div class="content">
                                                <h3>Bạn đã có tài khoản?</h3>
                                                <p>
                                                    Hãy đăng nhập bằng tài khoản của bạn!
                                                </p>
                                                <a href="index.php?action=login" class="btn transparent"
                                                    id="sign-up-btn">
                                                    Đăng nhập
                                                </a>
                                            </div>
                                        </form>
                                        <p id="registration-success-message" style="color: green;"></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>
</div>
<!-- ... (Your HTML code) ... -->

<script>
    document.getElementById('form-register').addEventListener('submit', function (event) {
        var fullnameInput = document.getElementById('fullname').value;
        var emailInput = document.getElementById('email').value;
        var passwordInput = document.getElementById('passwordr').value;

        var messageUsername = document.getElementById('messageUsername');
        var messageEmail = document.getElementById('messageEmail');
        var messagePassword = document.getElementById('messagePassword');
        var registrationSuccessMessage = document.getElementById('registration-success-message');

        // Reset previous error messages
        messageUsername.innerHTML = '';
        messageEmail.innerHTML = '';
        messagePassword.innerHTML = '';
        registrationSuccessMessage.innerHTML = '';

        // Validate fullname
        if (fullnameInput.trim() === '') {
            messageUsername.innerHTML = 'Vui lòng nhập tên đầy đủ của bạn.';
            event.preventDefault(); // Prevent form submission
        }

        // Validate email
        if (emailInput.trim() === '') {
            messageEmail.innerHTML = 'Vui lòng nhập địa chỉ email.';
            event.preventDefault(); // Prevent form submission
        } else if (!validateEmail(emailInput)) {
            messageEmail.innerHTML = 'Địa chỉ email không hợp lệ.';
            event.preventDefault(); // Prevent form submission
        }

        // Validate password
        if (passwordInput.trim() === '') {
            messagePassword.innerHTML = 'Vui lòng nhập mật khẩu.';
            event.preventDefault(); // Prevent form submission
        }
    });

    // Function to validate email format
    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
</script>
