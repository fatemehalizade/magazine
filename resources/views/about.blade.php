<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>درباره ما</title>
    <link rel="stylesheet" href="{{asset("public/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("public/fontello/fontello-8bc062fb/css/fontello.css")}}">
</head>
<body>
    <!-- header -->
    <header class="siteHead">
        <!-- toolbar -->
        <div class="toolBar">
            <div class="tools">
                <button class="MenuBTN">
                    <i class="icon-menu"></i>
                </button>


                @if (Auth::user())
                    @if (Auth::user()->Role->name == "admin")
                        <a href="{{route("adminDashboardPage")}}"></a>
                    @else
                        <a href="{{route("writerDashboardPage")}}"></a>
                    @endif
                @else
                    <a href="#" class="login">ورود/ثبت نام</a>
                @endif


                <form action="{{route("searchPosts")}}" method="POST" class="search">
                    @csrf
                    <i class="icon-search"></i>
                    <input type="text" name="text" placeholder="جست و جو...">
                </form>
            </div>
            <!-- logo -->
            <div class="logoSec">
                <a href="index.html">
                    <img src="@if ($profile->logo)
                        {{asset("storage/".$profile->logo)}}
                    @else
                        {{asset("public/image/logo.jpg")}}
                    @endif" alt="{{$profile->name}}">
                </a>
            </div>
        </div>

        <!-- modal menu -->
        <div class="MenuModal">
            <!-- menu -->
            <div class="MenuSec">
                <i class="icon-cancel"></i>
                <ul class="menu">
                    <li>
                        <a href="{{route("homePage")}}">صفحه اصلی</a>
                    </li>
                    <li>
                        <a href="{{route("MagazinesPage")}}">مجله ها</a>
                    </li>
                    <li>
                        <a href="{{route("aboutPage")}}">درباره ی ما</a>
                    </li>
                    <li>
                        <a href="{{route("contactPage")}}">تماس با ما</a>
                    </li>
                </ul>

                <div class="backSec">
                    <img src="{{asset("public/image/menu.avif")}}" alt="">
                </div>
            </div>
            <!-- login -->
            <div class="LoginSec">
                <i class="icon-cancel"></i>

                <div class="loginContainer">
                    <h2>ورود نویسنده</h2>
                    <form action="{{route("login")}}" method="POST">
                        @csrf
                        <div class="MSGSec">
                            <div class="tooltip">
                                <p>
                                    @error('loginUsername')
                                        {{$message}}
                                    @enderror
                                </p>
                                <i class="icon-down-dir"></i>
                            </div>
                            <input type="text" name="loginUsername" placeholder="نام کاربری" value="{{ old("loginUsername") }}">
                        </div>
                        <div class="MSGSec">
                            <div class="tooltip">
                                <p>
                                    @error('loginPassword')
                                        {{$message}}
                                    @enderror
                                </p>
                                <i class="icon-down-dir"></i>
                            </div>
                            <input type="text" name="loginPassword" placeholder="رمز عبور" value="{{ old("loginPassword") }}">
                        </div>
                        <input class="sendBTN" type="submit" value="ورود" class="LoginBTN" />
                    </form>

                    <a href="#" class="GoRegister">ایجاد حساب جدید</a>
                </div>

                <div class="backSec">
                    <img src="{{asset("public/image/login.avif")}}" alt="">
                </div>


            </div>
            <!-- register -->
            <div class="RegisterSec">
                <i class="icon-cancel"></i>

                <div class="RegisterContainer">
                    <h2>ثبت نام نویسنده</h2>
                    <form action="{{route("register")}}" method="POST">
                        @csrf
                        <div class="MSGSec">
                            <div class="tooltip">
                                <p>
                                    @error('firstName')
                                        {{$message}}
                                    @enderror
                                </p>
                                <i class="icon-down-dir"></i>
                            </div>
                            <input type="text" name="firstName" placeholder="نام " value="{{ old("firstName") }}">
                        </div>
                        <div class="MSGSec">
                            <div class="tooltip">
                                <p>
                                    @error('lastName')
                                        {{$message}}
                                    @enderror
                                </p>
                                <i class="icon-down-dir"></i>
                            </div>
                            <input type="text" name="lastName" placeholder="نام خانوادگی" value="{{ old("lastName") }}">
                        </div>
                        <div class="MSGSec">
                            <div class="tooltip">
                                <p>
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </p>
                                <i class="icon-down-dir"></i>
                            </div>
                            <input type="email" placeholder="ایمیل" value="{{ old("email") }}">
                        </div>
                        <div class="MSGSec">
                            <div class="tooltip">
                                <p>
                                    @error('mobileNumber')
                                        {{$message}}
                                    @enderror
                                </p>
                                <i class="icon-down-dir"></i>
                            </div>
                            <input type="tel" name="mobileNumber" placeholder="شماره تماس" value="{{ old("mobileNumber") }}">
                        </div>
                        <div class="MSGSec">
                            <div class="tooltip">
                                <p>
                                    @error('username')
                                        {{$message}}
                                    @enderror
                                </p>
                                <i class="icon-down-dir"></i>
                            </div>
                            <input type="text" name="username" placeholder="نام کاربری" value="{{ old("username") }}">
                        </div>
                        <div class="MSGSec">
                            <div class="tooltip">
                                <p>
                                    @error('password')
                                        {{$message}}
                                    @enderror
                                </p>
                                <i class="icon-down-dir"></i>
                            </div>
                            <input type="text" name="password" placeholder="رمز عبور" value="{{ old("password") }}">
                        </div>
                        <div class="MSGSec">
                            <input type="text" name="password_confirmation" placeholder="تکرار رمز عبور">
                        </div>
                        <input class="sendBTN" type="submit" value="ثبت نام" class="registerBTN">
                    </form>

                    <a href="#" class="GoLogin">ورود به حساب</a>
                </div>

                <div class="backSec">
                    <img src="{{asset("public/image/register.avif")}}" alt="">
                </div>


            </div>
        </div>
    </header>

    <!-- about us section -->

    <div class="aboutRow">
        <div class="section">
            <div class="aboutUsIMG">
                <img src="{{asset("public/image/about us 1.avif")}}" alt="#">
            </div>
        </div>
        <div class="section">
            <h2>درباره ی ما</h2>
            <p>
                {{$profile->description}}
            </p>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="footerSec">
            <div class="footerMenu">
                <h5>منو</h5>
                <ul>
                    <li>
                        <a href="{{route("homePage")}}">صفحه اصلی</a>
                    </li>
                    <li>
                        <a href="{{route("MagazinesPage")}}">مجله ها</a>
                    </li>
                    <li>
                        <a href="{{route("aboutPage")}}">درباره ما</a>
                    </li>
                    <li>
                        <a href="{{route("contactPage")}}">تماس باما</a>
                    </li>
                </ul>
            </div>

            <div class="sitAddress">
                <h5>آدرس</h5>
                <p>
                    آدرس:
                    <span>
                        @if ($profile->address)
                            {{$profile->address}}
                        @else
                            {{"---"}}
                        @endif
                    </span>
                </p>
                <p>
                    شماره تماس:
                    <span>
                        @if ($profile->mobile_number)
                            {{$profile->mobile_number}}
                        @else
                            {{"---"}}
                        @endif
                    </span>
                </p>
                <p>
                    ایمیل:
                    <span>
                    @if (count($socialMedias) != 0)
                        @foreach ($socialMedias as $socialMedia)
                            @if ($socialMedia->name == "ایمیل")
                                {{$socialMedia->url}}
                            @endif
                        @endforeach
                    @endif
                    </span>
                </p>
            </div>

            <div class="socialMedia">
                <h5>شبکه های اجتماعی</h5>
                @if (count($socialMedias) != 0)
                    @foreach ($socialMedias as $socialMedia)
                        <a href="{{$socialMedia->url}}">
                            <i class="icon-{{$socialMedia->en_name}}"></i>
                            {{$socialMedia->name}}
                        </a>
                    @endforeach
                @endif
            </div>

            <div class="footerAboutUs">
                <h5>درباره ما</h5>
                <img src="@if ($profile->logo)
                        {{asset("storage/".$profile->logo)}}
                    @else
                        {{asset("public/image/logo.jpg")}}
                    @endif" alt="{{$profile->name}}" />
                <p>
                    {{$profile->description}}
                </p>
            </div>
        </div>
        <small>تمامی حقوق برای وبسایت مجله محفوظ است </small>
    </footer>
    <script src="{{asset("public/js/JQuery.js")}}"></script>
    <script src="{{asset("public/js/JavaScript.js")}}"></script>
</body>
</html>
