@section('title', 'Typing.Cyrillic - '.$lang)

@extends('layouts.main')

@section('content')
<main>
  <div class="container">

    <div class="row">
    <br>

      <div class="col s9">
        <!-- Typing field -->
        <div class="card-panel gamewindow">
              <!-- 問題　Questionary Area -->
              <div id="question" class="grey-text text-darken-4 question"></div>
              <div id="trans" class="grey-text trans"></div>
              <!-- 回答　Answer Area-->
              <div class="row">
                <form class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="typed" class="materialize-textarea red-text text-darken-2 typedtxt" wrap="soft" autofocus readonly></textarea>
                      <label for="typed"></label>
                    </div>
                    <div id="misstyped" class="col s12 misstyped indigo-text"></div>
                  </div>
                </form>
              </div>
              <!--判定-->
        <div id="answer"></div>
        </div>
      </div>

      <div class="col s3">
        <!-- Info Panel  -->
        <div class="card-panel grey dark-2 white-text" style="padding:10px;">
          <p>Time (10 sec): <progress id="sec" value="0" max="10" style="width:100%;"></progress>
          <p>Q:  <span id="qcount">0</span>/<span id="qtotal"></span></p>
        </div>

        <a class="btn col s12 indigo" onclick="skip()"><i class="material-icons left">skip_next</i>SKIP</a><br><br>
        <a class="btn col s12 blue-grey" onclick="reset()"><i class="material-icons left">replay</i>RESET</a><br><br>
        <a class="btn col s12 lime darken-3" href="/"><i class="material-icons left">settings_power</i>END</a>
        <br><br>
        <button data-target="modal1" class="modal-trigger btn col s12 orange darken-3"><i class="material-icons left">live_help</i>HELP</button><br><br>
        <a href="https://goo.gl/forms/LfdHgaVzdLPRTayX2" target="_blank" style="margin-top:10px;">バグ報告 Bug Report</a>
      </div>

    </div>
  <!-- container end-->
  </div>
  </main>

  <!-- Modal Structure for start window-->
    <div id="modal3" class="modal">
      <div id="start" class="modal-content center">
       <h3>Ready?</h3>
       <p>キーボードの設定を{{$lang}}に変えてください</p>
       <p>Change your keyboard language to {{$lang}}.</p>
       <button class="modal-action modal-close btn-large orange darken-3" style="width:80%;" onclick="newQuestion(0)">GO! - Press Enter Key</button><br><br>
       <a class="btn grey" href="/" style="width:35%;"><i class="material-icons left">settings_power</i>END</a>
       <button data-target="modal1" class="modal-trigger btn col s12 grey" style="width:35%;"><i class="material-icons left">live_help</i>HOW TO PLAY</button><br><br>

      </div>
    </div>

 <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      @include('layouts.help')
    </div>
    <div class="modal-footer">
      <button class="modal-action modal-close btn-flat ">OK</button>
    </div>
  </div>

 <!-- Modal Structure for result window-->
  <div id="modal2" class="modal">
    <div id="result" class="modal-content">
    </div>
    <div class="center" style="clear:both;">
      <br>
      <button class="modal-action modal-close btn orange darken-3" style="width:80%;" onclick="reset()"><i class="material-icons left">play_arrow</i>TRY AGAIN - PRESS ENTER KEY</button><br><br>
      <a id="tweet" class="btn grey" style="width:35%;" href="" target="_blank"><i class="material-icons left">share</i>Tweet Result</a>
      <a class="btn grey" href="/" style="width:35%;"><i class="material-icons left">settings_power</i>END</a></p>
    </div>
  </div>

  <!-- 音声ファイルの読み込み -->
  <audio id="sound-ok" preload="auto" src="{{ asset('img/decision3.mp3')}}"></audio>
  <audio id="sound-ng" preload="auto" src="{{ asset('img/cancel2.mp3')}}"></audio>

  <div id="questions_all">
    <!--問題一覧　これは白文字のため表示されない-->
    {{$q_sentence}}
  </div>
  <div id="trans_all">
    <!--問題一覧　これは白文字のため表示されない-->
    {{$en_sentence}}
  </div>

@endsection
