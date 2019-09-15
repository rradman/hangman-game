<?php
    include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title> HANGMAN</title>
</head>
<body>

<font color="orange" size="4"><p id ="korisnik"></p></font>

<font color="orange" size="5"><p id ="trenutni_pts">Score: 0</p></font>

<!-- Forma za crtanje -->
<center>
  <font size="4" color="blue"><p id="topic"></p></font>
  <canvas id="myCanvas" width="300" height="300"
      style="border:1px solid #c3c3c3;">
  </canvas>
<br>

<form>
  <font size="5"><p id ="div"></p></font>
</form>

<br>
<div>
  <button style="width:40px;height:40px" id="A" onclick="slovo_provjera(id);"> A </button>
  <button style="width:40px;height:40px" id="B" onclick="slovo_provjera(id);"> B </button>
  <button style="width:40px;height:40px" id="C" onclick="slovo_provjera(id);"> C </button>
  <button style="width:40px;height:40px" id="D" onclick="slovo_provjera(id);"> D </button>
  <button style="width:40px;height:40px" id="E" onclick="slovo_provjera(id);"> E </button>
  <button style="width:40px;height:40px" id="F" onclick="slovo_provjera(id);"> F </button>
  <button style="width:40px;height:40px" id="G" onclick="slovo_provjera(id);"> G </button>
  <button style="width:40px;height:40px" id="H" onclick="slovo_provjera(id);"> H </button>
  <button style="width:40px;height:40px" id="I" onclick="slovo_provjera(id);"> I </button>
  <button style="width:40px;height:40px" id="J" onclick="slovo_provjera(id);"> J </button>
  <button style="width:40px;height:40px" id="K" onclick="slovo_provjera(id);"> K </button>
  <button style="width:40px;height:40px" id="L" onclick="slovo_provjera(id);"> L </button>
  <button style="width:40px;height:40px" id="M" onclick="slovo_provjera(id);"> M </button>
  <br>
  <button style="width:40px;height:40px" id="N" onclick="slovo_provjera(id);"> N </button>
  <button style="width:40px;height:40px" id="O" onclick="slovo_provjera(id);"> O </button>
  <button style="width:40px;height:40px" id="P" onclick="slovo_provjera(id);"> P </button>
  <button style="width:40px;height:40px" id="Q" onclick="slovo_provjera(id);"> Q </button>
  <button style="width:40px;height:40px" id="R" onclick="slovo_provjera(id);"> R </button>
  <button style="width:40px;height:40px" id="S" onclick="slovo_provjera(id);"> S </button>
  <button style="width:40px;height:40px" id="T" onclick="slovo_provjera(id);"> T </button>
  <button style="width:40px;height:40px" id="U" onclick="slovo_provjera(id);"> U </button>
  <button style="width:40px;height:40px" id="V" onclick="slovo_provjera(id);"> V </button>
  <button style="width:40px;height:40px" id="W" onclick="slovo_provjera(id);"> W </button>
  <button style="width:40px;height:40px" id="X" onclick="slovo_provjera(id);"> X </button>
  <button style="width:40px;height:40px" id="Y" onclick="slovo_provjera(id);"> Y </button>
  <button style="width:40px;height:40px" id="Z" onclick="slovo_provjera(id);"> Z </button>
  
</div>

</center>

<button style="width:150px" onclick="new_game();"> New Game </button>

<form align="left" action="logout.php" method="get">
  <input style="width:150px" type="submit" value="Logout">
</form>
<button id="hall" style="width:150px" onclick="hall_of_fame();">Hall of fame</button>
<br>
<button id="add_word" style="width:150px" onclick="add_word();">Add</button>
<center>
<form>
  <font size="10" color="red"><div text-align:center id="gameover"> </div></font>
  <font size="10" color="green"><div text-align:center id="gamewin"> </div></font>
  <font size="5" color="green"><div text-align:center id="rjesenje"> </div></font>
</form>
</center>

<!--
  <button onclick="get_word();"> Odaberi rijec </button>
  <input align="center" type="text" id="myText" value="">
-->

  <!-- JS Scripts-->
  <!-- jQuery Js -->  
  <script src="assets/js/jquery-1.10.2.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    <!-- Bootstrap Js -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/moment.js" type="text/javascript"></script> 
  <script type="text/javascript"> 

  var duljina_rijeci;
  var guess = "";
  var odabrana_rijec = "";
  var lines = "";
  var counter = 0;
  var local_score = 0;
  var score = "";
  var username = "";
  var odabrana_rijec_save = "";

  polje = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
  initial_setup();

  function slovo_provjera(slovo){
    var pogodak = 0;
    for(i=0; i<duljina_rijeci+1; i++){
      if(slovo == odabrana_rijec[i]){
        pogodak = 1;
        break;
      }
    }    
    if(pogodak == 1){
      document.getElementById(slovo).style.backgroundColor="lightgreen";
      document.getElementById(slovo).disabled = true;
      local_score = local_score + 1;
      document.getElementById("trenutni_pts").innerHTML = "Score: " + local_score;
      display_letter(slovo);
    }
    else{
      document.getElementById(slovo).style.backgroundColor="red";
      document.getElementById(slovo).disabled = true;
      counter = counter + 1;
      if(counter != 0){
        crtaj(counter);
      }
      else{
        counter = -1;
      }
    }    
  }
  function get_user(){
    $.ajax({
      type: 'GET',      //metoda GET
      url: "active_user.php",        //destination URL
      dataType:'text',
      success: function(response){

      }
    });
  }

  function hall_of_fame(){
    var array_hall = [];
    var temp = "";
    var alert_print = "";
    var x = 0;
    var i = 0;
    $.ajax({
      type: 'GET',   
      url: "hall_of_fame.php",       
      dataType:'text',
      success: function(response){
        for(i=0; i<(response + '').length; i++){
          if(response[i] == ","){
            array_hall.push(temp);
            temp = "";
          }
          else{
            temp = temp + response[i];
          }
        }
        for(i=0; i<10; i++){
          x = i+1;
          alert_print = alert_print + "\n" + x + "." + " " + array_hall[i];
        }
        alert(alert_print);

      }
    });
  }

  function get_word(){
    $.ajax({
      type: 'GET',      //metoda GET
      url: "select_word.php",        //destination URL
      dataType:'text',
      success: function(response){
        odabrana_rijec_save = response;
        odabrana_rijec = (response + '');
        duljina_rijeci = (response + '').length;
        //document.getElementById("myText").value = response;
        get_topic();
        guess = "";
        lines = "";

        for(i=0; i<duljina_rijeci; i++){
          if(odabrana_rijec[i] != " "){
            guess = guess + "_ ";
            lines = lines + "_";
          }
          else{
            guess = guess + "&nbsp;&nbsp;&nbsp;&nbsp;"
            lines = lines + ",";
          }
        } 
        document.getElementById("div").innerHTML = guess;
      }
    });
  }

  function get_topic(){
    $.ajax({
      type: 'GET',
      url: "select_topic.php?odabrana_rijec_save="+odabrana_rijec_save+"&guess="+guess+"",
      dataType:'text',
      success: function(response){
        document.getElementById("topic").innerHTML = "Topic: &nbsp;&nbsp;&nbsp;" + response;
      }
    });
  }

  function display_letter(slovo){
    i = 0;
    var polje2 = [];

    for(i=0; i<duljina_rijeci; i++){
      if(slovo == odabrana_rijec[i]){
        polje2.push[i]; //indeksi pogodenih slova
      }
    }

    i = 0;
    var word_update = "";

    for(i = 0; i < duljina_rijeci; i++){
      if(lines[i] != " " && lines[i] != "_" && lines[i] != slovo && lines[i] != ","){
        word_update = word_update + lines[i];
      }
      else if(lines[i] == ","){
        word_update = word_update + ",";
      }
      else if(slovo == odabrana_rijec[i]){
        word_update = word_update + slovo;
      }
      else{
        word_update = word_update + "_"
      }
    }

    lines = word_update;
    guess = "";
    i = 0;

    for(i=0; i<lines.length; i++){
      if(lines[i] != ","){
        guess = guess + lines[i] + "&nbsp;";
      }
      else{
        guess = guess + "&nbsp;&nbsp;&nbsp;&nbsp;"
      }
    }

    document.getElementById("div").innerHTML = guess;
    var pobjeda = 1;
    for(i=0; i<word_update.length; i++){
      if(word_update[i] == "_"){
        pobjeda = 0;
        break;
      }
      else{
        pobjeda = 1;
      }
    }
    if(pobjeda == 1){
      game_won();
    }
  }

  function game_won(){
    local_score = local_score + 5;
    document.getElementById("trenutni_pts").innerHTML = "Score: " + local_score;

    if(local_score > score){
      score = local_score;
      document.getElementById("korisnik").innerHTML = "User: " + username + "&nbsp;&nbsp;&nbsp; Highscore: " + score;
      update_score();
    }
    initial_setup();
  }

  function new_game(){
    local_score = 0;
    document.getElementById("trenutni_pts").innerHTML = "Score: " + local_score;
    initial_setup();
  }

  function initial_setup(){
    counter = 0;
    guess = "";
    odabrana_rijec = "";
    lines = "";
    var i = 0;
    document.getElementById("gameover").innerHTML = "";
    document.getElementById("gamewin").innerHTML = "";
    document.getElementById("rjesenje").innerHTML = "";
    for(i = 0; i < 26; i++){
      document.getElementById(polje[i]).disabled = false;
      document.getElementById(polje[i]).style.backgroundColor="lightyellow";
    }
    get_word();
    trenutni_korisnik();
    first_draw();
  }

  function trenutni_korisnik(){
    var odgovor = "";
    var save = 0;
    score = "";
    username = "";
    $.ajax({
      type: 'GET',      //metoda GET
      url: "active_user.php",        //destination URL
      dataType:'text',
      success: function(response){
        odgovor = (response + '');

        for(i=0;i<odgovor.length; i++){
          if(odgovor[i] != "_"){
            username = username + odgovor[i];
          }
          else{
            save = i+1;
            break;
          }
        }
        for(i=save;i<odgovor.length; i++){
          score = score + odgovor[i];
        }

      document.getElementById("korisnik").innerHTML = "User: " + username + "&nbsp;&nbsp;&nbsp; Highscore: " + score;

      var button = document.getElementById("add_word");
      if(username == "admin"){
        button.style.display = "block";
      } 
      else{
        button.style.display = "none";
      }
      }
    });
  }

  function add_word(){
    window.location.href = "add_word.php";
  }

  function game_over(){
    for(i = 0; i < 26; i++){
      document.getElementById(polje[i]).disabled = true;
    }
    document.getElementById("gameover").innerHTML = "GAME OVER!";
    document.getElementById("rjesenje").innerHTML = "Solution: " + odabrana_rijec;

    if(local_score > score){
      score = local_score;
      document.getElementById("korisnik").innerHTML = "User: " + username + "&nbsp;&nbsp;&nbsp; Highscore: " + score;
      update_score();
    }
    local_score = 0;
   
  }

  function update_score(){
    $.ajax({
      type: 'GET',
      url: "update_score.php?username="+username+"&score="+score+"",
      dataType:'text',
      success: function(response){

      }
    });
  }

  function crtaj(numWrong){
    var ctx = document.getElementById("myCanvas").getContext('2d');
    if(numWrong==1){
        ctx.beginPath(); //head
            ctx.arc(150, 100, 20, 0, 2*Math.PI);
            ctx.stroke();
        ctx.beginPath(); //left eye
            ctx.arc(143, 95, 3.5, 0, 2*Math.PI);
            ctx.stroke();
        ctx.beginPath(); //right eye
            ctx.arc(157, 95, 3.5, 0, 2*Math.PI);
            ctx.stroke();
        ctx.beginPath(); //mouth
            ctx.arc(150, 103, 9, 0, Math.PI);
            ctx.stroke();
    }
    if(numWrong==2){
        ctx.beginPath(); //body
            ctx.moveTo(150,120);
            ctx.lineTo(150,190);
            ctx.stroke();
    }
    if(numWrong==3){
        ctx.fillStyle = "white";
        ctx.fillRect(138, 102, 24, 12); //cover mouth
        ctx.beginPath(); //straight mouth
            ctx.moveTo(140,108);
            ctx.lineTo(160,108);
            ctx.stroke();
        ctx.beginPath(); //right arm
            ctx.moveTo(150,135);
            ctx.lineTo(180,160);
            ctx.stroke();
    }
    if(numWrong==4){
        ctx.beginPath(); //left arm
            ctx.moveTo(150,135);
            ctx.lineTo(120,160);
            ctx.stroke();
    }
    if(numWrong==5){
        ctx.fillRect(138, 102, 24, 12); //cover mouth
        ctx.beginPath(); //sad mouth
            ctx.arc(150, 112, 9, 0, Math.PI, true);
            ctx.stroke();
        ctx.beginPath(); //right leg
            ctx.moveTo(149,188);
            ctx.lineTo(180,230);
            ctx.stroke();
    }
    if(numWrong==6){
    ctx.beginPath(); //left leg
        ctx.moveTo(151,188);
        ctx.lineTo(120,230);
        ctx.stroke();
        counter = 0;
        game_over();
    }
  }
  function first_draw(){
    var ctx = document.getElementById("myCanvas").getContext('2d');
        ctx.fillStyle = "white";
        ctx.lineWidth=3;
        ctx.fillRect(0, 0, 300, 300);
        ctx.beginPath(); //vertical bar
            ctx.moveTo(50,270);
            ctx.lineTo(50,25);
            ctx.stroke();
        ctx.beginPath(); //vertical bar long piece
            ctx.moveTo(65,270);
            ctx.lineTo(65,85);
            ctx.stroke();
        ctx.beginPath(); //vertical bar short piece
            ctx.moveTo(65,64);
            ctx.lineTo(65,40);
            ctx.stroke();
        ctx.beginPath(); //horizontal bar
            ctx.moveTo(49,25);
            ctx.lineTo(175,25);
            ctx.stroke();
        ctx.beginPath(); //horizontal bar short piece
            ctx.moveTo(49,40);
            ctx.lineTo(86,40);
            ctx.stroke();
        ctx.beginPath(); //horizontal bar long piece
            ctx.moveTo(106,40);
            ctx.lineTo(175,40);
            ctx.stroke();
        ctx.beginPath(); //small vertical bar
            ctx.moveTo(173,25);
            ctx.lineTo(173,40);
            ctx.stroke();
        ctx.beginPath(); //cross bar
            ctx.moveTo(50,80);
            ctx.lineTo(100,25);
            ctx.stroke();
        ctx.beginPath(); //cross bar
            ctx.moveTo(60,90);
            ctx.lineTo(111,35);
            ctx.stroke();
        ctx.beginPath(); //cross bar
            ctx.moveTo(50,80);
            ctx.lineTo(60,90);
            ctx.stroke();
        ctx.beginPath(); //cross bar
            ctx.moveTo(100,25);
            ctx.lineTo(111,35);
            ctx.stroke();
        ctx.beginPath(); //ground
            ctx.moveTo(35,270);
            ctx.lineTo(265,270);
            ctx.stroke();
        ctx.beginPath(); //noose
            ctx.moveTo(150,40);
            ctx.lineTo(150,80);
            ctx.stroke();
    var cntx = document.getElementById("homeHangman").getContext('2d');
        cntx.fillStyle = "white";
        cntx.lineWidth=3;
        cntx.fillRect(0, 0, 300, 300);
        cntx.beginPath(); //vertical bar
            cntx.moveTo(50,270);
            cntx.lineTo(50,25);
            cntx.stroke();
        cntx.beginPath(); //vertical bar long piece
            cntx.moveTo(65,270);
            cntx.lineTo(65,85);
            cntx.stroke();
        cntx.beginPath(); //vertical bar short piece
            cntx.moveTo(65,64);
            cntx.lineTo(65,40);
            cntx.stroke();
        cntx.beginPath(); //horizontal bar
            cntx.moveTo(49,25);
            cntx.lineTo(175,25);
            cntx.stroke();
        cntx.beginPath(); //horizontal bar short piece
            cntx.moveTo(49,40);
            cntx.lineTo(86,40);
            cntx.stroke();
        cntx.beginPath(); //horizontal bar long piece
            cntx.moveTo(106,40);
            cntx.lineTo(175,40);
            cntx.stroke();
        cntx.beginPath(); //small vertical bar
            cntx.moveTo(173,25);
            cntx.lineTo(173,40);
            cntx.stroke();
        cntx.beginPath(); //cross bar
            cntx.moveTo(50,80);
            cntx.lineTo(100,25);
            cntx.stroke();
        cntx.beginPath(); //cross bar
            cntx.moveTo(60,90);
            cntx.lineTo(111,35);
            cntx.stroke();
        cntx.beginPath(); //cross bar
            cntx.moveTo(50,80);
            cntx.lineTo(60,90);
            cntx.stroke();
        cntx.beginPath(); //cross bar
            cntx.moveTo(100,25);
            cntx.lineTo(111,35);
            cntx.stroke();
        cntx.beginPath(); //ground
            cntx.moveTo(35,270);
            cntx.lineTo(265,270);
            cntx.stroke();
        cntx.beginPath(); //noose
            cntx.moveTo(150,40);
            cntx.lineTo(150,80);
            cntx.stroke();
}

</script>

</body>
</html>