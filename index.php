<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <script type="text/javascript">
  function writeChat(){
    var mSent = document.getElementById('usermsg');
    var div = document.getElementById("list_mess");


    div.innerHTML += '  <div id = "container2">' +
        '<div class=\"media-right\">' +
          '<img src=\"https://bootdey.com/img/Content/avatar/avatar2.png\" class=\"img-circle img-sm\" alt=\"Profile Picture\">' +
        '</div>'+
        '<div class=\"media-body pad-hor speech-right\">' +
         '<div class=\"speech\">'+
            '<a href="#" class=\"media-heading\">Usuario</a>'+
            '<p>' + mSent.value + '</p>'+
            '<p class=\"speech-time\">'+
            '<i class=\"fa fa-clock-o fa-fw\"></i> 09:23AM' +
            '</p>' +
          '</div>' +
       '</div>' +
      '</div>';
    document.getElementById('submitmsg').disabled = true;
    mSent.disabled = true;
    //Respuesta del bot a partir de aquí
    $(document).ready(function(){
      $('.nano').animate({
      scrollTop: $('.nano').get(0).scrollHeight}, 2000);
    });
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
                   div.innerHTML  += '<div id = "container2">' +
                       '<div class=\"media-left\">' +
                         '<img src=\"img/bot.png\" class=\"img-circle img-sm\" alt=\"Profile Picture\">' +
                       '</div>'+
                       '<div class=\"media-body pad-hor\">' +
                        '<div class=\"speech\">'+
                           '<a href="#" class=\"media-heading\">Bot Daniel</a>'+
                           '<p>' + response + '</p>'+
                           '<p class=\"speech-time\">'+
                           '<i class=\"fa fa-clock-o fa-fw\"></i> 09:23AM' +
                           '</p>' +
                         '</div>' +
                      '</div>' +
                     '</div>';
                   mSent.disabled = false;
                   document.getElementById('submitmsg').disabled = false;
                }
      });
      $(document).ready(function(){
        $('.nano').animate({
        scrollTop: $('.nano').get(0).scrollHeight}, 2000);
      });
  }
</script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="col-md-12 col-lg-6">
        <div class="panel">
        	<!--Heading-->
    		<div class="panel-heading">
    			<div class="panel-control">
    				<div class="btn-group">
    					<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#demo-chat-body"><i class="fa fa-chevron-down"></i></button>
    				</div>
    			</div>
    			<h3 class="panel-title">Chat</h3>
    		</div>


    		<!--Widget body-->
    		<div id="demo-chat-body" class="collapse in">
    			<div class="nano has-scrollbar" style="height:380px">
    				<div class="nano-content pad-all" tabindex="0" style="right: -17px;">
    					<div class="list-unstyled media-block" id="list_mess">

                <div id = "container2">
                  <div class="media-left">
    								<img src="img/bot.png" class="img-circle img-sm" alt="Profile Picture">
    							</div>
    							<div class="media-body pad-hor">
    								<div class="speech">
    									<a href="#" class="media-heading">Bot Daniel</a>
    									<p>Hola!, ¿Te puedo ayudar en algo?</p>
    									<p class="speech-time">
    									<i class="fa fa-clock-o fa-fw">
                      </i> 09:23AM
    									</p>
    								</div>
    							</div>
                </div>

    					</div>
    				</div>
    			<div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div></div>

    			<!--Widget footer-->
    			<div class="panel-footer">
    				<div class="row">
    					<div class="col-xs-9">
    						<input type="text" placeholder="Consultame algo!" class="form-control chat-input" id="usermsg">
    					</div>
    					<div class="col-xs-3">
    						<button class="btn btn-warning" type="button" onclick="writeChat()" id="submitmsg">Enviar</button>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
