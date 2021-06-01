<html lang="ko">
    <head>
        <meta charset="utf-8" />
        <title>mediconex</title>
        <meta name="viewport" content="width=device-width, user, sxalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('mediconex/css/mediconex.css')}}" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />      
        <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    </head>
    <body>
        <div id="wrap">
            <div class="inner">
                <section class="sec_login">
                    <h1><img src="{{ URL::asset('mediconex/img/mediconexLogo2.png')}}" alt="메디코넥스 관리자페이지입니다" /></h1>
                    <form id="loginForm" name="loginForm" class="" method="POST" action="http://localhost:8000/api/users/login">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <fieldset class="login">
                            <legend>Admin Login <i class="fa fa-user-o" aria-hidden="true"></i> </legend>
                            <dl>
                                <dt>아이디</dt>
                                <dd><input type="email" id="" name="email" placeholder="Email" required /></dd>
                            </dl>
                            <dl>
                                <dt>비밀번호</dt>
                                <dd><input type="password" id="" name="password" placeholder="password" required /></dd>
                            </dl>
                            <div class="loginBtn">
                                <div class="btn">
                                    <button type="button" onclick="processLogin()">로그인</button>
                                </div>
                            </div>
                        </fieldset><!-- .login End -->
                    </form>
                    <div class="member">
                        <ul>
                            <li><a href="">아이디/비밀번호 찾기</a></li>
                            <li><a href="">회원가입</a></li>
                        </ul>
                    </div><!-- .id_ps End -->
                </section><!-- .sec_login End -->
            </div><!-- .inner End -->
        </div><!-- #wrap End -->
    </body>
</html>

<script>
    function processLogin() {
        let formData = $('#loginForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "http://localhost:8000/api/users/login",
            data: { formData },
            success: function(data) {
               console.log(data);
            },
                    
            error: function(data) {
                alert('로그인 전송 실패');
            }
        });
    }
</script>