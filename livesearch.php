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
    $y=$x->item($i)->getElementsByTagName('data');



    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      



      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          //$l=str_replace(' ','',$y);

          
          $hint="<br><br><a id='results' href='Data/" .
          $y->item(0)->childNodes->item(0)->nodeValue .

          //$y=str_replace(' ', '', $y);

          ".html' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";


        } else {
          //$l=str_replace(' ','',$y);
          $hint=$hint . "<br><br><a id='results' href='Data/" .
          
          $y->item(0)->childNodes->item(0)->nodeValue .
          //$y=str_replace("_"," ",$y);
          
          ".html' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
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
