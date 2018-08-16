<!DOCTYPE html>
  <html>
    <head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-44624390-4"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-44624390-4');
      </script>

      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <link rel="stylesheet" href={{ asset('css/game.css')}} >
      <link rel="stylesheet" href={{ asset('css/chart.css')}} >

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <meta http-equiv="content-language" content="jp">
      <meta name="robots" content="index,follow">
      <meta name="description" content="キリル文字のタイピングを練習するウェブアプリです。ロシア語、ウクライナ語、ブルガリア語のタイピングを練習できます。
      This is the web app for practicing touch typing in Cyrillic alphabets (Russian, Ukrainian, Bulgarian, and etc).">

      <!--OGP tags for sns-->
      <meta property="og:title" content="@yield('title')">
      <meta property="og:url" content="http://cyrillic.typing-up.pro/">
      <meta property="og:image" content={{ asset('img/thum.png')}}>
      <meta property="og:site_name" content="Typing.Cyrillic">
      <meta property="og:description" content="キリル文字のタイピングを練習するウェブアプリです。ロシア語、ウクライナ語、ブルガリア語のタイピングを練習できます。
      This is the web app for practicing touch typing in Cyrillic alphabets (Russian, Ukrainian, Bulgarian, and etc).">

      <link rel="canonical" href="https://cyrillic.typing-up.pro/">
      <!--Google analytics-->
      <title>@yield('title')</title>

    </head>

    <body class="blue-grey lighten-5">
    <nav>
      <div class="nav-wrapper teal accent-4">
        <a href="/" class="brand-logo center">Typing.Tech Beta</a>
      </div>
    </nav>

@yield('content')

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src={{ asset('js/materialize.min.js')}}></script>
      <script>
        $(document).ready(function(){
          $('.modal-trigger').leanModal();
        });
      </script>
      <!-- load js only game window -->
      @if (Request::segment(1) == "game")
      <script type="text/javascript" src={{ asset('js/typingru.js?2') }}></script>
      @endif

      </body>
  </html>
