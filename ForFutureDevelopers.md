# For future developers
I know that I won't be around after I graduate to continue updating and developing this tool, so I have decided to write a comprehensive guide to the workings of this website, along with all of the blunders and successes I've made along the way as warnings for future maintainers

We started the website on Replit.com, I don't know what you are using now, but that's where we started our humble beginnings. We spent a month looking at diffferent ways to search a database from a webpage. We tried JSON, SQL, Ajax, pure javascript, paid services, cloud computing. It took a while. We finally landed on a php search with an xml database becasue it was the only thing that worked

### The search bar & results
The search bar is a generic html search bar with css attatched. It's attatched to 

    <div class='se'>

    
    Results appear in the empty

    <div id="livesearch"></div>

Right now the results appear each with a background, which is set to a width of 90something% of the screen, in an attempt to be friendly to different screen wdiths

### livesearch.php









Signed, [Name protected]