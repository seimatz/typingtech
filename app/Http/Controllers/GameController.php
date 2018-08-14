<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Goutte\Client;

class GameController extends Controller
{
    //
    public function index(Request $request, $lang, $level)
    {
      if($level == 1){
        $limit = 30;
        $table = $lang.'_qs';
      } elseif($level == 2) {
        $limit = 15;
        $table = $lang.'_qs';
      } elseif($level == 3) {
        $limit = 10;
        $table = $lang.'news';
      }
      $items = DB::table($table)
      ->where('level', $level)
      ->orderByRaw('RAND()')
      ->limit($limit)
      ->get();

      if(count($items) < 1) { //data is not set
        abort(404); //return 404 page
      }

      $questions = array();
      $trans_en = array();
      $trans_jp = array();

      foreach($items as $item){
         array_push($questions, $item->question);
         array_push($trans_en, $item->en."  ".$item->jp);
         array_push($trans_jp, $item->jp);
      }
      $q_sentence = join('/', $questions);
      $en_sentence = join('/', $trans_en);
      $jp_sentence = join('/', $trans_jp);

      $lang = ucfirst($lang); //capital letter converter

      return view('game', ['q_sentence'=>$q_sentence, 'lang'=>$lang, 'en_sentence'=>$en_sentence, 'jp_sentence'=>$jp_sentence]);
    }

}
