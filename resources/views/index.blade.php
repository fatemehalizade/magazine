<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه اصلی</title>
    <link rel="stylesheet" href="{{asset("public/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("public/fontello/fontello-8bc062fb/css/fontello.css")}}">
</head>
<body>
    <!-- message box -->
    <div class="MSGBox">
        <i class="icon-ok-circled2"></i>
        <p>عملیات با موفقیت انجام شد</p>
    </div>

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

        <!-- title section -->
        <div class="titleSec">
            <div class="title">
                <h1>{{$profile->name}}</h1>
                <p>{{$profile->description}}</p>
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

    <!-- Grouping section -->
    <div class="Container">
        <div class="GroupSection">
            <h3>دسته بندی</h3>
            <div class="GroupRow">
                @if (count($categories) != 0)
                    @foreach ($categories as $post)
                        <div class="Groups {{$post->Category->en_name}}">
                            <div class="groupBG"></div>
                            <a href="{{route("categoryPostsPage",["name" => $post->Category->name])}}">{{$post->Category->name}}</a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- last post -->
    <div class="Container">
        <div class="PostSec">
            <h3>پست های اخیر</h3>
            <div class="Posts">

                @if (count($latestPosts) != 0)
                    @foreach ($latestPosts as $latestPost)
                        <div class="Post">
                            <a href="{{route("postDetailPage",["id" => $latestPost->id])}}">
                                <div class="postIMG">
                                    <img src="{{asset("storage/".$latestPost->image)}}" alt="#">
                                </div>
                                <span>
                                    <i class="icon-slack"></i>
                                    {{$latestPost->Category->name}}
                                </span>
                                <h4>{{$latestPost->subject}}</h4>
                                <p>
                                    {{$latestPost->summery}}
                                </p>
                                <span class="posted">
                                <i class="icon-calendar"></i>
                                    <span>{{convertDateToFarsi($latestPost->created_at)}}</span>
                                </span>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>

            @if (count($latestPosts) != 0)
                <div class="showMore">
                    <a href="{{route("latestPostsPage")}}">
                        بیشتر
                        <i class="icon-plus-circled"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- last post -->
    <div class="Container">
        <div class="PostSec">
            <h3>پیشنهاد سردبیر</h3>
            <div class="Posts">

                @if (count($suggestedPosts) != 0)
                    @foreach ($suggestedPosts as $suggestedPost)
                        <div class="Post">
                            <a href="{{route("postDetailPage",["id" => $suggestedPost->id])}}">
                                <div class="postIMG">
                                    <img src="{{asset("storage/".$suggestedPost->image)}}" alt="#">
                                </div>
                                <span>
                                    <i class="icon-slack"></i>
                                    {{$suggestedPost->Category->name}}
                                </span>
                                <h4>{{$suggestedPost->subject}}</h4>
                                <p>
                                    {{$suggestedPost->summery}}
                                </p>
                                <span class="posted">
                                    <i class="icon-calendar"></i>
                                    <span>{{convertDateToFarsi($suggestedPost->created_at)}}</span>
                                </span>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>

            @if (count($suggestedPosts) != 0)
                <div class="showMore">
                    <a href="{{route("suggestedPostsPage")}}">
                        بیشتر
                        <i class="icon-plus-circled"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- last post -->
    <div class="Container">
        <div class="PostSec">
            <h3>پست های پربازدید</h3>
            <div class="Posts">
                @if (count($mostVisited) != 0)
                    @foreach ($mostVisited as $mostVisitedPost)
                        <div class="Post">
                            <a href="{{route("postDetailPage",["id" => $mostVisitedPost->Post->id])}}">
                                <div class="postIMG">
                                    <img src="{{asset("storage/".$mostVisitedPost->Post->image)}}" alt="#">
                                </div>
                                <span>
                                    <i class="icon-slack"></i>
                                    {{$mostVisitedPost->Post->Category->name}}
                                </span>
                                <h4>{{$mostVisitedPost->Post->subject}}</h4>
                                <p>
                                    {{$mostVisitedPost->Post->summery}}
                                </p>
                                <span class="posted">
                                    <i class="icon-calendar"></i>
                                    <span>{{convertDateToFarsi($mostVisitedPost->Post->created_at)}}</span>
                                </span>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>
            @if (count($mostVisited) != 0)
                <div class="showMore">
                    <a href="{{route("mostVisitedPostsPage")}}">
                        بیشتر
                        <i class="icon-plus-circled"></i>
                    </a>
                </div>
            @endif
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
