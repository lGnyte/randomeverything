function generate(){
  var textarea = document.querySelector('textarea#rand-input');
  var textareaValue = textarea.value;
  var arr = textareaValue.split('\n');
  var ok=1;
  for(var i=0; i<arr.length; i++){
    if (!arr[i].replace(/\s/g, '').length) {
      i=arr.length;
      alert('A value is containing only whitespace (ie. spaces, tabs or line breaks)');
      ok=0;
    }
  }
  if(ok){
    var x = Math.floor(Math.random() *Math.pow(10,arr.length.toString().length)%arr.length);
    document.getElementById("result").innerHTML = arr[x];
  }
}
