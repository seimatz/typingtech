@section('title', 'Typing.Slavs')

@extends('layouts.main')

@section('content')

<main>
<div class="container">
  <div class="row">
    <div class="col s12">
    <div class="card-panel" id="contents">
      <h2>ロシア語キーボードの設定方法</h2>
      <hr>
      <ul class="collection">
        <li class="collection-item"><a href="#win10">Windows10の場合</a></li>
        <li class="collection-item"><a href="#win7">Windows7の場合</a></li>
        <li class="collection-item"><a href="#winothers">Windows（その他）の場合</a></li>
        <li class="collection-item"><a href="#mac">Macの場合</a></li>
      </ul>
      <h3 id="win10">Windows10の場合</h3>
      <h4 id="-">1.「設定」から「時計と言語」を選択</h4>
      <img src="{{ asset('img/win10_1.png') }}" >
      <h4 id="-">2.「言語を追加する」を選択</h4>
      <img src="{{ asset('img/win10_2.png') }}" >
      <h4 id="-">3. ロシア語を選択</h4>
      <img src="{{ asset('img/win10_3.png') }}" >
      <p>Русскийが追加されていたら完了です。</p>
      <img src="{{ asset('img/win10_4.png') }}" >
      <h3 id="win7">Windows7の場合</h3>
      <h4 id="-">1. コントロールパネルで「地域と言語」を選択</h4>
      <img src="{{ asset('img/win7_1.png') }}" >
      <h4 id="-">2.「キーボードと言語」タブで「キーボードの変更」をクリック</h4>
      <img src="{{ asset('img/win7_2.png') }}" >
      <h4 id="-">3.「追加」をクリックし、ロシア語を選択</h4>
      <img src="{{ asset('img/win7_3.png') }}" >
      <p>特別な希望がない場合は、「ロシア語」を選択しましょう。</p>
      <img src="{{ asset('img/win7_4.png') }}" >
      <h4 id="-ok">4. 適用＆OKをクリック</h4>
      <img src="{{ asset('img/win7_5.png') }}" >
      <h3 id="winothers">Windowsその他</h3>
      <p>その他のバージョンでの設定方法はこちらのサイト<a href="http://www.jolco.com/pages/computer/install-russian/inst-ru.html">こちらのサイト</a>をご覧ください。</p>
      <h3 id="mac">Macの場合</h3>
      <h4 id="-">1. システム環境設定から「キーボード」を選択</h4>
      <img src="{{ asset('img/mac_setting1.png') }}" >
      <p>システム環境設定は、画面左上、リンゴのマークから行けます。</p>
      <h4 id="-">2. 「入力ソース」のタブで＋をクリック</h4>
      <img src="{{ asset('img/mac_setting2.png') }}" >
      <p>＋のボタンをクリックします。</p>
      <h4 id="-">3. ロシア語を選択して「追加」をクリック</h4>
      <img src="{{ asset('img/mac_setting3.png') }}" >
      <p>ロシア語の中にも、いくつか選択肢があります。</p>
      <h5 id="russian-pc">Russian PC</h5>
      <p>Windowsのロシア語キーボードとほぼ同じ配列ですが、Ёが打てません。アプリではキーボードType 1です。</p>
      <h5 id="russian">Russian</h5>
      <p>Windowsのロシア語キーボードとカンマやピリオドなどの位置が微妙に違います。Ёが打てます。タイピングアプリではキーボードType 2です。</p>
      <h5 id="russian-phonetics">Russian Phonetics</h5>
      <img src="{{ asset('img/mac_phonetic.png') }}" >
      <p>他の２つとだいぶ配列が異なります。英語キーボードの音の配列に近づけてあります。例えば、英語のPの位置にはПがあります。</p>
    </div>
    </div>


  </div>
</div>
</main>
@include('layouts.footer')

@endsection
