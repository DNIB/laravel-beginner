<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>首頁</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight: 600;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .second-title {
                margin-top: 30px;
                margin-bottom: 30px;
                font-size: 30px;
            }

            .area-of-links {
                width: 900px;
            }

            .class-link {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                line-height: 50px;
            }

            .white-w {
                color: #636b6f;
                padding: 0 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                line-height: 50px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    104 課程連結
                </div>

                <div class="area-of-links">
                    @if ( count($subjects) )
                    <dic>
                        <ul>
                            @foreach( $subjects as $subject)
                                @component('url_record')
                                    @slot('title')
                                        {{ $subject['name'] }}
                                    @endslot
                                    @slot('url')
                                        {{ $subject['id'] }}
                                    @endslot
                                @endcomponent
                            @endforeach
                        </ul>
                    <div>
                    @endif
                </div>

                <div class="second-title">
                    <a href="/upload/newCourse" class="white-w"> 選課連結 </a>
                </div>

                <div class="second-title">
                    <a href="/upload/newComment" class="white-w"> 評論連結 </a>
                </div>

                <div class="second-title">
                    <a href="/upload/updateComment" class="white-w"> 更改評論 </a>
                </div>

                <div class="second-title">
                    <a href="/upload/deleteComment" class="white-w"> 刪除評論 </a>
                </div>
            </div>
        </div>
    </body>

    <script>
        
    </script>
</html>
