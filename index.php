<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <script type="text/javascript">
  function writeChat(){
    var mSent = document.getElementById('usermsg');
    var div = document.getElementById('chatbox');

    div.innerHTML += '<p>Usuario: '+ mSent.value +'</p>';
    document.getElementById('submitmsg').disabled = true;
    mSent.disabled = true;
    var parametros = {
              "message" : mSent.value
      };
   $.ajax({
               data: parametros,
               url:   'DialogFlow.php',
               type:  'post',
               beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
               },
               success:  function (response) {
                    div.innerHTML += '<p>Bot: '+ response +'</p>';
                    mSent.disabled = false;
                    document.getElementById('submitmsg').disabled = false;
                    $("#resultado").html("");
               }
       });

  }
</script>
<div id="wrapper">
  <div id="menu">
        <p class="welcome">Bienvenido,</p>
        <div style="clear:both"></div>
    </div>

    <div id="chatbox">
      </div>
      <input name="usermsg" type="text" id="usermsg" size="63" />
      <input name="submitmsg" type="button" onclick="writeChat()" id="submitmsg" value="Send" />
</div>
<div id = "resultado"> </div>
</script>
</body>
</html>
