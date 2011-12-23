<?php $title = "JS Docs"; require('header.php'); ?>

<h1>JavaScript Documentation</h1>

<p><i>
  All of the code samples are available on GitHub
  <a href="https://gist.github.com/1515106">in a gist</a>.
</i></p>

<div id="toc"></div>

<p>
  The same sag.js file is used in both Node.JS and browser code. It
  automatically detects which environment it is in and selects the best HTTP
  engine to use: XHR for browser and the http module for Node.

<p>
  Cross domain is currently not supported in the browser, but is planned for
  future versions.

<h2>Initiating</h2>

<p>
  You initiate the object by calling its <code>server()</code> function.

<script src="https://gist.github.com/1515106.js?file=init.html"></script>

<h2>The API</h2>

<h3>setPathPrefix(prefix)</h3>

<p>
  There are instances where you will want to prefix all paths, such as when
  sending your calls through a web proxy. This is most likely going to occur
  when running your code in the browser and using a local web proxy to overcome
  cross domain issues. 
</p>

<p>
  For example, let's say http://www.example.com/db proxies to
  http://example.com:5984/, opening the CouchDB API to your web site's
  JavaScript. You would want to initialize your object
  <code>var couch = sag.server('www.example.com', '80');</code> and then set
  your prefix <code>couch.setPathPrefix('/db');</code>
</p>

<h3>decode(bool)</h3>

<p>
  By default Sag will decode JSON responses into native JS types. However, you
  can disable this behavior and just get the string back instead, which might
  be faster if you are dealing with non-JSON responses (ex., attachments or
  HEAD requests).

<script src="https://gist.github.com/1515106.js?file=decode.js"></script>

<h3>setDatabase(db, [createIfNotFound], [createCallback])</h3>

<p>
  This is how you set your current database: <code>couch.setDatabase('mydb');</code>
  No HTTP calls will be fired off.

<p>
  There are times when you want to make sure that the database exists and
  create it automatically if it doesn't. That is what the additional parameters
  are for.

<script src="https://gist.github.com/1515106.js?file=setDatabase.js"></script>

<h3>get(opts)</h3>

<p>

<?php require('footer.php'); ?>
