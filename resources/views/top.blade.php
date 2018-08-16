@section('title', 'Typing.Tech | Typing practice for tech')

@extends('layouts.main')

@section('content')
<main>
<div class="container">
  <div class="row">
    <br>
    <div class="col s12">
    <div class="card-panel center">
      <h4>Type faster, code faster!</h4>
      <p>Typing practice for coders, programmers.<br>
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
          <h4 class="top_lang">Excel</h4>
        </div>
        <div class="card-content grey lighten-4">
            <div id="ua-level1">Type Excel functions like "SUM", "COUNTIF" and etc.　<a href="/game/ukrainian/1" class="btn-floating btn-middle waves-effect waves-light"><i class="material-icons">play_arrow</i></a></div>
        </div>
      </div>
    </div>

  <div class="col s6">
    <div class="card">
      <div class="card-content">
        <h4 class="top_lang">HTML</h4>
      </div>
      <div class="card-content grey lighten-4">
          <div id="ua-level1">Type HTML tags like &lt;body&gt;, &lt;div&gt; and etc.　<a href="/game/ukrainian/1" class="btn-floating btn-middle waves-effect waves-light"><i class="material-icons">play_arrow</i></a></div>
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
