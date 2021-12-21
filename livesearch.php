<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("database.xml");

$x=$xmlDoc->getElementsByTagName('school');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>1- I made it >1 becasue if it was >0 it would flood the page with options
if (strlen($q)>1) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('name');
    $z=$x->item($i)->getElementsByTagName('room');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
        
          $hint="<br><br><a id='results' href='Teachers/" .
          //$y=str_replace("_"," ",$y);
          $y->item(0)->childNodes->item(0)->nodeValue .
          
          //$y=str_replace("_"," ",$y);

          "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";


        } else {

          $hint=$hint . "<br><br><a id='results' href='Teachers/" .
          //$y=str_replace("_"," ",$y);
          $y->item(0)->childNodes->item(0)->nodeValue .
          //$y=str_replace("_"," ",$y);
          
          ".html' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
      //Search input with letters
      if (stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<br><br><a id='results' href='Rooms/" . //whcih var is the link
          $z->item(0)->childNodes->item(0)->nodeValue .
          ".html' target='_blank'>" .
          $z->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $hint=$hint . "<br><br><a id='results' href='Rooms/" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $z->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response=" ";#put error, nothing found message here
} else {
  $response=$hint;
}

//output the response
echo $response;

?>
