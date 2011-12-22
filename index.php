<?php require_once('header.php'); ?>

<h1>Sag - PHP &amp; JS for CouchDB</h1>

<p>
  Sag is a suite of libraries for connecting to CouchDB. Its guiding principle
  is simplicity, creating a powerful interface with little overhead that can be
  easily integrated with any application structure.

<ul class="checkBoxList">
  <li>
    <span>No crazy stuff</span>
    No special frameworks, classes for documents, or erroneous HTTP calls.
  </li>

  <li>
    <span>Gently wraps CouchDB's API</span>
    You still use functions like get(), post(), and put().
  </li>

  <li>
    <span>Automated testing</span>
    Every release is automatically tested against CouchDB 1.0.x and 1.1.x,
    BigCouch 0.3, and Cloudant.
  </li>

  <li>
    <span>Client side caching</span>
    Sag takes advantage of CouchDB speaking HTTP and uses Etags for caching.
  </li>

  <li>
    <span>The same API in PHP and JS</span>
    Born in March 2010 as a PHP library, Sag-JS provides the same API.
  </li>
</ul>

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
