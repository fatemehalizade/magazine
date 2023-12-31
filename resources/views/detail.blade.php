<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جزئیات پست</title>
    <link rel="stylesheet" href="{{asset("public/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("public/fontello/fontello-8bc062fb/css/fontello.css")}}">
</head>
<body>
    <!-- message box -->
    @if (session("message"))
    <div class="MSGBox">
        <i class="icon-ok-circled2"></i>

            <p>{{session("message")}}</p>
        </div>
    @endif

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

    <!-- detail magazine -->
    <div class="detailContainer">
        <div class="detailRow">
            <div class="detailHeader">
                <div class="detailIMG">
                    <img src="{{asset("storage/".$detail->image)}}" alt="{{$detail->subject}}">
                </div>
                <div class="detailTitle">
                    <span>
                        <i class="icon-slack"></i>
                        {{$detail->Category->name}}
                    </span>
                    <h1>{{$detail->subject}}</h1>
                    <p>
                        {{$detail->summery}}
                    </p>
                    <span>
                        <i class="icon-calendar"></i>
                        <span>{{convertDateToFarsi($detail->created_at)}}</span>
                    </span>
                    <span>
                        <i class="icon-clock"></i>
                        <span>{{$detail->time_reading}} دقیقه</span>
                    </span>
                    <span>
                        <i class="icon-th-large"></i>
                        <span>{{count($detail->View)}} بازدید</span>
                    </span>
                </div>
            </div>

            <div class="detailDes">
                <p>
                    {{$detail->description}}
                </p>
            </div>
            <div class="labelContainer">
                <h3>برچسب ها :</h3>
                <div class="labels">
                    @if (count($detail->Tag) != 0)
                        @foreach ($detail->Tag as $tag)
                            <span>
                                <i class="icon-slack"></i>
                                {{$tag->name}}
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- message -->
    <div class="messageContainer">
        <form action="{{route("createComment",["status" => "comment"])}}" method="POST">
            @csrf
            <h3>پیامتان را ارسال کنید</h3>
            @if (!Auth::check())
                <div class="loneInput">
                    <input type="text" name="fullName" placeholder="نام و نام خانوادگی" value="{{old("fullName")}}">
                    @if (session("status"))
                        @if (session()->get("status") == "comment")
                            @error("fullName")
                                <div class="tooltip">
                                    {{$message}}
                                    <i class="icon-off"></i>
                                </div>
                            @enderror
                        @endif
                    @endif
                </div>
                <div class="loneInput">
                    <input type="text" name="commentEmail" placeholder="ایمیل" value="{{old("commentEmail")}}">
                    @if (session("status"))
                        @if (session()->get("status") == "comment")
                            @error("commentEmail")
                            <div class="tooltip">
                                {{$message}}
                                <i class="icon-off"></i>
                            </div>
                            @enderror
                        @endif
                    @endif
                </div>
            @endif
            <input type="hidden" name="commentId" value="0">
            <input type="hidden" name="postId" value="{{$detail->id}}" id="">
            <div class="loneInput">
                <textarea name="comment" id="" cols="30" rows="10" placeholder="پیام">{{old("comment")}}</textarea>
                @if (session("status"))
                    @if (session()->get("status") == "comment")
                        @error("comment")
                        <div class="tooltip">
                            {{$message}}
                            <i class="icon-off"></i>
                        </div>
                        @enderror
                    @endif
                @endif
            </div>

            <input type="submit" value="ارسال" class="sendBTN" />
        </form>
    </div>

    <div class="commentContainer">
        <div class="commentSec">
            <h3>نظرات کاربران</h3>
            @if (count($comments) != 0)
                @foreach ($comments as $comment)
                    <div class="comment">
                        @if ($comment->comment_id != 0)
                            <p class="commentOwner commentReply"><i class="icon-reply"></i>در پاسخ به کامنت : {{$comment->comment_id_comment}}</p>
                        @endif

                        <p class="commentOwner">
                            <i class="icon-user-circle-o"></i>
                            {{$comment->full_name}} می گوید :
                        </p>
                        <p class="commentTime">{{convertDateToFarsi($comment->created_at)}}</p>
                        <p class="commentTXT">{{$comment->comment}}</p>
                        <span class="answerBTN" onClick="setCommetId({{$comment->id}})">پاسخ</span>
                    </div>
                @endforeach
            @else
                <p>نظری تاکنون ثبت نشده است</p>
            @endif
        </div>
    </div>

    <div class="commentModalContainer">
        <i class="icon-cancel"></i>
        <div class="commentModal">
            <form action="{{route("createComment",["status" => "reply"])}}" method="POST">
                @csrf
                <h3>پاسختان را ارسال کنید</h3>
                @if (!Auth::check())
                    <input type="text" name="fullName" placeholder="نام و نام خانوادگی" value="{{old("fullName")}}">
                    @if (session("status"))
                        @if (session()->get("status") == "reply")
                            @error("fullName")
                                <div class="tooltip">
                                    {{$message}}
                                    <i class="icon-off"></i>
                                </div>
                            @enderror
                        @endif
                    @endif
                    <input type="text" name="commentEmail" placeholder="ایمیل" value="{{old("commentEmail")}}">
                    @if (session("status"))
                        @if (session()->get("status") == "reply")
                            @error("commentEmail")
                                <div class="tooltip">
                                    {{$message}}
                                    <i class="icon-off"></i>
                                </div>
                            @enderror
                        @endif
                    @endif
                @endif
                <input type="hidden" name="commentId" value="0" id="commentIdH">
                <input type="hidden" name="postId" value="{{$detail->id}}" id="">
                <textarea name="comment" id="" cols="30" rows="10" placeholder="پیام">{{old("comment")}}</textarea>
                @if (session("status"))
                    @if (session()->get("status") == "reply")
                        @error("comment")
                        <div class="tooltip">
                            {{$message}}
                            <i class="icon-off"></i>
                        </div>
                        @enderror
                    @endif
                @endif
                <input type="submit" value="ارسال" class="sendBTN" />
            </form>
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
    <script>
        function setCommetId(id){
            $("#commentIdH").val(id);
        }
    </script>
    @if (session("message"))
        <script>
            MessageBox()
        </script>
    @endif
</body>
</html>
