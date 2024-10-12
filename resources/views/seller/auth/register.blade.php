<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>تسجيل حساب بائع جديد</title>
<meta name="author" content="Sayed Khattab">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Fav Icon -->
<link rel="icon" href="user-assets/images/favicon.png" type="image/png">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{ asset('user-assets/css/font-awesome-all.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/css/nice-select.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/css/color.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('user-assets/css/responsive.css') }}" rel="stylesheet">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

</head>
<!-- page wrapper -->
<body>
    <div class="boxed_wrapper">
        <!-- preloader -->
        <div class="preloader"></div>
        <!-- preloader -->

        <!-- main header -->
        <header class="main-header style-one">
            <!-- header-top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="top-inner clearfix">
                        <ul class="info pull-left clearfix">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation">
                                    <li><a href="#" style="color: white; font-weight: 800;">دخول المستخدمين</a></li>   
                                    <li class="dropdown"><a href="#" style="color: white;">تواصل معنا</a></li>  
                                    <li class="dropdown"><a href="#" style="color: white;">من نحن</a></li> 
                                </ul>
                            </div>
                        </ul>
                        <div class="right-column pull-right clearfix">
                            <ul class="social-links clearfix">
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                            <div class="dropdown-box clearfix">
                                <div class="language">
                                    <a href="#" class="link" onclick="changeLanguage('en')">العربية</a>
                                    <ul>
                                        <li><a href="#" onclick="changeLanguage('ar')">English</a></li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- header-lower -->
            <div class="auto-container">
                <div class="header-lower">
                    <div class="outer-box" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="menu-right-content" style="order: 1;">
                            <div class="btn-box"><a href="#" class="theme-btn-one"><span class="btn-shape"></span>انضم الينا</a></div>
                        </div>
                        <div class="menu-area" style="order: 2;">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                            
                            </nav>
                        </div>
                        <div class="logo-box" style="order: 3;">
                            <figure class="logo"><a href="/"><img src="user-assets/images/logo.png" alt=""></a></figure>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="header-lower">
                        <div class="outer-box" style="display: flex; justify-content: space-between; align-items: center; top: 0px !important;">
                            <div class="menu-right-content" style="order: 1;">
                                <div class="btn-box"><a href="#" class="theme-btn-one"><span class="btn-shape"></span>انضم الينا</a></div>
                            </div>
                            <div class="menu-area" style="order: 2;">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler">
                                    <i class="icon-bar"></i>
                                    <i class="icon-bar"></i>
                                    <i class="icon-bar"></i>
                                </div>
                                <nav class="main-menu navbar-expand-md navbar-light">
                                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    </div>
                                </nav>
                            </div>
                            <div class="logo-box" style="order: 3;">
                                <figure class="logo"><a href="/"><img src="home-assets/images/new-logo.png" alt=""></a></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

       <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="menu-outer"></div>
                
                <div class="btn-box" style="margin-top: 40px;">
                    <a href="#" class="theme-btn-one"><span class="btn-shape"></span>انضم الينا</a>
                </div>
            </nav>
        </div>
        <!-- End Mobile Menu -->

        <!-- Registration Form -->
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 150px; margin-bottom: 50px;">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center bg-primary text-white" style="color: #e43c59;">تسجيل بائع جديد</div>
                        <div class="card-body">
                            <form method="POST" id="phone-form" dir="rtl">
                                @csrf
                                <div class="form-group">
                                    <label for="phone_input" style="text-align: right; display: block;">رقم الهاتف</label>
                                    <div class="input-group" style="direction: ltr;">
                                        <span class="input-group-text">966</span>
                                        <input type="text" class="form-control" id="phone_input" name="phone" placeholder="5XXXXXXXX" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 9);">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 w-100">إرسال كود التحقق</button>
                            </form>

                            <div id="otp-section" style="display:none;" dir="ltr">
                                <form method="POST" id="otp-form">
                                    @csrf
                                    <input type="text" class="form-control mt-3" name="otp" placeholder="أدخل كود التحقق" required>
                                    <div class="row">
                                        <button type="submit" class="btn btn-primary mt-3 w-100">تحقق من OTP</button>
                                </form>

                                    <!-- Resend OTP -->
                                    <!-- <form method="POST" id="resend-otp-form">
                                        @csrf
                                        <button type="submit" class="btn btn-primary mt-3 w-100" id="resend-otp-btn">اعادة ارسال كود التحقق</button>
                                    </form> -->
                                </div>
                            </div>

                            <div id="owner-section" class="container" style="display:none;"  dir="rtl">
                                <form enctype="multipart/form-data" action="{{ route('seller.register') }}" method="POST" id="owner-form">
                                    @csrf
                                    <div class="form-group row text-right">
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <label for="first_name" class="form-label">الاسم الأول</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="الاسم الأول" required>
                                            @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <!-- Last Name -->
                                        <div class="col-md-6">
                                            <label for="last_name" class="form-label">اسم العائلة</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="الاسم الأخير" required>
                                            @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" style="text-align: right; display: block;">البريد الالكتروني</label>
                                        <input type="email" name="email" id="email" class="form-control text-left" placeholder="name@company.com" required>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password" style="text-align: right; display: block;">كلمة المرور</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-check" style="margin-right: 20px !important;">
                                        <input type="checkbox" class="form-check-input" id="terms" required style="text-align: right; display: block;">
                                        <label class="form-check-label" style="text-align: right; display: block;" for="terms">لقد وافقت علي <a href="#">السياسات والشروط</a></label>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100" style="background-color: #e43c59; border-color: #e43c59;">انشاء حساب</button>
                                    <p class="text-center mt-3">
                                        لديك حساب بالفعل؟ <a href="{{ route('seller.loginPage') }}" style="color: #e43c59;">سجل دخولك هنا</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Modal -->
            <div class="modal fade text-center" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">تم التسجيل بنجاح</h5>
                    </div>
                    <div class="modal-body">
                    تم التسجبل بنجاح , سيتم مراجعة طلبكم من قبل المسؤول وسيتم اشعاركم في اقرب وقت   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="window.location.href='#'">موافق</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="main-footer" style="direction: rtl;">
            <div class="auto-container">
                <div class="widget-section">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <figure class="footer-logo"><a href="#"><img src="user-assets/images/footer-logo.png" alt=""></a></figure>
                                <p style="text-align: right;">اكتشف مجموعة من الشقق المفروشة في المدن الرئيسية في السعودية مع URSTAY. مثالية للإقامات القصيرة والطويلة الأجل.</p>
                                <ul class="social-links clearfix" style="float: right;">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>ما نقدمه</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="#">شقق فاخرة</a></li>
                                        <li><a href="#">أجنحة عائلية</a></li>
                                        <li><a href="#">شقق استوديو</a></li>
                                        <li><a href="#">الإسكان للشركات</a></li>
                                        <li><a href="#">إقامات طويلة</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>عن UrStay</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="#">من نحن</a></li>
                                        <li><a href="#">خدماتنا</a></li>
                                        <li><a href="#">المواقع</a></li>
                                        <li><a href="#">فريقنا</a></li>
                                        <li><a href="#">شهادات العملاء</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>تواصل معنا</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info clearfix">
                                        <li>الرياض، المملكة العربية السعودية</li>
                                        <li><a href="tel:+966500000000">(+966) 500 000 000</a></li>
                                        <li><a href="mailto:support@urstay.com">support@urstay.com</a></li>
                                        <li>ساعات العمل: الأحد - الخميس: 9 صباحاً إلى 6 مساءً</li>
                                        <li>الجمعة مغلق</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="footer-bottom centred">
                    <div class="auto-container">
                        <div class="copyright">
                            <p>جميع الحقوق محفوظة 2024 لشركة UrStay&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><span>خريطة الموقع</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><span>الشروط والأحكام</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->

        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="far fa-long-arrow-up"></span>
        </button>
    </div>


    
    <script>
$(document).ready(function() {
    // Phone form submission
    $('#phone-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "{{ route('send.otp') }}",
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#otp-section').show();
                    $('#phone-form').hide();
                } else {
                    alert(response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Properly display the error message
                var errorMessage = jqXHR.responseJSON?.message || 'Unknown error';
                alert('Error: ' + errorMessage);
            }
        });
    });

    // OTP form submission
    $('#otp-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "{{ route('verify.otp') }}",
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#otp-section').hide();
                    $('#owner-section').show();
                } else {
                    alert(response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Properly display the error message
                var errorMessage = jqXHR.responseJSON?.message || 'Unknown error';
                alert('Error: ' + errorMessage);
            }
        });
    });

    // Owner form submission
    $('#owner-form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{ route('seller.register') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status === 'success') {
                    $('#successModal').modal('show');
                } else {
                    alert(response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log('Full error response:', jqXHR); // Log the full error object
            var errorMessage = jqXHR.responseJSON?.message || 'Unknown error';
            alert('Error: ' + errorMessage);
            }
        });
    });
});

</script>


   <!-- jQuery plugins -->
<script src="{{ asset('user-assets/js/jquery.js') }}"></script>
<script src="{{ asset('user-assets/js/popper.min.js') }}"></script>
<script src="{{ asset('user-assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('user-assets/js/owl.js') }}"></script>
<script src="{{ asset('user-assets/js/wow.js') }}"></script>
<script src="{{ asset('user-assets/js/validation.js') }}"></script>
<script src="{{ asset('user-assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('user-assets/js/appear.js') }}"></script>
<script src="{{ asset('user-assets/js/scrollbar.js') }}"></script>
<script src="{{ asset('user-assets/js/jquery.nice-select.min.js') }}"></script>

<!-- main-js -->
<script src="{{ asset('user-assets/js/script.js') }}"></script>


</body>
</html>
