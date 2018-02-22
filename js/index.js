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