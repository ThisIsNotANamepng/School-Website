document.requestFullscreen()

function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="0px solid #A5ACB2";
    }
  }
  
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}


function themeDyslexia() {
  // Obtains an array of all <link>
  // elements.
  // Select your element using indexing.
  //it's ('link')[1] because style.css is the second <link> element in <head> of index.php. If more <link> elemets were added, subtracted, or moved around the number would hvae to be adjusted
  var theme = document.getElementsByTagName('link')[1];

  // Change the value of href attribute
  // to change the css sheet.
  theme.setAttribute('href', 'css/dyslexia.css');
}
function themeAutism() {
  var theme = document.getElementsByTagName('link')[1];
  theme.setAttribute('href', 'css/autism.css');
}
function themeProtanomaly() {
  var theme = document.getElementsByTagName('link')[1];
  theme.setAttribute('href', 'css/protanomaly.css');
}
function themeTritanomaly() {
  var theme = document.getElementsByTagName('link')[1];
  theme.setAttribute('href', 'css/tritanomaly.css');
}
function themeDefault() {
  var theme = document.getElementsByTagName('link')[1];
  theme.setAttribute('href', 'css/style.css');
}

//FIIP: set cookie with style theme