# For future developers
I know that I won't be around after I graduate to continue updating and developing this tool, so I have decided to write a comprehensive guide to the workings of this website, along with all of the blunders and successes I've made along the way as warnings for future maintainers

We started the website on Replit.com, I don't know what you are using now, but that's where we started our humble beginnings. We spent a month looking at diffferent ways to search a database from a webpage. We tried JSON, SQL, Ajax, pure javascript, paid services, cloud computing. It took a long time. We finally landed on a php search with an xml database becasue it was the only thing that worked

We looked at img maps, Google maps, pngs, embeding a paid service, OpenStreetMaps, and finally settled on the less elegant html camvas solution for the map portion

We talked to the Computer Science teacher, the IT department, the school marketing director, Buildings and Grounds, and the principal. This project is the result of hundereds of hours of work, thousands of lines of code, countless web searches. 

And now it's yours

## index.php
The search bar is a generic html search bar with css attatched. It's attatched to 

    <div class='se'>

    
Results appear in the empty

    <div id="livesearch"></div>

Right now the results appear each with a background, which is set to a width of 90something% of the screen, in an attempt to be friendly to different screen widths

### Accessibility
One of the goals of this project was to make it as accessible as possible, so I decided to add dyslexia, autism, and color blindness-specific css pages. The buttons that change this are in the sidebar. When a button is clicked, a js script runs which changes which stylesheet is used. The button ids are the first word of the condition lowercase. For example, the button that is "Dyslexia-Friendly" is shortened to 'dyslexia' for it's id. The javascript that runs is in script.js (see more in the script.js section)

#### Dyslexia-Friendly
For a site sensitive to dyslexia, I my researched uncovered that certain fonts and a larger text size made it easier for people with dyslexia to read. I added this as a style option, along with various color blindness syndromes

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

## Script.js

script.js handles search requests from the php page and hands them off to livesearch.php, and vice versa. This means it can affect how the search items are shown on the php page and can sort through requests

The string 'str' is the searched string 

### Accessibility Scripts

The accessibility scripts are scripts of js in script.js which run when the corresponding button in index.php is clicked. They change the stylesheet that the user is using (See the index.php section for more details). Each button has it's own function. Each function is named "theme[condition]", for example, when the button for dyslexia is clicked, the function "themeDyslexia" runs. 

it's ('link')[1] because style.css is the second <link> element in <head> of index.php. If more <link> elemets were added, subtracted, or moved around the number would hvae to be adjusted


## Database

The database that I landed on is a simple xml database

At the moment, the database is loaded on the same server as the index, but that might change in the future to protect it

Each piece of data is stored in <data></data>. I used to seperate them by teacher names vs room numbers, but it became a hassle and was unnessacary


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

## 'Data' folder
The Data folder holds all of the pages for teachers and rooms. Teacher pages are stored as the first two letters of their first name, a dash, and their full last name (all lowercase). For example, "Aaron Fisher" is stored as 'aa-fisher'

## MakeDatabase.py

Holy cow, I just finished writing the code my goodness that was a lot

MakeDatabase.py works in tandem with admin.php and fileUploadScript.php to create a password-protected admin page and a program that takes the uploaded .xlsx file. turns it into a new xml database, and creates the pages for each new teacher name and/or room number

Keep in mind, inspecting the admin page in your browser will show people the html, but not the php. It starts a session when the password is inputted correctly and fileUploadScriot.php will only load corret=ctly if the session persists

Now that I'm done, I realize that the script doesen't delete unused existing pages and doesen't create pages for room numbers (but I don't think creating new pages for room numbers is that nessacary because they don't change nearly as often)

## update.py
update.py updates the teacher pages and subject pages. It took a lot of work and a lot of if statemants. Because of the nature of the task it's tasked to do, it routinely fetches updated teacher details from the uploaded calendar, and stores them in convienently named variables. If you ever need to build something more which these details, I would suggest adding it onto update.py as I've already done the work of sifting through the calendar and finding these deatils for you. It's also a scalable file, and I've added other thing onto it as I create new things.


## Admin Page

Is the admin page that I coded to be able to change the database quicly and easily. It is currently available through  https://school-website.codeeatspennies.repl.co/admin.php. I didn't take any effort to put it in the front page in order to make it less dicoverable, and only known to people who would use it for good. 

Right now it only has the ability to change the database and display visitors, but I envision it being able to list changes made to the database, change html pages on all of the teachers and rooms monitor website load, and email admins when changes take place or when the website is under a heavy load. More of a dashboard really.

IMPORTANT- The password is hard coded in the code, it's stored as a sha256 hash, in order to change it you need to manually go into the code an replace it with another sha256 hash. The website (so far) does not have any bot protection, so theoretically someone could probably try to brute force the password. Don't let that happen. Keep the password very long. It should be in admin.php

> if($pass=="a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3")
 {
  $_SESSION['password']=$pass;

This is how it is now with the password 123. Replace the long string of letters and numbers with another sha256 hash to change the password. 

When you log in on admin.php it starts a session which allows you acess to fileUploadScript.php, which is where the uploaded file actually goes. Be very careful with the password, itf it is used maliciously someone could upload a file with hundereds of thousands of entries, running the website out of space, memory and eventually shutting it down. 

### Visitor Counter

I made a very crude visitor counter because I wanted to see how many people used my website. It works by loading a php script when index.php is loaded, so it will not track unique visitors or when visitors just reload the page or go back to the homepage, but it works nonetheless. 

The php script opens the file counter.txt, reads it (there should only be one number in it), converts what it reads to an integer, adds one to it, and rewrites the file with the new integer. It's contained in index.php and is displayed on the admin page.

## Web Manifest

The web manifest took a long time to figure out, it's what the browser uses to serve the pwa. In it is the images it loads, the name, the theme colors, and the shortcuts. 


### Service Worker

The website only works with service workers. I don't really know what that means, I found an obscure page on StackOverflow about it and I din't understand, but the website WILL NOT work as a pwa without serviceWorker.js and serviceworkerfromindex.js (it was originally included in index.php but I tried to get the csp to work and ended putting it in a seperate .js file).


## W3.CSS

Using W3.CSS came about from feeling the despair of trying to get the frontend to work equally as well on mobile and chromebook after a haitus of working on backend for a few weeks. 

W3.CSS is a css library that makes it theoretically easier to make mobile-first websites. I'm not going to try to explain it but here's the homepage for all of the documentation -> https://www.w3schools.com/w3css/defaulT.asp

## Map

The map was tricky

There are a few versions of the map floating around, the only slightly usable one was a proposed renovation plan from 2016. It had a few extra rooms, a few missing rooms, and a lot of mislabled rooms. I used GIMP (https://www.gimp.org/) to edit the jpg manually. It was a lot of work. 


## Miscellaneous

### FIIP
FIIP is my shorthand for "Fxi it in post" ((https://www.filmmakingstuff.com/fix-it-in-post/)), a shorthand for filmakers to signal that they'll fix something in the scene later with special effects. I use it mostly as a note to myself to fix a probem later (usually gui problems) 





# For future admins
I don't knwo what the futre looks like for this project after I graduate. Maybe it  will fall to a student volunteer to maintain it, maybe it will fall to the tech interns, maybe it will fall to the IT department, or maybe it will just fall into unuse and fade away from history. 

Whatever happens in the future, I'm going to try my best to make it as easy as possible to maintain it.

So here I will include a guide on how to maintain, protect, and update this tool.



### Good Luck

Now that I have imparted my knowledge, it is up to you to continue this resource. Thank you.

Signed [Name protected], 02-09-2022

If you ever need my help, you can reach me at [email protected]





#### Future maintainers
If you change the code in any way, please, PLEASE add on to this documentation and add your name below



### Hall of Maintainers

2021 - 2023  (Founder) [Name protected], 02-09-2022
