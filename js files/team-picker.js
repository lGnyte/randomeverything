var result = [];
var colors = ["#ff0000", "#ffff00", "#0000ff", "#00ff00", "#ffa500", "#800080", "#c71585", "#ff5349", "#ffae42", "#9acd32", "#0d98ba", "#8a2be2"];
var teamOptions1 = "<p style=\"font-weight:bold; font-size:25px; text-decoration:underline; margin:10px;\">Team ";
var teamOptions2 = "</p><label>Name:</label><input type=\"text\" name=\"team-name\" id=\"team-name";
var teamOptions3 = "\"><label>&nbsp;Color:</label><input type=\"color\" name=\"team-color\" id=\"team-color";
var teamOptions4 = "\" value=\"";
var teamOptions5 = "\"><br>";
function lightOrDark(color) {
    //Credits to Andreas Wik @andreaswik on CodePen for providing this function
    var r, g, b, hsp;
    if (color.match(/^rgb/)) {
        color = color.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);
        r = color[1];
        g = color[2];
        b = color[3];
    }
    else {
        color = +("0x" + color.slice(1).replace(
        color.length < 5 && /./g, '$&$&'));
        r = color >> 16;
        g = color >> 8 & 255;
        b = color & 255;
    }
    hsp = Math.sqrt(
    0.299 * (r * r) +
    0.587 * (g * g) +
    0.114 * (b * b)
    );
    if (hsp>127.5) {
        return 'light';
    }
    else {
        return 'dark';
    }
}
function teams(){
  var advDiv = document.getElementById("advanced");
  advDiv.innerHTML ="";
  var customTeams = document.getElementById("custom-teams");
  var select = document.getElementById("sel").value;
  if(select<6){
    customTeams.style.display="none";
    for(i=1; i<=select; i++){
      advDiv.innerHTML += teamOptions1 + i + teamOptions2 + i + teamOptions3 + i + teamOptions4 + colors[i-1] + teamOptions5;
    }
  }
  else {
    customTeams.style.display="inline";
  }
}
function customTeams(){
  var advDiv = document.getElementById("advanced");
  advDiv.innerHTML ="";
  var customTeams = document.getElementById("custom-teams").value;
  if(customTeams<1){
    alert("The minimum number of teams is at leats 2 !");
  } else if (customTeams>1 && customTeams<13){
    for (i=1; i<=customTeams; i++){
      advDiv.innerHTML += teamOptions1 + i + teamOptions2 + i + teamOptions3 + i + teamOptions4 + colors[i-1] + teamOptions5;
    }
  } else if (customTeams>=13){
    for (i=1; i<=12; i++){
      advDiv.innerHTML += teamOptions1 + i + teamOptions2 + i + teamOptions3 + i + teamOptions4 + colors[i-1] + teamOptions5;
    }
    for (i=13; i<=customTeams; i++){
      var letters = '01234567890abcdef';
      var color = '#';
      for (var j=0; j<6; j++) {
        color+= letters[Math.floor(Math.random()*16)];
      }
      advDiv.innerHTML += teamOptions1 + i + teamOptions2 + i + teamOptions3 + i + teamOptions4 + color + teamOptions5;
    }
  }
}
function showAdvanced(){
  document.getElementById("team-adv").style.display = "block";
}
function advanced(){
  advDiv = document.getElementById("advanced");
  if(advDiv.style.height === '0px'){
    advDiv.style.height = '360px';
    advDiv.style.border = '1px solid #fff';
    advDiv.style.paddingBottom = "10px";
  } else {
    advDiv.style.height = '0px';
    advDiv.style.border = 'none';
    advDiv.style.paddingBottom = "10px";
  }
}
function minPlayers(select){
  if (select<6) return select;
  else {
    var customTeams = document.getElementById("custom-teams").value;
    return customTeams;
  }
}
function generateArray(arr, random_players){
  var arr_copy=arr.slice(0);
  var j = arr_copy.length;
  for (i=1; i<=j; i++){
    var aux = Math.floor(Math.random() * j);
    if (arr_copy[aux] != "@!"){
      random_players[i-1]=arr_copy[aux];
      arr_copy[aux]="@!";
    } else {
      do{
        aux = Math.floor(Math.random() * j);
      }while(arr_copy[aux]=="@!");
      random_players[i-1]=arr_copy[aux];
      arr_copy[aux]="@!";
    }
  }
}
var teamResult11 = "<div class=\"team-output\" style=\"background-color:";
var teamResult12 = "; color:#000";
var teamResult2 = "\"><h3 style=\"text-align:center; margin:0; text-decoration:underline\">";
var teamResult3 = "</h3><br><div style=\"overflow-y:scroll; height:70%\">";
var teamResult4 = "</tr><br>"
var teamResult5 = "<tr>";
var teamResult6 = "</tr></div></div>";
function displayResults2(i){
  var out="";
  var j=0;
  do{
    out += teamResult5 + result[i][j++] + teamResult4;
  } while(j<result[i].length-1);
  out+= teamResult5 + result[i][j] + teamResult6;
  return out;
}
function displayResult(){
  var output = document.getElementById("output-teams");
  output.innerHTML = "";
  var select = document.getElementById("sel").value;
  var teams = minPlayers(select);
  for(var i=0; i<teams; i++){
    var teamName  = document.getElementById("team-name" + (i+1)).value;
    var teamColor = document.getElementById("team-color" + (i+1)).value;
    if (lightOrDark(teamColor) == 'light') var teamResult1 = teamResult11 + teamColor + teamResult12;
    else teamResult1 = teamResult11 + teamColor;
    if (!teamName.replace(/\s/g, '').length) {
      teamName = "Team " + (i+1);
    }
    if(result[i].length == 1) output.innerHTML+= teamResult1  + teamResult2 + teamName + teamResult3 + result[i][0] + teamResult6;
    else {
      output.innerHTML += teamResult1 + teamResult2 + teamName + teamResult3 + displayResults2(i);
    }
  }
}
function valuesChecking(){
  var textarea = document.querySelector('textarea#rand-input');
  var textareaValue = textarea.value;
  var arr = textareaValue.split('\n');
  for(var i=0; i<arr.length; i++){
    if (!arr[i].replace(/\s/g, '').length) {
      return 0;
    }
  }
  return 1;
}
function generate(){
  var textarea = document.querySelector('textarea#rand-input');
  var textareaValue = textarea.value;
  var arr = textareaValue.split('\n');
  var random_players = [];
  var select = document.getElementById("sel").value;
  var customTeams = document.getElementById("custom-teams").value;
  var min_players = minPlayers(select);//equivalent to team number
  if(select==0) alert("Choose the number of teams first !");
  else if (!valuesChecking()) {
    alert('A value is containing only whitespace (ie. spaces, tabs or line breaks)');
  } else if (select==6 && customTeams <=1) {
    alert("The minimum number of teams is at leats 2 !");
  } else if (arr.length >= min_players){
    generateArray(arr,random_players);
    var period = Math.floor(random_players.length/min_players)-1;
    var counter=0;
    for (var i=0; i<min_players; i++){
      result[i]=[random_players[counter++]];
    }
    if(random_players.length/min_players>1){
      if (period) for (var a=1; a<=period; a++) for (var i=0; i<min_players; i++) result[i].push(random_players[counter++]);
      var cv=0;
      for(b=counter; b<random_players.length;b++){
        result[cv++].push(random_players[b]);
      }
    }
    displayResult();
    console.log(result);
  } else {
    alert("The number of teams cannot exceed the number of players !\nTeams: " + min_players + "\nPlayers: " + arr.length);
  }
}
