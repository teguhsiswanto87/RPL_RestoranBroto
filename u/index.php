<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Pegawai</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <!--    <link rel="stylesheet" type="text/css" href="../assets/fonts/fontawesome-all.min.css">-->
    <link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/fonts/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="login_check.php">
					<span class="login100-form-title p-b-43">
						Login Pegawai
					</span>


                <div class="wrap-input100 validate-input" data-validate="Valid NIP is required: santoso12">
                    <input class="input100" type="text" name="nip" placeholder="        Nomor Induk Pegawai">
                    <span class="focus-input100"></span>
                    <span class="label-input100">NIP</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <!--                    <div class="contact100-form-checkbox">-->
                    <!--                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">-->
                    <!--                        <label class="label-checkbox100" for="ckb1">-->
                    <!--                            Remember me-->
                    <!--                        </label>-->
                    <!--                    </div>-->

                    <!--                    <div>-->
                    <!--                        <a href="#" class="txt1">-->
                    <!--                            Forgot Password?-->
                    <!--                        </a>-->
                    <!--                    </div>-->
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="btnLogin" type="submit">
                        Login
                    </button>
                </div>

                <!--                <div class="text-center p-t-46 p-b-20">-->
                <!--						<span class="txt2">-->
                <!--							or sign up using-->
                <!--						</span>-->
                <!--                </div>-->
                <!---->
                <!--                <div class="login100-form-social flex-c-m">-->
                <!--                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">-->
                <!--                        <i class="fa fa-facebook-f" aria-hidden="true"></i>-->
                <!--                    </a>-->
                <!---->
                <!--                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">-->
                <!--                        <i class="fa fa-twitter" aria-hidden="true"></i>-->
                <!--                    </a>-->
                <!--                </div>-->
            </form>

            <div class="login100-more"
                 style="background-image: url('https://images.pexels.com/photos/1024359/pexels-photo-1024359.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');">
            </div>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="../assets/js/jquery.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/js/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../assets/js/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../assets/js/main.js"></script>

</body>
</html>