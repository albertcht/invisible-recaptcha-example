<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Invisible reCAPTCHA - Ajax Example
                </div>

                g-recaptcha-response-1: 
                <div id="g-recaptcha-response-1">
                    not received yet
                </div>

                g-recaptcha-response-2: 
                <div id="g-recaptcha-response-2">
                    not received yet
                </div>

                {!! Form::open(['url' => '/', 'id' => 'form1']) !!}
                @captcha()
                {!! Form::submit('Sumbit', ['id'=>'s1']) !!}
                {!! Form::close() !!}

                {!! Form::open(['url' => '/']) !!}
                @captcha()
                {!! Form::submit('Sumbit2', ['id'=>'s2']) !!}
                {!! Form::close() !!}
            </div>
        </div>

        <script type="text/javascript">
            $('#s1').on('captcha', function(e) {
                $.ajax({
                    type: "POST",
                    url: "/api",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "g-recaptcha-response": $("#g-recaptcha-response").val()
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log('submit successfully');
                        console.log(data);
                        $('#g-recaptcha-response-1').html(data.token)
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
                _submitAction = false;
            });
            $('#s2').on('captcha', function(e) {
                $.ajax({
                    type: "POST",
                    url: "/api",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "g-recaptcha-response": $("#g-recaptcha-response").val()
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log('submit successfully');
                        console.log(data);
                        $('#g-recaptcha-response-2').html(data.token)
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
                _submitAction = false;
            });
        </script>
    </body>
</html>
