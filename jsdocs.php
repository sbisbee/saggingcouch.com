<?php $title = "JS Docs"; require('header.php'); ?>

<h1>JavaScript Documentation</h1>

<p><i>
  All of the code samples are available on GitHub
  <a href="https://gist.github.com/1515106">in a gist</a>.
</i></p>

<p>
  For Sag-JS v0.1 (last updated Dec 23, 2011)

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

<h2>Response Callbacks</h2>

<p>
  Functions that make calls to CouchDB, such as <code>get()</code>, will always
  accept a callback option. This is a function with two parameters:
  <code>resp</code>, an object explained below, and <code>success</code>, a
  boolean that is set to <code>true</code> if the HTTP response code is less
  than 400 (<code>resp._HTTP.status < 400</code>).

<p>
  The response object has three properties: <code>_HTTP</code>, which has the
  HTTP status line information, <code>headers</code>, which has all of the
  headers (keys are all set to lower case), and <code>body</code>, which has
  the response's body.

<h2>The API</h2>

<h3>setPathPrefix(prefix)</h3>

<p>
  Returns the sag object, so you can chain it.

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
  Returns the sag object, so you can chain it.

<p>
  By default Sag will decode JSON responses into native JS types. However, you
  can disable this behavior and just get the string back instead, which might
  be faster if you are dealing with non-JSON responses (ex., attachments or
  HEAD requests).

<script src="https://gist.github.com/1515106.js?file=decode.js"></script>

<h3>setDatabase(db, [createIfNotFound], [createCallback])</h3>

<p>
  Returns the sag object, so you can chain it.

<p>
  This is how you set your current database: <code>couch.setDatabase('mydb');</code>
  No HTTP calls will be fired off.

<p>
  There are times when you want to make sure that the database exists and
  create it automatically if it doesn't. That is what the additional parameters
  are for.

<script src="https://gist.github.com/1515106.js?file=setDatabase.js"></script>

<h3>currentDatabase()</h3>

<p>
  Returns what the current database is set to (what you passed to
  <code>setDatabase()</code>. Returns <code>undefined</code> if no database has
  been set yet.

<h3>setStaleDefault(bool)</h3>

<p>
  Returns the sag object, so you can chain it.

<p>
  If set to <code>true</code> then all GET requests will have the
  <code>stale=ok</code> query parameter appended to their URL. For example, if
  set and you run a GET on <code>/mydb/_design/app/_view/count</code> then sag
  will turn the URL into <code>/mydb/_design/app/_view/count?stale=ok</code>

<h3>get(opts)</h3>

<p>
  Performs a GET request at your database's root. You can use this to access
  documents, views, etc. The options object takes a <code>url</code> and a
  <code>callback</code> function.

<script src="https://gist.github.com/1515106.js?file=get.js"></script>

<h3>post(opts)</h3>

<p>
  Performs a POST request at your database's root. You can use this to write
  documents, views, etc. The options object takes <code>data</code> to be
  encoded as JSON, a <code>callback</code> function, and an optional
  <code>url</code>.

<script src="https://gist.github.com/1515106.js?file=post.js"></script>

<h3>put(opts)</h3>

<p>
  Performs a PUT request at your database's root. You can use this to write
  documents, views, etc. The options object takes the <code>id</code> (the
  _id), <code>data</code> to be encoded as JSON, and a <code>callback</code>
  function.

<script src="https://gist.github.com/1515106.js?file=put.js"></script>

<h3>delete(id, rev, callback)</h3>

<p>
  Performs a DELETE request on a document. You just pass in the document's
  <code>id</code>, <code>rev</code>, and a <code>callback</code> function.

<script src="https://gist.github.com/1515106.js?file=delete.js"></script>

<h3>head(opts)</h3>

<p>
  Performs a HEAD request at your database's root. No response body will be
  returned from Couch, making this a much faster operation than a GET and ideal
  when you just want to see something's state.

<script src="https://gist.github.com/1515106.js?file=head.js"></script>

<h3>copy(opts)</h3>

<p>
  Copies a document into a new or existing document. If copying over an
  existing document, then you must provide the <code>dstRev</code>.

<script src="https://gist.github.com/1515106.js?file=copy.js"></script>

<h3>getSession(callback)</h3>

<p>
  Makes a GET call to /_session, returning your current user's session
  information.

<h3>bulk(opts)</h3>

<p>
  Makes a bulk request. The options are <code>docs</code> (array of documents),
  <code>callback</code> (the callback function), and the optional
  <code>allOrNothing</code> boolean.

<script src="https://gist.github.com/1515106.js?file=bulk.js"></script>

<?php require('footer.php'); ?>
