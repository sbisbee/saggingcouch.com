<?php require_once('header.php'); ?>

<h1>The Sag Project</h1>

<p>
  Sag is a PHP library for CouchDB. Its guiding principle is simplicity, creating
  a powerful interface with little overhead that can be easily integrated with
  any application structure. It does not force your application to use a
  framework, special classes for documents, or ORM - but you still can if you
  want to.

<p>
  Sag accepts basic PHP data structures (objects, strings, etc.), and returns
  either raw JSON or the response and HTTP information in an object. 

<p>
  <strong>All code is tested against CouchDB 1.1.x and 1.0.x, and PHP 5.3 using
  automated tests</strong>. It's most likely still compatible with CouchDB
  0.11.x.

<div id="announcement">
  <div id="announcementBody">
    <p>
      <strong>Sag-JS Coming Soon:<br/>browser + Node.JS in 1 File</strong>
    <p>
      <a href="https://github.com/sbisbee/sag-js">Sneak Peak @ Development <img src="./images/external.png"/></a>
  </div>
</div>

<h2>A Quick Example</h2>

<script src="https://gist.github.com/850293.js?file=sag-examples.php"></script>

<h2>In the News</h2>

<ul id="press">
  <li>
    [2011-04-08]
    <a href="http://weblog.bocoup.com/storing-php-sessions-in-couchdb">Storing PHP Sessions in CouchDB</a>
    by Sam Bisbee

  <li>
    [2011-02-28]
    <a href="http://blog.tropo.com/2011/02/28/no-more-coworking-lockouts-with-tropo-and-couchdb/">No More Coworking Lockouts with Tropo and CouchDB</a>
    by Mark Headd

  <li>
    [2011-01-20]
    <a href="http://blog.tropo.com/2011/01/20/control-your-tropo-scripts-with-external-events/">Control Your Tropo Scripts with External Events</a>
    by Mark Headd

  <li>
    [2010-11-22] 
    <a href="http://www.sbisbee.com/blog.php?id=1654637551">Benchmarking native PHP caching storage options</a>
    by Sam Bisbee
</ul>

<?php require_once('footer.php'); ?>
