var result = document.getElementById('result');
function hhmm(nrVal, preset_hour, preset_minutes, hmin, hmax, mmin, mmax){
  for (var i=1; i<=nrVal; i++){
    if(preset_hour!="") h = preset_hour;
    else if (hmax!="") h = Math.floor(Math.random() * (hmax - hmin + 1)) +parseFloat(hmin);
    else {
    h = Math.floor(Math.random()*100%24);
  }
    if(preset_minutes!="") m = preset_minutes;
    else if (mmin!="") m = Math.floor(Math.random()*(mmax-mmin+1))+parseFloat(mmin);
    else {
      m = Math.floor(Math.random()*100%60);
    }
    if(document.querySelectorAll("input[type='checkbox']")[0].checked == false){
      if(h<10) result.innerHTML += "0";
      result.innerHTML += h + ":";
      if(m<10) result.innerHTML += "0";
      result.innerHTML +=m + " ";
      } else {
      if(h<10) result.innerHTML += "0";
      result.innerHTML += h + ":";
      if(m<10) result.innerHTML += "0";
      result.innerHTML +=m + "\n";
      }
  }
}
function hhmmss(nrVal, preset_hour, preset_minutes, preset_seconds, hmin, hmax, mmin, mmax, smin, smax){
  for (var i=1; i<=nrVal; i++){
    if(preset_hour!="") h = preset_hour;
    else if (hmax!="") h = Math.floor(Math.random() * (hmax - hmin + 1)) +parseFloat(hmin);
    else h = Math.floor(Math.random()*100%24);
    if(preset_minutes!="") m = preset_minutes;
    else if (mmin!="") m = Math.floor(Math.random()*(mmax-mmin+1))+parseFloat(mmin);
    else m = Math.floor(Math.random()*100%60);
    if(preset_seconds!="") s = preset_seconds;
    else if (smin!="") s = Math.floor(Math.random()*(smax-smin+1))+parseFloat(smin);
    else s = Math.floor(Math.random()*100%60);
    if(document.querySelectorAll("input[type='checkbox']")[0].checked == false){
      if(h<10) result.innerHTML += "0";
      result.innerHTML += h + ":";
      if(m<10) result.innerHTML += "0";
      result.innerHTML +=m + ":";
      if(s<10) result.innerHTML += "0";
      result.innerHTML +=s + " ";
    } else {
      if(h<10) result.innerHTML += "0";
      result.innerHTML += h + ":";
      if(m<10) result.innerHTML += "0";
      result.innerHTML +=m + ":";
      if(s<10) result.innerHTML += "0";
      result.innerHTML +=s + "\n";
    }
  }
}
function hhmmssms(nrVal, preset_hour, preset_minutes, preset_seconds, preset_milliseconds, hmin, hmax, mmin, mmax, smin, smax, msmin, msmax){
  for (var i=1; i<=nrVal; i++){
    if(preset_hour!="") h = preset_hour;
    else if (hmax!="") h = Math.floor(Math.random() * (hmax - hmin + 1)) +parseFloat(hmin);
    else {
    h = Math.floor(Math.random()*100%24);
  }
    if(preset_minutes!="") m = preset_minutes;
    else if (mmin!="") m = Math.floor(Math.random()*(mmax-mmin+1))+parseFloat(mmin);
    else {
      m = Math.floor(Math.random()*100%60);
    }
    if(preset_seconds!="") s = preset_seconds;
    else if (smin!="") s = Math.floor(Math.random()*(smax-smin+1))+parseFloat(smin);
    else {
      s = Math.floor(Math.random()*100%60);
    }
    if(preset_milliseconds!="") ms = preset_milliseconds;
    else if (msmin!="") ms = Math.floor(Math.random()*(msmax-msmin+1))+parseFloat(msmin);
    else {
      ms = Math.floor(Math.random()*100%99);
    }
    if(document.querySelectorAll("input[type='checkbox']")[0].checked == false){
      if(h<10) result.innerHTML += "0";
      result.innerHTML += h + ":";
      if(m<10) result.innerHTML += "0";
      result.innerHTML +=m + ":";
      if(s<10) result.innerHTML += "0";
      result.innerHTML +=s + ":";
      if(ms<10) result.innerHTML += "0";
      result.innerHTML +=ms + " ";
    } else {
      if(h<10) result.innerHTML += "0";
      result.innerHTML += h + ":";
      if(m<10) result.innerHTML += "0";
      result.innerHTML +=m + ":";
      if(s<10) result.innerHTML += "0";
      result.innerHTML +=s + ":";
      if(ms<10) result.innerHTML += "0";
      result.innerHTML +=ms + "\n";
    }
  }
}
function mmssms(nrVal, preset_minutes, preset_seconds, preset_milliseconds, mmin, mmax, smin, smax, msmin, msmax){
  for (var i=1; i<=nrVal; i++){
    if(preset_minutes!="") m = preset_minutes;
    else if (mmin!="") m = Math.floor(Math.random()*(mmax-mmin+1))+parseFloat(mmin);
    else {
      m = Math.floor(Math.random()*100%60);
    }
    if(preset_seconds!="") s = preset_seconds;
    else if (smin!="") s = Math.floor(Math.random()*(smax-smin+1))+parseFloat(smin);
    else {
      s = Math.floor(Math.random()*100%60);
    }
    if(preset_milliseconds!="") ms = preset_milliseconds;
    else if (msmin!="") ms = Math.floor(Math.random()*(msmax-msmin+1))+parseFloat(msmin);
    else {
      ms = Math.floor(Math.random()*100%99);
    }
    if(document.querySelectorAll("input[type='checkbox']")[0].checked == false){
      if(m<10) result.innerHTML += "0";
      result.innerHTML +=m + ":";
      if(s<10) result.innerHTML += "0";
      result.innerHTML +=s + ":";
      if(ms<10) result.innerHTML += "0";
      result.innerHTML +=ms + " ";
    } else {
      if(m<10) result.innerHTML += "0";
      result.innerHTML +=m + ":";
      if(s<10) result.innerHTML += "0";
      result.innerHTML +=s + ":";
      if(ms<10) result.innerHTML += "0";
      result.innerHTML +=ms + "\n";
    }
  }
}
function ssms(nrVal, preset_seconds, preset_milliseconds, smin, smax, msmin, msmax){
  for (var i=1; i<=nrVal; i++){
    if(preset_seconds!="") s = preset_seconds;
    else if (smin!="") s = Math.floor(Math.random()*(smax-smin+1))+parseFloat(smin);
    else {
      s = Math.floor(Math.random()*100%60);
    }
    if(preset_milliseconds!="") ms = preset_milliseconds;
    else if (msmin!="") ms = Math.floor(Math.random()*(msmax-msmin+1))+parseFloat(msmin);
    else {
      ms = Math.floor(Math.random()*100%99);
    }
    if(document.querySelectorAll("input[type='checkbox']")[0].checked == false){
      if(s<10) result.innerHTML += "0";
      result.innerHTML +=s + ":";
      if(ms<10) result.innerHTML += "0";
      result.innerHTML +=ms + " ";
    } else {
      if(s<10) result.innerHTML += "0";
      result.innerHTML +=s + ":";
      if(ms<10) result.innerHTML += "0";
      result.innerHTML +=ms + "\n";
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
function advanced(){
  advDiv = document.getElementById("advanced");
  if(advDiv.style.height === '0px'){
    advDiv.style.height = '350px';
    advDiv.style.border = '1px solid #fff';
  } else {
    advDiv.style.height = '0px';
    advDiv.style.border = 'none';
  }
}

function resetMoreOptions(){
  var i=1;
  while(i<=12){
    document.querySelectorAll("input[type='number']")[i++].value="";
  }
  document.querySelectorAll("input[type='checkbox']")[0].checked = false;
}
function resetAll(){
  resetMoreOptions();
  document.querySelectorAll("input[type='checkbox']")[1].checked = true;
  document.querySelectorAll("input[type='number']")[0].value="1";
  document.getElementById("h-format").selectedIndex = "0";
}
function interval(hmin,hmax,mmin,mmax,smin,smax,msmin,msmax){
  if (parseFloat(hmin)>parseFloat(hmax)) {
    alert("ERROR: An interval minimum is greater than a maximum\nReseting both to default...");
    document.getElementsByName("interval-hour-min")[0].value = "";
    document.getElementsByName("interval-hour-max")[0].value = "";
    return 0;
  } else if ((hmin=="" && hmax!="") || (hmax=="" && hmin!="")){
    alert("ERROR: One of the fields from the \"Hour\" interval was left empty while the other one not\nComplete both or let them empty and try again");
    return 0;
  } else if (hmin<0 || hmax<0){
    alert("ERROR: An interval edge cannot be negative in this randomizer!");
    return 0;
  } else if (hmin>23 || hmax>23){
    alert("ERROR: An \"Hour\" interval edge cannot exceed 23");
    return 0;
  }
  if (parseFloat(mmin)>parseFloat(mmax)) {
    alert("ERROR: An interval minimum is greater than a maximum\nReseting both to default...");
    document.getElementsByName("interval-minutes-min")[0].value = "";
    document.getElementsByName("interval-minutes-max")[0].value = "";
    return 0;
  } else if ((mmin=="" && mmax!="") || (mmax=="" && mmin!="")){
    alert("ERROR: One of the fields from the \"Minutes\" interval was left empty while the other one not\nComplete both or let them empty and try again");
    return 0;
  } else if (mmin<0 || mmax<0){
    alert("ERROR: An interval edge cannot be negative in this randomizer!");
    return 0;
  } else if (mmin>59 || mmax>59){
    alert("ERROR: A \"Minutes\" interval edge cannot exceed 59!");
    return 0;
  }
  if (parseFloat(smin)>parseFloat(smax)) {
    alert("ERROR: An interval minimum is greater than a maximum\nReseting both to default...");
    document.getElementsByName("interval-seconds-min")[0].value = "";
    document.getElementsByName("interval-seconds-max")[0].value = "";
    return 0;
  } else if ((smin=="" && smax!="") || (smax=="" && smin!="")){
    alert("ERROR: One of the fields from the \"Seconds\" interval was left empty while the other one not\nComplete both or let them empty and try again");
    return 0;
  } else if (smin<0 || smax<0){
    alert("ERROR: An interval edge cannot be negative in this randomizer!");
    return 0;
  } else if (smin>59 || smax>59){
    alert("ERROR: A \"Seconds\" interval edge cannot exceed 59!");
    return 0;
  }
  if (parseFloat(msmin)>parseFloat(msmax)) {
    alert("ERROR: An interval minimum is greater than a maximum\nReseting both to default...");
    document.getElementsByName("interval-milliseconds-min")[0].value = "";
    document.getElementsByName("interval-milliseconds-max")[0].value = "";
    return 0;
  } else if ((msmin=="" && msmax!="") || (msmax=="" && msmin!="")){
    alert("ERROR: One of the fields from the \"Milliseconds\" interval was left empty while the other one not\nComplete both or let them empty and try again");
    return 0;
  } else if (msmin<0 || msmax<0){
    alert("ERROR: An interval edge cannot be negative in this randomizer!");
    return 0;
  } else if (msmin>99 || msmax>99){
    alert("ERROR: A \"Milliseconds\" interval edge cannot exceed 99!");
    return 0;
  }
  return 1;
}
function preset(preset_hour, preset_minutes, preset_seconds, preset_milliseconds){
  if (preset_hour<0 || preset_hour>23) {
    alert("ERROR: The \"Hour\" preset value must be an integer between 0 and 23 !");
    return 0;
  }
  if (preset_minutes<0 || preset_minutes>59) {
    alert("ERROR: The \"Minutes\" preset value must be an integer between 0 and 59 !");
    return 0;
  }
  if (preset_seconds<0 || preset_seconds>59) {
    alert("ERROR: The \"Seconds\" preset value must be an integer between 0 and 59 !");
    return 0;
  }
  if (preset_milliseconds<0 || preset_milliseconds>99) {
    alert("ERROR: The \"Milliseconds\" preset value must be an integer between 0 and 99 !");
    return 0;
  }
  return 1;
}
function generate(){
  //interval vars
  var hmin = document.getElementsByName("interval-hour-min")[0].value;
  var hmax = document.getElementsByName("interval-hour-max")[0].value;

  var mmin = document.getElementsByName("interval-minutes-min")[0].value;
  var mmax = document.getElementsByName("interval-minutes-max")[0].value;

  var smin = document.getElementsByName("interval-seconds-min")[0].value;
  var smax = document.getElementsByName("interval-seconds-max")[0].value;

  var msmin = document.getElementsByName("interval-milliseconds-min")[0].value;
  var msmax = document.getElementsByName("interval-milliseconds-max")[0].value;

  //preset vars
  var preset_hour = document.getElementsByName("preset-hour")[0].value;
  var preset_minutes = document.getElementsByName("preset-minutes")[0].value;
  var preset_seconds = document.getElementsByName("preset-seconds")[0].value;
  var preset_milliseconds = document.getElementsByName("preset-milliseconds")[0].value;

  if(preset(preset_hour, preset_minutes, preset_seconds, preset_milliseconds) && interval(hmin,hmax,mmin,mmax,smin,smax,msmin,msmax)){
    //other vars
    var nrVal = document.getElementById('number-of-values').value;
    var h_format = document.getElementById("h-format").value;
    //delete previous values -> checkbox
    if (document.querySelectorAll("input[type='checkbox']")[1].checked == true){
      document.getElementById("result").innerHTML = "";
    }
    //checking the time format
    switch(h_format){
      case "1" : hhmm(nrVal, preset_hour, preset_minutes, hmin, hmax, mmin, mmax); break;
      case "2" : hhmmss(nrVal, preset_hour, preset_minutes, preset_seconds, hmin, hmax, mmin, mmax, smin, smax); break;
      case "3" : hhmmssms(nrVal, preset_hour, preset_minutes, preset_seconds, preset_milliseconds, hmin, hmax, mmin, mmax, smin, smax, msmin, msmax); break;
      case "4" : mmssms(nrVal, preset_minutes, preset_seconds, preset_milliseconds, mmin, mmax, smin, smax, msmin, msmax); break;
      case "5" : ssms(nrVal, preset_seconds, preset_milliseconds, smin, smax, msmin, msmax);
    }
  }
  else {
    console.log("An error has occured. Check the inputs and try again !");
  }
}
