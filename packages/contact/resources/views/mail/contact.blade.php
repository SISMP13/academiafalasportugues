<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            background-color:lightgray;
            min-height:100vh;
            padding-top: 100px;
        }

        .body-mail{
            width:100%;
            max-width:680px;
            background-color:white;
            margin-left: auto;
            margin-right: auto;
            border-radius:20px;
            position:relative;
            padding-bottom: 100px;
        }

        .body-mail .body-mail__header{
            background-color:#FFF;
            padding:30px 40px;
            text-align: center;
            font-family:"Helvetica", sans-serif;
            color:white;
            font-size:18px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .body-mail .body-mail__header img{
            max-width:300px;
        }

        @media (max-width:600px){
            .body-mail .body-mail__header img{
                max-width:200px;
            }
        }

        .body-mail .body-mail__content{
            padding:30px 20px;
            line-height:1.4;
            font-size:15px;
            color:gray;
            font-family:"Helvetica", sans-serif;
        }

        .body-mail .body-mail__content .body-mail__listado-datos{
            padding-left: 20px;
            margin-top: 20px;
        }

        .body-mail .body-mail__content .body-mail__listado-datos li{
            margin-bottom: 10px;
        }

        .body-mail__footer{
            background-color: #1a4436;
            color:white;
            text-align: center;
            padding:30px 40px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            position:absolute;
            left:0;
            bottom:0;
            width:100%;
            font-size:13px;
            font-family:"Helvetica", sans-serif;
        }
    </style>
</head>
<body>
<div class="body-mail">
    <div class="body-mail__header">
        <img src="{{asset('assets/image/logo-mail2.png')}}" alt="{{config('app.name')}}" width="200">
    </div>
    <div class="body-mail__content">
        <p>
            Un usuario ha realizado una consulta a través de la página web {{config('app.name')}}.
            Los datos de la consulta son los siguientes:
        </p>
        <ul class="body-mail__listado-datos">
            <li>
                <strong>Nombre: </strong> {{$params['name']}}
            </li>
            <li>
                <strong>Email: </strong> {{$params['email']}}
            </li>
            @if(!empty($params['phone']))
                <li>
                    <strong>Teléfono: </strong> {{$params['phone']}}
                </li>
            @endif
            <li>
                <strong>Mensaje: </strong> {{$params['message']}}
            </li>
        </ul>
    </div>
    <div class="body-mail__footer">
        &copy; {{config('app.name')}} {{ date('Y') }}
    </div>
</div>
</body>
</html>
