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
    advDiv.style.height = '405px';
    advDiv.style.border = '1px solid #fff';
  } else {
    advDiv.style.height = '0px';
    advDiv.style.border = 'none';
  }
}
function resetMoreOptions(){
  var i=1;
  while(i<=9){
    document.querySelectorAll("input[type='number']")[i++].value="";
  }
  document.querySelectorAll("input[type='checkbox']")[0].checked = true;
  document.querySelectorAll("input[type='checkbox']")[1].checked = true;
  document.getElementById("operator-sel").selectedIndex = "0";
}
function resetAll(){
  resetMoreOptions();
  document.querySelectorAll("input[type='checkbox']")[2].checked = true;
  document.querySelectorAll("input[type='number']")[0].value="1";
  document.getElementById("d-format").selectedIndex = "0";
}
function preset(preset_year, preset_month, preset_day){
  if (preset_year<0 || preset_year>2099) {
    alert("ERROR: The \"Year\" preset value must be an integer between 0 and 2099 !");
    return 0;
  }
  if (preset_month!="" && (preset_month<1 || preset_month>12)) {
    alert("ERROR: The \"Month\" preset value must be an integer between 1 and 12 !");
    return 0;
  }
  if (preset_day!="" && (preset_day<1 || preset_day>31)) {
    alert("ERROR: The \"Day\" preset value must be an integer between 1 and 31 (depends on the month) !");
    return 0;
  }
  return 1;
}
function interval(ymin,ymax,mmin,mmax,dmin,dmax){
  if (parseFloat(ymin)>parseFloat(ymax)) {
    alert("ERROR: An interval minimum is greater than a maximum\nReseting both to default...");
    document.getElementsByName("interval-year-min")[0].value = "";
    document.getElementsByName("interval-year-max")[0].value = "";
    return 0;
  } else if ((ymin=="" && ymax!="") || (ymax=="" && ymin!="")){
    alert("ERROR: One of the fields from the \"Year\" interval was left empty while the other one not\nComplete both or let them empty and try again");
    return 0;
  } else if ((ymin!="" && ymax!="") && (ymin<0 || ymax<0)){
    alert("ERROR: An interval edge cannot be negative in this randomizer!");
    return 0;
  } else if ((ymin!="" && ymax!="") && (ymin>2099 || ymax>2099)){
    alert("ERROR: An \"Year\" interval edge cannot exceed 2099");
    return 0;
  }
  if (parseFloat(mmin)>parseFloat(mmax)) {
    alert("ERROR: An interval minimum is greater than a maximum\nReseting both to default...");
    document.getElementsByName("interval-month-min")[0].value = "";
    document.getElementsByName("interval-month-max")[0].value = "";
    return 0;
  } else if ((mmin=="" && mmax!="") || (mmax=="" && mmin!="")){
    alert("ERROR: One of the fields from the \"Month\" interval was left empty while the other one not\nComplete both or let them empty and try again");
    return 0;
  } else if ((mmin!="" && mmax!="") && (mmin<1 || mmax<1)){
    alert("ERROR: An interval edge cannot be negative in this randomizer!");
    return 0;
  } else if ((mmin!="" && mmax!="") && (mmin>12 || mmax>12)){
    alert("ERROR: A \"Month\" interval edge cannot exceed 12!");
    return 0;
  }
  if (parseFloat(dmin)>parseFloat(dmax)) {
    alert("ERROR: An interval minimum is greater than a maximum\nReseting both to default...");
    document.getElementsByName("interval-day-min")[0].value = "";
    document.getElementsByName("interval-day-max")[0].value = "";
    return 0;
  } else if ((dmin=="" && dmax!="") || (dmax=="" && dmin!="")){
    alert("ERROR: One of the fields from the \"Day\" interval was left empty while the other one not\nComplete both or let them empty and try again");
    return 0;
  } else if ((dmin!="" && dmax!="") && (dmin<1 || dmax<1)){
    alert("ERROR: An interval edge cannot be negative in this randomizer!");
    return 0;
  } else if ((dmin!="" && dmax!="") && (dmin>31 || dmax>31)){
    alert("ERROR: A \"Day\" interval edge cannot exceed 31!");
    return 0;
  }
  return 1;
}
function checkDayByMonth(day, month, year){
  if((month<8 && month%2==0) && day==31) return 0;
  else if((month==9 || month==11) && day==31) return 0;
  else if(month==2 && year%4!=0 && day>28) return 0;
  return 1;
}
function checkDayByMonth1(day, month){
  if((month<8 && month%2==0) && day==31) return 0;
  else if((month==9 || month==11) && day==31) return 0;
  else if (month==2 && day>29) return 0;
  return 1;
}
function mmddyyyy(nr_values, preset_year, preset_month, preset_day, ymax, ymin, mmax, mmin, dmax, dmin){
  var operator = document.getElementById("operator-sel").value;
  var output = document.getElementById("result");
  for(var i=1; i<=nr_values; i++){
    var ok=1;
    if(preset_year!="") var y = preset_year;
    else if (ymax!="") var y = Math.floor(Math.random() * (ymax - ymin + 1)) +parseFloat(ymin);
    else var y = Math.floor(Math.random() * 2100);
    if(preset_month!="") var m = preset_month;
    else if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
    else var m = Math.floor(Math.random() * 12) + 1;
    //particular case
    if(preset_year == "" && preset_month == 2 && (preset_day == 29 || dmax == 29)) while(y%4) y=Math.floor(Math.random() * 2100);
    //rest of the code
    if(preset_day!=""){
      if (!checkDayByMonth(preset_day,m,y)){
        if (preset_month!=""){
          if(preset_year!="" && preset_year%4!=0) {alert("The year you introduced is not a leap year so the day cannot be " + preset_day + " while the month is February(2)");ok=0;i=nr_values+1;}
          else if (preset_day>29 && preset_month==2){ alert("If you have chosen the month to be February(2), you cannot have more than 29 days even though the year might be a leap year");ok=0;}
          else if (!checkDayByMonth(preset_day, preset_month, y)){alert("The day you introduced as a preset value does not fit with the month preset");}
        } else while(m==2 && y%4!=0){
          if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
          else var m = Math.floor(Math.random() * 12) + 1;
        }
      }
      else var d = preset_day;
    } else if (dmax!="") {
      if (!checkDayByMonth(dmax,m,y)) {
       if(preset_month!="") {alert("The preset month does not fit the interval values from the days"); ok=0;}
       else while(!checkDayByMonth(dmax,m,y)){
         if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
         else var m = Math.floor(Math.random() * 12) + 1;
       }
     }
      if (ok) var d = Math.floor(Math.random() * (dmax - dmin + 1)) +parseFloat(dmin);
    } else do{
      var d = Math.floor(Math.random() * 31) + 1;
    } while (!checkDayByMonth(d,m,y));
    if (ok) {
      if (document.querySelectorAll("input[type='checkbox']")[1].checked == true) {
        if(m<10) output.innerHTML+= "0";
        output.innerHTML+= m + operator;
        if(d<10) output.innerHTML+= "0";
        output.innerHTML+= d + operator + y + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      } else {
        output.innerHTML+= m + operator + d + operator + y + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      }
    }
  }
}
function ddmmyyyy(nr_values, preset_year, preset_month, preset_day, ymax, ymin, mmax, mmin, dmax, dmin){
  var operator = document.getElementById("operator-sel").value;
  var output = document.getElementById("result");
  for(var i=1; i<=nr_values; i++){
    var ok=1;
    if(preset_year!="") var y = preset_year;
    else if (ymax!="") var y = Math.floor(Math.random() * (ymax - ymin + 1)) +parseFloat(ymin);
    else var y = Math.floor(Math.random() * 2100);
    if(preset_month!="") var m = preset_month;
    else if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
    else var m = Math.floor(Math.random() * 12) + 1;
    //particular case
    if(preset_year == "" && preset_month == 2 && (preset_day == 29 || dmax == 29)) while(y%4) y=Math.floor(Math.random() * 2100);
    //rest of the code
    if(preset_day!=""){
      if (!checkDayByMonth(preset_day,m,y)){
        if (preset_month!=""){
          if(preset_year!="" && preset_year%4!=0) {alert("The year you introduced is not a leap year so the day cannot be " + preset_day + " while the month is February(2)");ok=0;i=nr_values+1;}
          else if (preset_day>29 && preset_month==2){ alert("If you have chosen the month to be February(2), you cannot have more than 29 days even though the year might be a leap year");ok=0;}
          else if (!checkDayByMonth(preset_day, preset_month, y)){alert("The day you introduced as a preset value does not fit with the month preset");}
        } else while(m==2 && y%4!=0){
          if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
          else var m = Math.floor(Math.random() * 12) + 1;
        }
      }
      else var d = preset_day;
    } else if (dmax!="") {
      if (!checkDayByMonth(dmax,m,y)) {
       if(preset_month!="") {alert("The preset month does not fit the interval values from the days"); ok=0;}
       else while(!checkDayByMonth(dmax,m,y)){
         if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
         else var m = Math.floor(Math.random() * 12) + 1;
       }
     }
      if (ok) var d = Math.floor(Math.random() * (dmax - dmin + 1)) +parseFloat(dmin);
    } else do{
      var d = Math.floor(Math.random() * 31) + 1;
    } while (!checkDayByMonth(d,m,y));
    if (ok) {
      if (document.querySelectorAll("input[type='checkbox']")[1].checked == true) {
        if(d<10) output.innerHTML+= "0";
        output.innerHTML+= d + operator;
        if(m<10) output.innerHTML+= "0";
        output.innerHTML+= m + operator + y + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      } else {
        output.innerHTML+= d + operator + m + operator + y + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      }
    }
  }
}
function yyyymmdd(nr_values, preset_year, preset_month, preset_day, ymax, ymin, mmax, mmin, dmax, dmin){
  var operator = document.getElementById("operator-sel").value;
  var output = document.getElementById("result");
  for(var i=1; i<=nr_values; i++){
    var ok=1;
    if(preset_year!="") var y = preset_year;
    else if (ymax!="") var y = Math.floor(Math.random() * (ymax - ymin + 1)) +parseFloat(ymin);
    else var y = Math.floor(Math.random() * 2100);
    if(preset_month!="") var m = preset_month;
    else if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
    else var m = Math.floor(Math.random() * 12) + 1;
    //particular case
    if(preset_year == "" && preset_month == 2 && (preset_day == 29 || dmax == 29)) while(y%4) y=Math.floor(Math.random() * 2100);
    //rest of the code
    if(preset_day!=""){
      if (!checkDayByMonth(preset_day,m,y)){
        if (preset_month!=""){
          if(preset_year!="" && preset_year%4!=0) {alert("The year you introduced is not a leap year so the day cannot be " + preset_day + " while the month is February(2)");ok=0;i=nr_values+1;}
          else if (preset_day>29 && preset_month==2){ alert("If you have chosen the month to be February(2), you cannot have more than 29 days even though the year might be a leap year");ok=0;}
          else if (!checkDayByMonth(preset_day, preset_month, y)){alert("The day you introduced as a preset value does not fit with the month preset");}
        } else while(m==2 && y%4!=0){
          if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
          else var m = Math.floor(Math.random() * 12) + 1;
        }
      }
      else var d = preset_day;
    } else if (dmax!="") {
      if (!checkDayByMonth(dmax,m,y)) {
       if(preset_month!="") {alert("The preset month does not fit the interval values from the days"); ok=0;}
       else while(!checkDayByMonth(dmax,m,y)){
         if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
         else var m = Math.floor(Math.random() * 12) + 1;
       }
     }
      if (ok) var d = Math.floor(Math.random() * (dmax - dmin + 1)) +parseFloat(dmin);
    } else do{
      var d = Math.floor(Math.random() * 31) + 1;
    } while (!checkDayByMonth(d,m,y));
    if (ok) {
      if (document.querySelectorAll("input[type='checkbox']")[1].checked == true) {
        output.innerHTML+=y + operator
        if(m<10) output.innerHTML+= "0";
        output.innerHTML+= m + operator;
        if(d<10) output.innerHTML+= "0";
        output.innerHTML+= d + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      } else {
        output.innerHTML+= y + operator + m + operator + d + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      }
    }
  }
}
function yyyyddmm(nr_values, preset_year, preset_month, preset_day, ymax, ymin, mmax, mmin, dmax, dmin){
  var operator = document.getElementById("operator-sel").value;
  var output = document.getElementById("result");
  for(var i=1; i<=nr_values; i++){
    var ok=1;
    if(preset_year!="") var y = preset_year;
    else if (ymax!="") var y = Math.floor(Math.random() * (ymax - ymin + 1)) +parseFloat(ymin);
    else var y = Math.floor(Math.random() * 2100);
    if(preset_month!="") var m = preset_month;
    else if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
    else var m = Math.floor(Math.random() * 12) + 1;
    //particular case
    if(preset_year == "" && preset_month == 2 && (preset_day == 29 || dmax == 29)) while(y%4) y=Math.floor(Math.random() * 2100);
    //rest of the code
    if(preset_day!=""){
      if (!checkDayByMonth(preset_day,m,y)){
        if (preset_month!=""){
          if(preset_year!="" && preset_year%4!=0) {alert("The year you introduced is not a leap year so the day cannot be " + preset_day + " while the month is February(2)");ok=0;i=nr_values+1;}
          else if (preset_day>29 && preset_month==2){ alert("If you have chosen the month to be February(2), you cannot have more than 29 days even though the year might be a leap year");ok=0;}
          else if (!checkDayByMonth(preset_day, preset_month, y)){alert("The day you introduced as a preset value does not fit with the month preset");}
        } else while(m==2 && y%4!=0){
          if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
          else var m = Math.floor(Math.random() * 12) + 1;
        }
      }
      else var d = preset_day;
    } else if (dmax!="") {
      if (!checkDayByMonth(dmax,m,y)) {
       if(preset_month!="") {alert("The preset month does not fit the interval values from the days"); ok=0;}
       else while(!checkDayByMonth(dmax,m,y)){
         if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
         else var m = Math.floor(Math.random() * 12) + 1;
       }
     }
      if (ok) var d = Math.floor(Math.random() * (dmax - dmin + 1)) +parseFloat(dmin);
    } else do{
      var d = Math.floor(Math.random() * 31) + 1;
    } while (!checkDayByMonth(d,m,y));
    if (ok) {
      if (document.querySelectorAll("input[type='checkbox']")[1].checked == true) {
        output.innerHTML+=y + operator
        if(d<10) output.innerHTML+= "0";
        output.innerHTML+= d + operator;
        if(m<10) output.innerHTML+= "0";
        output.innerHTML+= m + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      } else {
        output.innerHTML+= y + operator + d + operator + m + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      }
    }
  }
}
function ddmm(nr_values, preset_month, preset_day, mmax, mmin, dmax, dmin){
  var operator = document.getElementById("operator-sel").value;
  var output = document.getElementById("result");
  for(var i=1; i<=nr_values; i++){
    var ok=1;
    if(preset_month!="") var m = preset_month;
    else if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
    else var m = Math.floor(Math.random() * 12) + 1;
    if(preset_day!=""){
      if (!checkDayByMonth1(preset_day,m)){
        if (preset_month!=""){
          if (preset_day>29 && preset_month==2){ alert("If you have chosen the month to be February(2), you cannot have more than 29 days (considering the year is a leap year every time)");ok=0;}
          else if (!checkDayByMonth1(preset_day, preset_month)){alert("The day you introduced as a preset value does not fit with the month preset");}
        } else while(m==2){
          if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
          else var m = Math.floor(Math.random() * 12) + 1;
        }
      } else var d = preset_day;
    } else if (dmax!="") {
        if (!checkDayByMonth1(dmax,m)) {
          if(preset_month!="") {alert("The preset month does not fit the interval values from the days"); ok=0;}
          else while(!checkDayByMonth1(dmax,m)){
            if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
            else var m = Math.floor(Math.random() * 12) + 1;
          }
        }
        if (ok) var d = Math.floor(Math.random() * (dmax - dmin + 1)) +parseFloat(dmin);
      } else do{
          var d = Math.floor(Math.random() * 31) + 1;
        } while (!checkDayByMonth1(d,m));
    if (ok) {
      if (document.querySelectorAll("input[type='checkbox']")[1].checked == true) {
        if(d<10) output.innerHTML+= "0";
        output.innerHTML+= d + operator;
        if(m<10) output.innerHTML+= "0";
        output.innerHTML+= m + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      } else {
        output.innerHTML+= d + operator + m + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      }
    }
  }
}
function mmdd(nr_values, preset_month, preset_day, mmax, mmin, dmax, dmin){
  var operator = document.getElementById("operator-sel").value;
  var output = document.getElementById("result");
  for(var i=1; i<=nr_values; i++){
    var ok=1;
    if(preset_month!="") var m = preset_month;
    else if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
    else var m = Math.floor(Math.random() * 12) + 1;
    if(preset_day!=""){
      if (!checkDayByMonth1(preset_day,m)){
        if (preset_month!=""){
          if (preset_day>29 && preset_month==2){ alert("If you have chosen the month to be February(2), you cannot have more than 29 days (considering the year is a leap year every time)");ok=0;}
          else if (!checkDayByMonth1(preset_day, preset_month)){alert("The day you introduced as a preset value does not fit with the month preset");}
        } else while(m==2){
          if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
          else var m = Math.floor(Math.random() * 12) + 1;
        }
      } else var d = preset_day;
    } else if (dmax!="") {
        if (!checkDayByMonth1(dmax,m)) {
          if(preset_month!="") {alert("The preset month does not fit the interval values from the days"); ok=0;}
          else while(!checkDayByMonth1(dmax,m)){
            if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
            else var m = Math.floor(Math.random() * 12) + 1;
          }
        }
        if (ok) var d = Math.floor(Math.random() * (dmax - dmin + 1)) +parseFloat(dmin);
      } else do{
          var d = Math.floor(Math.random() * 31) + 1;
        } while (!checkDayByMonth1(d,m));
    if (ok) {
      if (document.querySelectorAll("input[type='checkbox']")[1].checked == true) {
        if(m<10) output.innerHTML+= "0";
        output.innerHTML+= m + operator;
        if(d<10) output.innerHTML+= "0";
        output.innerHTML+= d + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      } else {
        output.innerHTML+= m + operator + d + " ";
        if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
      }
    }
  }
}
function mmyyyy(nr_values, preset_year, preset_month, ymax, ymin, mmax, mmin){
  var operator = document.getElementById("operator-sel").value;
  var output = document.getElementById("result");
  for(var i=1; i<=nr_values; i++){
    var ok=1;
    if(preset_year!="") var y = preset_year;
    else if (ymax!="") var y = Math.floor(Math.random() * (ymax - ymin + 1)) +parseFloat(ymin);
    else var y = Math.floor(Math.random() * 2100);
    if(preset_month!="") var m = preset_month;
    else if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
    else var m = Math.floor(Math.random() * 12) + 1;
    if (document.querySelectorAll("input[type='checkbox']")[1].checked == true) {
      if(m<10) output.innerHTML+= "0";
      output.innerHTML+= m + operator + y + " ";
      if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
    } else {
      output.innerHTML+= m + operator + y + " ";
      if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
    }
  }
}
function yyyymm(nr_values, preset_year, preset_month, ymax, ymin, mmax, mmin){
  var operator = document.getElementById("operator-sel").value;
  var output = document.getElementById("result");
  for(var i=1; i<=nr_values; i++){
    var ok=1;
    if(preset_year!="") var y = preset_year;
    else if (ymax!="") var y = Math.floor(Math.random() * (ymax - ymin + 1)) +parseFloat(ymin);
    else var y = Math.floor(Math.random() * 2100);
    if(preset_month!="") var m = preset_month;
    else if (mmax!="") var m = Math.floor(Math.random() * (mmax - mmin + 1)) +parseFloat(mmin);
    else var m = Math.floor(Math.random() * 12) + 1;
    if (document.querySelectorAll("input[type='checkbox']")[1].checked == true) {
      output.innerHTML+= y + operator;
      if(m<10) output.innerHTML+= "0";
      output.innerHTML+= m + " ";
      if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
    } else {
      output.innerHTML+= y + operator + m + " ";
      if (document.querySelectorAll("input[type='checkbox']")[0].checked == true) output.innerHTML+="\n";
    }
  }
}
function generate(){
  //interval vars
  var ymin = document.getElementsByName("interval-year-min")[0].value;
  var ymax = document.getElementsByName("interval-year-max")[0].value;

  var mmin = document.getElementsByName("interval-month-min")[0].value;
  var mmax = document.getElementsByName("interval-month-max")[0].value;

  var dmin = document.getElementsByName("interval-day-min")[0].value;
  var dmax = document.getElementsByName("interval-day-max")[0].value;

  //preset vars
  var preset_year = document.getElementsByName("preset-year")[0].value;
  var preset_month = document.getElementsByName("preset-month")[0].value;
  var preset_day = document.getElementsByName("preset-day")[0].value;

  // interval(ymin, ymax, mmin, mmax, dmin, dmax);
  // console.log("interval e ok");
  // preset(preset_year, preset_month, preset_day);
  // console.log("preset e ok");
  if (interval(ymin, ymax, mmin, mmax, dmin, dmax) && preset(preset_year, preset_month, preset_day)){
    var nr_values = document.getElementsByName("number-of-values")[0].value;
    var date_format = document.getElementById("d-format").value;
    var output = document.getElementById("result");
    if (document.querySelectorAll("input[type='checkbox']")[2].checked == true) output.innerHTML = "";
    switch(parseFloat(date_format)){
      case 1: mmddyyyy(nr_values, preset_year, preset_month, preset_day, ymax, ymin, mmax, mmin, dmax, dmin);break;
      case 2: ddmmyyyy(nr_values, preset_year, preset_month, preset_day, ymax, ymin, mmax, mmin, dmax, dmin);break;
      case 3: yyyymmdd(nr_values, preset_year, preset_month, preset_day, ymax, ymin, mmax, mmin, dmax, dmin);break;
      case 4: yyyyddmm(nr_values, preset_year, preset_month, preset_day, ymax, ymin, mmax, mmin, dmax, dmin);break;
      case 5: ddmm(nr_values, preset_month, preset_day, mmax, mmin, dmax, dmin);break;
      case 6: mmdd(nr_values, preset_month, preset_day, mmax, mmin, dmax, dmin);break;
      case 7: mmyyyy(nr_values, preset_year, preset_month, ymax, ymin, mmax, mmin);break;
      case 8: yyyymm(nr_values, preset_year, preset_month, ymax, ymin, mmax, mmin);
    }
  }
}
