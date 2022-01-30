var dafuq = 0;
var operator = " ";
var select = document.getElementById("sel");
function displayOperatorInput (){
  if(select.value == 3){
    document.getElementById("operator-input").style.display = "block";
  }
  else {
    document.getElementById("operator-input").style.display = "none";
    if (select.value == 1){
      operator = " ";
    }
    else {
      operator = "\n";
    }
  }
}
function generate() {
  if (document.querySelectorAll("input[type='checkbox']")[0].checked == true){
    document.getElementById("result").innerHTML = "";
  }
  if (select.value == 3){
    operator = document.getElementById("operator-input").value;
  }
  var decimals = document.getElementById("decimals").value;
  var i = document.getElementById("number-of-values").value;
  var minim = document.getElementById("min-value").value;
  var maxim = document.getElementById("max-value").value;
  var aux = maxim;
  var idk = aux.toString().length;
  if (minim>maxim){
    dafuq++;
    if (dafuq <= 10){
      document.getElementById("result").innerHTML = "ERROR: The minimum value is greater than the maximum value";
    }
    else {
      document.getElementById("result").innerHTML = "<a href=\"https://www.mathsisfun.com/equal-less-greater.html\">Hmm..</a><br>Are you experiencing any problems? Try <a href=\"http://192.168.1.4/randomeverything/contact.php\" style=\"text-decoration:underline;\">contacting</a> us for further support.";
    }
  }
  else {
    if (decimals<0){
      document.getElementById("result").innerHTML = "ERROR: The number of decimals cannot be a negative number, I will reset it to 0 for you :)";
      document.getElementById("decimals").value = 0;
    } else {
      dafuq = 0;
      for (var j=1; j<=i; j++){
        var x = parseFloat((Math.random() *Math.pow(10,idk)%maxim+1).toFixed(decimals));
        while (x<minim){
          x+=maxim-minim;
        }
        if (x>maxim) x-=1;
        document.getElementById("result").innerHTML += x + operator;
      }
    }
  }
}
function copyText() {
  var copy = document.getElementById("result");
  copy.disabled = false;
  copy.select();
  document.execCommand("copy");
  copy.disabled = true;
}
