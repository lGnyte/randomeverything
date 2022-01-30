var colorDiv = document.getElementById("color-div");
var colorSpan = document.getElementById("color-span");
var colorSample = document.getElementById("color-sample");
var resultBox = document.getElementById("result");
var historyBox = document.getElementById("history");
function displayColor() {
  colorDiv.style.display = "table";
}
function cloneDiv (divColor){
  var clone = colorDiv.cloneNode(true);
  clone.style.width = "154px";
  clone.style.marginRight = "20px";
  if (divColor.charAt(1)<8){
    clone.style.background = "white";
  }
  historyBox.insertBefore(clone, historyBox.firstChild);
}
function removeHistory() {
  while(historyBox.firstChild){
    historyBox.removeChild(historyBox.firstChild);
  }
  colorDiv.style.display = "none";
  resultBox.style.border = "1px solid white";
  resultBox.style.background = "#001b47";
}
function generate() {
  var colors = [
    ["#ff0000", "#0000ff", "#ffff00"],
    ["#ff0000", "#ffff00", "#0000ff", "#00ff00", "#ffa500", "#800080"],
    ["#ff0000", "#ffff00", "#0000ff", "#00ff00", "#ffa500", "#800080", "#c71585", "#ff5349", "#ffae42", "#9acd32", "#0d98ba", "#8a2be2"],
  ];
  var a = document.getElementById("color-pallete");
  var y = a.options[a.selectedIndex].value;
  var b;
  if (y==4){
    var letters = '01234567890abcdef';
    var color = '#';
    for (var i=0; i<6; i++) {
      color+= letters[Math.floor(Math.random()*16)];
    }
    if (color.charAt(1)>7 || color.charAt(1)=='a' || color.charAt(1)=='b' || color.charAt(1)=='c' || color.charAt(1)=='d' || color.charAt(1)=='e' || color.charAt(1)=='f'){
      resultBox.style.background = "#001b47";
      resultBox.style.color = "white";
      resultBox.style.border = "1px solid white";
      // colorSpan.style.border = "3px solid white";
      colorSpan.style.background = color;
      colorSample.style.color = color;
      colorSample.innerHTML = color;
      displayColor();
      cloneDiv(color);
    } else {
      resultBox.style.background = "white";
      resultBox.style.color = "#001b47";
      resultBox.style.border = "1px solid black";
      // colorSpan.style.border = "3px solid black";
      colorSpan.style.background = color;
      colorSample.style.color = color;
      colorSample.innerHTML = color;
      displayColor();
      cloneDiv(color);
    }
  }else {
    var x = Math.floor(Math.random()*100%colors[y-1].length);
    resultBox.style.background = "#001b47";
    resultBox.style.color = "white";
    resultBox.style.border = "1px solid white";
    // colorSpan.style.border = "3px solid white";
    colorSpan.style.background = colors[y-1][x];
    colorSample.style.color = colors[y-1][x];
    colorSample.innerHTML = colors[y-1][x];
    displayColor();
    cloneDiv(colors[y-1][x]);
  }
};
