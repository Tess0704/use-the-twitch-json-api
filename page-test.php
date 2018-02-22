<?php
/*
Template Name : test
*/
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Use the Twitchtv JSON API</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>
<style>
  body{
  background-color:rgb(255,162,155);
}
.display{
  width: 420px;
  margin: 10px auto;
  background-color: white;
  border-radius: 5px;
}
.nav-item{
  width: 140px;
  border-radius: 0px;
}
.nav a{
  color:white;
}
.tab-pane a{
  color:rgb(255,115,106);

}
.nav{
  margin: 10px auto;
}
.nav-link{
  background-color:rgb(255,115,106);
}
ul li{
  list-style-type:none;
  color:rgb(255,115,106);
}
img{
  height: 60px;
  width: 60px;
  border-radius: 60px;
  margin:10px 10px;
}
span{
/*   font-style: italic; */
  font-size:0.7em;
  color: black;
}
</style>

<body>
  
<!-- Nav tabs -->
  <div class = 'display'>
    <ul class="nav nav-tabs justify-content-between" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#All" role="tab">All</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Online" role="tab">Online</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Offline" role="tab">Offline</a>
  </li>

</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="All" role="tabpanel">
    <ul>
     
    </ul>
  </div>
  <div class="tab-pane" id="Online" role="tabpanel">
   <ul></ul>
  </div>
  
  <div class="tab-pane" id="Offline" role="tabpanel">
    <ul></ul>
  </div>
  
</div>
    
  </div>



</body>





<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>

    <script>
var users = [
  "freecodecamp",
  "ESL_SC2",
  "OgamingSC2",
  "cretetion",
  "storbeck",
  "habathcx",
  "RobotCaleb",
  "noobs2ninjas"
];
var logo = [];
var display_name = [];
var url = [];

for (var i in users) {
  (function(index) {
     
         $.getJSON(
      "https://wind-bow.glitch.me/twitch-api/channels/" + users[index],function(data){
         logo[index] = data["logo"];
         display_name[index] = data["display_name"];
         url[index] = data["url"];
        
         $("#All ul")
         .append("<li><img src=" + logo[index] + '  alt="">' + display_name[index]+"</li>");
      });
                                       
    })(i);
}

for (var i in users) {
  (function(index) {

     $.getJSON(
      "https://wind-bow.glitch.me/twitch-api/streams/" + users[index],function(data){  
         if(data["stream"] !== null)
         {
           $("#Online ul")
          .append("<li><img src=" + logo[index] + '  alt="">' + '<a href= '+url[index]+' target = "_blank">'+display_name[index]+'</a><br><span>'+'</span></li>');
         }  
         else
           {
            $("#Offline ul")
          .append("<li><img src=" + logo[index]+ '  alt="">' + display_name[index]+"</li>"); 
           }
       });   
    
     })(i);
}
    </script>

</body>
</html>
