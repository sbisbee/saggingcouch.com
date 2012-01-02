<?php $title = "JS Docs"; require('header.php'); ?>

<h1>JavaScript Documentation</h1>

<p><i>
  All of the code samples are available on GitHub
  <a href="https://gist.github.com/1515106">in a gist</a>.
</i></p>

<p>
  For Sag-JS v0.1 (last updated Dec 23, 2011)

<div id="toc">
<ul><li><a href="#Initiating">Initiating</a></li>
<li><a href="#Response%20Callbacks">Response Callbacks</a></li>
<li><a href="#Constants">Constants</a>
<ul><li><a href="#AUTH_BASIC">AUTH_BASIC</a></li>
<li><a href="#AUTH_COOKIE">AUTH_COOKIE</a></li>
</ul>
</li>
<li><a href="#Functions">Functions</a>
<ul><li><a href="#bulk(opts)">bulk(opts)</a></li>
<li><a href="#compact(opts)">compact(opts)</a></li>
<li><a href="#copy(opts)">copy(opts)</a></li>
<li><a href="#createDatabase(name%2C%20callback)">createDatabase(name, callback)</a></li>
<li><a href="#currentDatabase()">currentDatabase()</a></li>
<li><a href="#decode(bool)">decode(bool)</a></li>
<li><a href="#delete(id%2C%20rev%2C%20callback)">delete(id, rev, callback)</a></li>
<li><a href="#deleteDatabase(name%2C%20callback)">deleteDatabase(name, callback)</a></li>
<li><a href="#generateIDs(opts)">generateIDs(opts)</a></li>
<li><a href="#get(opts)">get(opts)</a></li>
<li><a href="#getAllDatabases(callback)">getAllDatabases(callback)</a></li>
<li><a href="#getAllDocs(opts)">getAllDocs(opts)</a></li>
<li><a href="#getCookie(key)">getCookie(key)</a></li>
<li><a href="#getSession(callback)">getSession(callback)</a></li>
<li><a href="#getStats(callback)">getStats(callback)</a></li>
<li><a href="#head(opts)">head(opts)</a></li>
<li><a href="#login(opts)">login(opts)</a></li>
<li><a href="#post(opts)">post(opts)</a></li>
<li><a href="#put(opts)">put(opts)</a></li>
<li><a href="#replicate(opts)">replicate(opts)</a></li>
<li><a href="#setAttachment(opts)">setAttachment(opts)</a></li>
<li><a href="#setCookie(key%2C%20value)">setCookie(key, value)</a></li>
<li><a href="#setDatabase(db%2C%20%5BcreateIfNotFound%5D%2C%20%5BcreateCallback%5D)">setDatabase(db, [createIfNotFound], [createCallback])</a></li>
<li><a href="#setPathPrefix(prefix)">setPathPrefix(prefix)</a></li>
<li><a href="#setStaleDefault(bool)">setStaleDefault(bool)</a></li>
</ul>
</li>
</ul>


</div>

<p>
  The same sag.js file is used in both Node.JS and browser code. It
  automatically detects which environment it is in and selects the best HTTP
  engine to use: XHR for browser and the http module for Node.

<p>
  Cross domain is currently not supported in the browser, but is planned for
  future versions.

<h2 id="Initiating">Initiating</h2>

<p>
  You initiate the Sag object by calling its <code>server()</code> function.

<script src="https://gist.github.com/1515106.js?file=init.html"></script>

<h2 id="Response Callbacks">Response Callbacks</h2>

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

<h2 id="Constants">Constants</h2>

<h3 id="AUTH_BASIC">AUTH_BASIC</h3>

<p>
  Used to tell the <code>login()</code> function you want to use HTTP Basic
  authentication.

<h3 id="AUTH_COOKIE">AUTH_COOKIE</h3>

<p>
  Used to tell the <code>login()</code> function you want to use cookie/session
  based authentication.

<h2 id="Functions">Functions</h2>

You must initialize the Sag object before calling any of these objects. See <a
href="#initiating">Initiating</a>.

<h3 id="setPathPrefix(prefix)">setPathPrefix(prefix)</h3>

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

<h3 id="decode(bool)">decode(bool)</h3>

<p>
  Returns the sag object, so you can chain it.

<p>
  By default Sag will decode JSON responses into native JS types. However, you
  can disable this behavior and just get the string back instead, which might
  be faster if you are dealing with non-JSON responses (ex., attachments or
  HEAD requests).

<script src="https://gist.github.com/1515106.js?file=decode.js"></script>

<h3 id="setDatabase(db, [createIfNotFound], [createCallback])">setDatabase(db, [createIfNotFound], [createCallback])</h3>

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

<h3 id="currentDatabase()">currentDatabase()</h3>

<p>
  Returns what the current database is set to (what you passed to
  <code>setDatabase()</code>. Returns <code>undefined</code> if no database has
  been set yet.

<h3 id="setStaleDefault(bool)">setStaleDefault(bool)</h3>

<p>
  Returns the sag object, so you can chain it.

<p>
  If set to <code>true</code> then all GET requests will have the
  <code>stale=ok</code> query parameter appended to their URL. For example, if
  set and you run a GET on <code>/mydb/_design/app/_view/count</code> then sag
  will turn the URL into <code>/mydb/_design/app/_view/count?stale=ok</code>

<h3 id="get(opts)">get(opts)</h3>

<p>
  Performs a GET request at your database's root. You can use this to access
  documents, views, etc. The options object takes a <code>url</code> and a
  <code>callback</code> function.

<script src="https://gist.github.com/1515106.js?file=get.js"></script>

<h3 id="post(opts)">post(opts)</h3>

<p>
  Performs a POST request at your database's root. You can use this to write
  documents, views, etc. The options object takes <code>data</code> to be
  encoded as JSON, a <code>callback</code> function, and an optional
  <code>url</code>.

<script src="https://gist.github.com/1515106.js?file=post.js"></script>

<h3 id="put(opts)">put(opts)</h3>

<p>
  Performs a PUT request at your database's root. You can use this to write
  documents, views, etc. The options object takes the <code>id</code> (the
  _id), <code>data</code> to be encoded as JSON, and a <code>callback</code>
  function.

<script src="https://gist.github.com/1515106.js?file=put.js"></script>

<h3 id="delete(id, rev, callback)">delete(id, rev, callback)</h3>

<p>
  Performs a DELETE request on a document. You just pass in the document's
  <code>id</code>, <code>rev</code>, and a <code>callback</code> function.

<script src="https://gist.github.com/1515106.js?file=delete.js"></script>

<h3 id="head(opts)">head(opts)</h3>

<p>
  Performs a HEAD request at your database's root. No response body will be
  returned from Couch, making this a much faster operation than a GET and ideal
  when you just want to see something's state.

<script src="https://gist.github.com/1515106.js?file=head.js"></script>

<h3 id="copy(opts)">copy(opts)</h3>

<p>
  Copies a document into a new or existing document. If copying over an
  existing document, then you must provide the <code>dstRev</code>.

<script src="https://gist.github.com/1515106.js?file=copy.js"></script>

<h3 id="getSession(callback)">getSession(callback)</h3>

<p>
  Makes a GET call to /_session, returning your current user's session
  information.

<h3 id="bulk(opts)">bulk(opts)</h3>

<p>
  Makes a bulk request. The options are <code>docs</code> (array of documents),
  <code>callback</code> (the callback function), and the optional
  <code>allOrNothing</code> boolean.

<script src="https://gist.github.com/1515106.js?file=bulk.js"></script>

<h3 id="createDatabase(name, callback)">createDatabase(name, callback)</h3>

<p>
  Create the named database.

<h3 id="deleteDatabase(name, callback)">deleteDatabase(name, callback)</h3>

<p>
  Deletes the named database.

<h3 id="setAttachment(opts)">setAttachment(opts)</h3>

<p>
  Allows you to set an attachment on a document. You must provide the parent
  document's <code>docID</code> and <code>docRev</code>, and the attachment's
  <code>data</code>, <code>contentType</code> (for the Content-Type header),
  and <code>name</code>.

<script src="https://gist.github.com/1515442.js?file=setAttachment.js"></script>

<h3 id="setCookie(key, value)">setCookie(key, value)</h3>

<p>
  You can provide a cookie that will be sent on all subsequent requests to the
  server. Both the <code>key</code> and <code>value</code> must be strings.

<h3 id="getCookie(key)">getCookie(key)</h3>

<p>
  Returns the cookie value, if any, that you set with <code>setCookie()</code>. You will also have access to cookies sent from CouchDB in Node.JS - <strong>you will not have access to cookies from CouchDB in browsers due to browser security.</strong>

<h3 id="replicate(opts)">replicate(opts)</h3>

<p>
  Performs a replication job using the /_replicate endpoint (<u>not</u> the
  /_replicator database).

<p>
  You can do continuous replication by setting the <code>continuous</code>
  parameter to <code>true</code>.

<p>
  You can do filtered replication by providing the <code>filter</code>
  parameter (string). You pass filer parameters as an object to the
  <code>filterQueryParams</code> parameter.

<script src="https://gist.github.com/1515442.js?file=replicate.js"></script>

<h3 id="getAllDocs(opts)">getAllDocs(opts)</h3>

<p>
  Performs a request to /_all_docs. You pass the query parameters in the
  options object: <code>includeDocs</code> (bool), <code>limit</code> (int),
  <code>startKey</code> (string), <code>endKey</code> (string),
  <code>descending</code> (bool), <code>keys</code> (array).

<script src="https://gist.github.com/1515442.js?file=getAllDocs.js"></script>

<h3 id="login(opts)">login(opts)</h3>

<p>
  By default Sag uses HTTP Basic authentication (<code>sag.AUTH_BASIC</code>).
  This is the easiest method, as it does not require any additional HTTP calls:
  you just set the user name and password, and Sag will send it on every
  request.

<p>
  You can elect to use cookie based authentication
  (<code>sag.AUTH_COOKIE</code>). This requires an HTTP POST to /_session at
  the time of invocation to get the AuthSession key. As such you also have to
  provide a callback.

<script src="https://gist.github.com/1515442.js?file=login.js"></script>

<h3 id="getAllDatabases(callback)">getAllDatabases(callback)</h3>

<p>
  Retrieves all of the databases by making a GET call to /_all_dbs. The
  callback function acts just like <code>get()</code>'s.

<h3 id="getStats(callback)">getStats(callback)</h3>

<p>
  Retrieves the server's statistics by making a GET call to /_stats. The
  callback function acts just like <code>get()</code>'s.

<h3 id="generateIDs(opts)">generateIDs(opts)</h3>

<p>
  Uses CouchDB's /_uuids endpoint to generate IDs. You can specific how many
  you want with the <code>count</code> (int) parameter.

<script src="https://gist.github.com/1515442.js?file=generateIDs.js"></script>

<h3 id="compact(opts)">compact(opts)</h3>

<p>
  Initiates a compaction job, optionally allowing you to specify a
  <code>viewName</code>.

<script src="https://gist.github.com/1515442.js?file=compact.js"></script>

<?php require('footer.php'); ?>

