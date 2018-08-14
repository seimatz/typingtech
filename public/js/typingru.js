      $(document).ready(function(){
        $('.modal-trigger').leanModal();
      });

      var qNumber= 0;//問題番号初期値
      //問題文設定。画面から取得。
      var questions_all = document.getElementById("questions_all").innerText;
      var trans_all =  document.getElementById("trans_all").innerText;
      var questions = questions_all.split("/");
      var translates = trans_all.split("/");

      document.getElementById("qtotal").innerHTML = questions.length;

       //画面描写パーツの定義
        var question = document.getElementById("question");
        var trans = document.getElementById("trans");
        var target = document.getElementById("answer");
        var typed = document.getElementById("typed");
        var misstyped = document.getElementById("misstyped");
        var typedtxt = new Array(); //Show typed text by user

       var misstype = new Array();//ミスタイプ情報用
       var ngTotal = {};//NGカウント用Object
       var totalTime = 0;//合計タイム
       var rapTime = 0;//10秒ラップの回数計測
       var totalCharnum = 0;//文字数の総計をカウント
       var charnum = 0;//１問ごとの文字数（・・文字目）をカウント
       var typeCount = 0;//１文字ごとのタイプ数をカウント（一発正解判定用）
       var okCount = 0;//一発正解の文字数をカウント
       var maxchar = 0; //問題の文字列の長さを測定
       var startflag = 0; //ready 画面か判定するフラグ
       var dir = location.href.split("/"); //パス取得
       var lang = dir[dir.length -2];
       var lang = lang.toUpperCase(); //language name
       var level = dir[dir.length -1]; //level

       //First question
       if(qNumber == 0){
         $('#modal3').openModal({dismissible:false});
       }

       //Question renew
       function newQuestion(qNumber){
            startflag = 1;
             //全問クリア
            if(qNumber > questions.length -1){
               complete();
            } else {
               charnum = 0;
               maxchar = 0;
               typed.innerHTML = "";
               maxchar = stoKey(questions[qNumber].trim()).length;
               question.innerHTML = questions[qNumber]; //Show question
               trans.innerHTML = translates[qNumber];
               typed.style.minHeight = question.clientHeight + 20 + 'px';
               document.getElementById("qcount").innerHTML = qNumber + 1;
               run(); //start count
            }

       }

      function complete(){
        startflag = 2;
          //count NG ミスタイプをカウント
         var fineRate = okCount/totalCharnum *100; //正確性

         if(fineRate < 100){
            //ミスタイプのうちわけカウント
            misstype.forEach(function(value){
              if(!ngTotal[value]){
                ngTotal[value]=1;
              }else {
                ngTotal[value] += 1;
              }
            });
            //ミスタイプ多い順にソート
           ngArray = sortObject(ngTotal);
           var fmisstype = "";
           for(k in ngArray.slice(0,3)){
            if(ngArray[k].key !== "undefined"){
              fmisstype += '<span class="result_misstype">'+ngArray[k].key+'</span>';
              }
            }
           var ngMessage = '<h5>よくミスするキー Friequent misstyped keyes:</h5><p>' + fmisstype.toString() +'  </p>';
         } else {
           var ngMessage = '<p style="font-size:1.5em;">ミスはゼロです。おめでとうございます！ Perfect!</p>';
        }

        var totalMin = Number(totalTime/100/60).toFixed(2); //合計時間を分に変換（秒）を分に変換
        var speed = Number(totalCharnum/totalMin).toFixed(0); //1分あたりタイプ数(CPM)計算
        var star;
        if(speed > 200){
          star = 5;
          } else if(speed > 150){
            star = 4;
          } else if(speed >100){
            star = 3;
          } else if(speed >50){
            star = 2;
          } else {
            star =1;
        }
        var stars = "";
        for(var i=1 ;i<= star;i++) {
          stars +='<i class="small material-icons icon-yellow">star</i>';
        }

        var twitterLink = 'https://twitter.com/intent/tweet?hashtags=TypingCyrillic&url=https%3A%2F%2Fcyrillic.typing-up.pro&text=Typing.Cyrillicでタイピングを練習しました[言語/Language]'+ lang +' [Level]'+ level +' [正確性/Accuracy rate]'+fineRate.toFixed(0)+' [CPM(分あたり打鍵数)]'+speed;
        var resultMessage = '<h4>結果 Result</h4><h5>正確性 Accuracy rate: </h5><div class="charts"><div class="charts__chart chart--blue chart--p' + fineRate.toFixed(0) +
        '" data-percent></div></div><h5>スピード Speed:</h5>'+stars+'<span class="cpm">(CPM:'+speed+')</span>'+ ngMessage;
         document.getElementById("result").innerHTML = resultMessage;
         document.getElementById("tweet").href = twitterLink;
         $('#modal2').openModal();

      }

      function skip(){
        qNumber = document.getElementById("qcount").innerHTML;
        qNumber = qNumber -1;
        qNumber += 1;
        stop();
        totalTime += Number(document.getElementById('sec').innerHTML)*100;
        setTimeout("newQuestion(qNumber)",500);
      }

      function reset(){
        window.location.reload() ;
      }

     //問題文を配列に変換
     function stoKey(question){
         wordtoArray = question.split("");
         return wordtoArray;
     }

     //オブジェクトをソート（NGカウントに使用）
     function sortObject(obj) {
            var arr = [];
            var prop;
            for (prop in obj) {
                if (obj.hasOwnProperty(prop)) {
                    arr.push({
                        'key': prop,
                        'value': obj[prop]
                    });
                }
            }
            arr.sort(function(a, b) {
                return a.value - b.value;
            });
            arr.reverse();
            return arr; // returns array
        }


      //timecount タイム計測機能
      var startTime,
      timerId;

      function run() {
        startTime = (new Date()).getTime(); //set start time
        timer();
      }

      function stop() { //stop timecount
        totalTime += document.getElementById('sec').value*100 + 10 * rapTime * 100;
        rapTime = 0;
        clearTimeout(timerId);
      }

      function timer() {
        var time = document.getElementById('sec');
        time.value = (((new Date()).getTime() - startTime) / 1000).toFixed(2);
        if(time.value == 10){
          rapTime += 1;
          time.value = 0;
          run();
        }
        timerId = setTimeout(function() {
          timer(); //0.1 sec ごとにtimer function を実行。これでタイマーが動く。
        }, 100);

      }

      //キーが押された時の処理
      document.onkeypress = function(e){
        //Enterkey
         if(e.keyCode == 13){
           if(startflag < 1){ //Close Ready window
             $('#modal3').closeModal();
             newQuestion(0);
           } else if(startflag > 1) { //Close Result window
             $('#modal2').closeModal();
             reset();
           }

         }

         typeCount += 1;
         var currentKey = String.fromCharCode(e.charCode);
         //キーが正解のとき
         if(wordtoArray[charnum] == currentKey){
            if(typeCount < 2){
              okCount += 1;
            }
          typeCount = 0;

          charnum += 1;
          totalCharnum += 1;

          addchar = questions[qNumber].substr(0, charnum); //get character typed by user
          addchar = addchar.replace(/ /g, '␣'); //replace space
          typed.innerHTML = addchar;

            if (charnum == maxchar){ //when last character
              qNumber += 1;
              stop();
              setTimeout("newQuestion(qNumber)",500);
              soundOk();
            }
        //キーが間違いの時
        } else if(e.keyCode != 13) {//type false
          misstyped.innerHTML = currentKey;
          soundNg();
          misstype.push(wordtoArray[charnum]);
          setTimeout("misstyped.innerHTML = ''",500);
        }

        };

        function soundOk() {
          // OK音声ファイルを再生する
          document.getElementById('sound-ok').load();
          document.getElementById('sound-ok').play() ;
        }

        function soundNg() {
          // NG音声ファイルを再生する
          document.getElementById('sound-ng').play() ;
        }
