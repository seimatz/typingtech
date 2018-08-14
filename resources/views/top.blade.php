@section('title', 'Typing.Cyrillic | ロシア語・キリル文字タイピング練習')

@extends('layouts.main')

@section('content')
<main>
<div class="container">
  <div class="row">
    <br>
    <div class="col s12">
    <div class="card-panel center">
      <h4>キリル文字のタイピングを練習しましょう</h4>
      <p>
        Supported browsers: the latest version of <br>
        <img src="{{ asset('img/chrome.png')}}" alt="chrome" class="browser-icon">
        <img src="{{ asset('img/firefox.png')}}" alt="firefox" class="browser-icon">
        <img src="{{ asset('img/edge.png')}}" alt="edge" class="browser-icon">
      </p>
      <button data-target="modal1" class="modal-trigger btn orange darken-3"><i class="material-icons left">live_help</i>HOW TO PLAY</button><br><br>
    </div>
    </div>

    <div class="col s6">
    <div class="card">
      <div class="card-content">
        <h4 class="top_lang">Русский</h4>
        <p class="grey-text trans">Russian ロシア語</p>
      </div>
      <div class="card-tabs">
        <ul class="tabs tabs-fixed-width">
          <li class="tab"><a href="#ru-level1" class="active">Level 1</a></li>
          <li class="tab"><a href="#ru-level2">Level 2</a></li>
          <li class="tab"><a href="#ru-level3">Level 3</a></li>
        </ul>
      </div>
      <div class="card-content grey lighten-4">
          <div id="ru-level1">アルファベット・記号を１文字ずつ練習します。 <a href="/game/russian/1" class="btn-floating btn-middle waves-effect waves-light"><i class="material-icons">play_arrow</i></a>

</div>
        <div id="ru-level2">基礎単語から、ランダムで15問を出題します。　<a href="/game/russian/2" class="btn-floating btn-middle waves-effect waves-light"><i class="material-icons">play_arrow</i></a></div>
        <div id="ru-level3"><a href="https://ria.ru/">РИА Новости</a>最近１ヶ月のニュース記事見出しから10問を出題します。　<a href="/game/russian/3" class="btn-floating btn-middle waves-effect waves-light"><i class="material-icons">play_arrow</i></a></div>

      </div>
    </div>
  </div>

  <div class="col s6">
  <div class="card">
    <div class="card-content">
      <h4 class="top_lang">Українська</h4>
      <p class="grey-text trans">Ukrainian ウクライナ語</p>
    </div>
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#ua-level1" class="active">Level 1</a></li>
        <li class="tab"><a href="#ua-level2">Level 2</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
        <div id="ua-level1">アルファベット・記号を１文字ずつ練習します。  <a href="/game/ukrainian/1" class="btn-floating btn-middle waves-effect waves-light"><i class="material-icons">play_arrow</i></a>

</div>
      <div id="ua-level2">基礎単語から、ランダムで15問を出題します。　<a href="/game/ukrainian/2" class="btn-floating btn-middle waves-effect waves-light"><i class="material-icons">play_arrow</i></a></div>

    </div>
  </div>
</div>

<div class="col s6">
<div class="card">
  <div class="card-content">
    <h4 class="top_lang">Български</h4>
    <p class="grey-text trans">Bulgarian ブルガリア語</p>
  </div>
  <div class="card-tabs">
    <ul class="tabs tabs-fixed-width">
      <li class="tab"><a href="#bg-level1" class="active">Level 1</a></li>
      <li class="tab"><a href="#bg-level2">Level 2</a></li>
    </ul>
  </div>
  <div class="card-content grey lighten-4">
      <div id="bg-level1">アルファベット・記号を１文字ずつ練習します。  <a href="/game/bulgarian/1" class="btn-floating btn-middle waves-effect waves-light"><i class="material-icons">play_arrow</i></a>

</div>
    <div id="bg-level2">基礎単語から、ランダムで15問を出題します。　<a href="/game/bulgarian/2" class="btn-floating btn-middle waves-effect waves-light"><i class="material-icons">play_arrow</i></a></div>

  </div>
</div>
</div>


  </div>
</div>
</main>

<!-- Modal Structure -->
 <div id="modal1" class="modal">
   <div class="modal-content">
     @include('layouts.help')
   </div>
   <div class="modal-footer">
     <button class="modal-action modal-close btn-flat ">OK</button>
   </div>
 </div>

@include('layouts.footer')

@endsection
