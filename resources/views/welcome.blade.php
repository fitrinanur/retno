<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url("{{ asset('1.jpg') }}");
                background-size: cover;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100%;
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
            }
            .skripsi-title {
                font-size: 36px;
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
            
            .wrapper-box {
                background-color: #636b6f;
                /* opacity:0.2; */
                border-radius: 5px;
                padding :10px;
                color: #fff;
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

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="content">
               <div class="wrapper-box">
                   <div class="logo">
                    <img src="{{asset('logo_sinus.png')}}" alt="logo"/ style="height:150px;width:150px">
                   </div>
                   <div class="information">
                    <div class="skripsi-title">Sistem Rekomendasi Treatment Retno Salon</div>
                    <hr>
                    <div class="info-data">
                         <p>Disusun Oleh :</p>
                         <h3>Latifah Landari</h3>
                         <p>Teknologi Informatika S1 - 13.5.00084</p>
                    </div>
                </div>
               </div>
             

            </div>
        </div>
    </body>
</html>
