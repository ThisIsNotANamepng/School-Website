# For future developers
I know that I won't be around after I graduate to continue updating and developing this tool, so I have decided to write a comprehensive guide to the workings of this website, along with all of the blunders and successes I've made along the way as warnings for future maintainers

We started the website on Replit.com, I don't know what you are using now, but that's where we started our humble beginnings. We spent a month looking at diffferent ways to search a database from a webpage. We tried JSON, SQL, Ajax, pure javascript, paid services, cloud computing. It took a long time. We finally landed on a php search with an xml database becasue it was the only thing that worked

We looked at img maps, Google maps, pngs, embeding a paid service, and finally settled on an OpenStreetMaps project for the map portion

We talked to the Computer Science teacher, the IT department, the school marketing director, and the principal. This project is the result of hundereds of hours of work, thousands of lines of code, countless web searches. 

And now it's yours

## The search bar & results
The search bar is a generic html search bar with css attatched. It's attatched to 

    <div class='se'>

    
Results appear in the empty

    <div id="livesearch"></div>

Right now the results appear each with a background, which is set to a width of 90something% of the screen, in an attempt to be friendly to different screen wdiths

## livesearch.php
livesearch.php is the php file that sorts through the xml database and returns the results. 

Because of

  $linkName=str_replace (' ','',$y->item(0)->childNodes->item(0)->nodeValue);

Anything function that uses the variable $linkName will be using the teacher name or room number that it has retrived. The $q variable is the search text

For example, the code line

    if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {

Searches the <name> category using the entered text

You can use this file to change what gets returned as results in what is now line 20 and 34

    if ($hint=="") {
      $hint="<br><br><a id='results' href='" .
      $y->item(0)->childNodes->item(0)->nodeValue .
      "' target='_blank'>" .
      $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
    }

This code block returns the result in the form of a link. You could, for example, add more space between results by adding a page break like this

    if ($hint=="") {
      $hint="<br><br><br><br><a id='results' href='" .
      $y->item(0)->childNodes->item(0)->nodeValue .
      "' target='_blank'>" .
      $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
    }

Or you could change the css id like this

    if ($hint=="") {
      $hint="<br><br><a id='a_new_id' href='" .
      $y->item(0)->childNodes->item(0)->nodeValue .
      "' target='_blank'>" .
      $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
    }


## Database

The database that I landed on is a simple xml database

At the moment, the database is loaded on the same server as the index, but that might change in the future to protect it

Each pair of items are stored in a <school> row, the teacher's name and room number are stored in the <name> and <room> rows, respectively


## Content Security Policy

To protect the website, I set up a content security policy ([CSP](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP)). It's currently 

    header("Content-Security-Policy: img-src https://*; child-src 'none'; frame-ancestors 'self'; base-uri 'self';  form-action 'self';  font-src 'self'; object-src 'none'; upgrade-insecure-requests; ");

It makes sure all images and requests are converted from http to https, and blocks some other things from being loaded when the source is from outside of the server. From my experimentation, I found that 


  > default-src 'self'; 

  and

  > script-src 'anything'; 

break the search function.

I used 

> https://observatory.mozilla.org/

> https://csp-evaluator.withgoogle.com/

> https://cspscanner.com/

> https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy

> https://developers.google.com/web/fundamentals/security/csp/

and 

> https://content-security-policy.com/
























If you ever need my help, you can reach me at [email protected]

Signed, [Name protected]