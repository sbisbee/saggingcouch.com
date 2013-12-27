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
    Every release is tested against Cloudant and the latest two versions of
    CouchDB using an <a href="https://github.com/sbisbee/sag/tree/master/tests">automated framework</a>.
  </li>

  <li>
    <span>Client side caching</span>
    Sag takes advantage of CouchDB speaking HTTP and uses Etags for caching.
  </li>

  <li>
    <span>The same API in PHP and JS</span>
    Born in March 2010 as a PHP library, Sag-JS provides the same API in browsers and Node.JS.
  </li>
</ul>

<h2>A Quick Example</h2>

<div id="exTabs">
  <ul>
    <li><a href="#exTabs-1">PHP</a></li>
    <li><a href="#exTabs-2">JS - Node</a></li>
    <li><a href="#exTabs-3">JS - Browser</a></li>
  </ul>
  <div id="exTabs-1">
    <script src="https://gist.github.com/850293.js?file=sag-examples.php"></script>
  </div>
  <div id="exTabs-2">
    <script src="https://gist.github.com/850293.js?file=sag-js-node-example.js"></script>
  </div>
  <div id="exTabs-3">
    <script src="https://gist.github.com/850293.js?file=sag-js-browser-example.html"></script>
  </div>
</div>

<?php require_once('footer.php'); ?>
