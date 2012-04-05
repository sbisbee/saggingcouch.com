<?php $title = 'Download'; require_once('header.php'); ?>

<h1>Download Sag</h1>

<p>
Sag is released under the <a
href="http://www.apache.org/licenses/LICENSE-2.0.html">Apache License, version
2.0 <img src="./images/external.png"></a>.

<div id="downloadTabs">
  <ul>
    <li><a href="#downloadTabs-php">PHP</a></li>
    <li><a href="#downloadTabs-js">JS</a></li>
  </ul>
  <div id="downloadTabs-php">
    <p>
      <strong>Jump To</strong>
      <ul>
        <li><a href="#v0.7.1">v0.7.1</a>
        <li><a href="#v0.7.0">v0.7.0</a>
        <li><a href="#v0.6.1">v0.6.1</a>
        <li><a href="#v0.6.0">v0.6.0</a>
        <li><a href="#v0.5.1">v0.5.1</a>
        <li><a href="#v0.5.0">v0.5.0</a>
        <li><a href="#v0.4.0">v0.4.0</a>
        <li><a href="#v0.3.0">v0.3.0</a>
        <li><a href="#v0.2.0">v0.2.0</a>
        <li><a href="#v0.1.0">v0.1.0</a>
      </ul>

    <p>
    You can always get the latest code under development at <a
    href="http://github.com/sbisbee/sag">Github <img src="./images/external.png"></a>, 
    or by cloning the git repository directly:

    <code>
    git clone git://github.com/sbisbee/sag.git sag
    </code>

    <hr/>

    <a name="v0.7.1"></a>
    <h2>0.7.1</h2>
    <p>Released November 18th, 2011</p>

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-0.7.1.tar.gz">sag-0.7.1.tar.gz</a> [<a href="./distrib/sag-0.7.1.tar.gz.sig">GPG Sig</a>] [<a href="./distrib/sag-0.7.1.tar.gz.sha">SHA Checksum</a>] [<a href="./distrib/sag-0.7.1.tar.gz.md5">MD5 Checksum</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.7.1">Github <img src="./images/external.png"></a>
        </li>
      </ul>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>Bug Fixes</u>
      <ul>
        <li>The cURL HTTP library was choking on a HTTP/1.1 Continue header. Only some
        installations were running into this problem, depending on their cURL
        configuration and version.
      </ul>

    <a name="v0.7.0"></a>
    <h2>0.7.0</h2>
    <p>Released November 7th, 2011</p>

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-0.7.0.tar.gz">sag-0.7.0.tar.gz</a> [<a href="./distrib/sag-0.7.0.tar.gz.sig">GPG Sig</a>] [<a href="./distrib/sag-0.7.0.tar.gz.sha">SHA Checksum</a>] [<a href="./distrib/sag-0.7.0.tar.gz.md5">MD5 Checksum</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.7.0">Github <img src="./images/external.png"></a>
        </li>
      </ul>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>New Features</u>
      <ul>
        <li>The HTTP socket code was abstracted out of the core Sag class into its own
        HTTP module. It is called SagNativeHTTPAdapter and remains the default
        transport mechanism. This allows for drivers to be written that leverage
        different HTTP libraries, potentially adding extra functionality. The
        SagNativeHTTPAdapter is referenced by the Sag::$HTTP_NATIVE_SOCKETS static
        public variable and can be specified with the setHTTPAdapter() function.
        (closes #12)

        <li>cURL can now be used when communicating with CouchDB, allowing for
        additional functionality. If your system has the cURL PHP extension
        installed then you can tell Sag to use it by calling
        `$sag->setHTTPAdapter(Sag::$HTTP_CURL);`.

        <li>SSL is now supported if you use cURL instead of native sockets. This
        introduces setSSL() to turn SSL on/off, and setSSLCert() to specify a
        certificate file to verify against. Verification is only supported if you
        provide a certificate with setSSLCert(). HTTP libraries that do not support
        SSL (ie., native sockets) will throw a SagException if you call an SSL
        function.

        <li>You can now tell getAllDocs() to sort in descending order. Thanks to cygal
        (github/cygal) for the patch and pull request. (closes #31)
      </ul>

    <p>
      <u>Fixed Bugs</u>
      <ul>
        <li>If you set the database name and then set it again with the same value, but
        also specify to create the database if it doesn't exist, Sag was previously
        not checking to see if it should create the database. This is not fixed:
        even if you specify the currentDatabase() value as the name the check will
        still run. (closes #33)
      </ul>

    <a name="v0.6.1"></a>
    <h2>0.6.1</h2>
    <p>Released October 21st, 2011</p>

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-0.6.1.tar.gz">sag-0.6.1.tar.gz</a> [<a href="./distrib/sag-0.6.1.tar.gz.sig">GPG Sig</a>] [<a href="./distrib/sag-0.6.1.tar.gz.sha">SHA Checksum</a>] [<a href="./distrib/sag-0.6.1.tar.gz.md5">MD5 Checksum</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.6.1">Github <img src="./images/external.png"></a>
        </li>
      </ul>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>Fixed Bugs</u>
      <ul>
        <li>Fixed a typo bug where I was trying to throw the concept of an Exception
        instead of an instantiation. Luckily it is rare for this corner case in the
        code to run. Thanks to Oliver Kurowski (github/a4mc) for reporting.
        (closes #26)

        <li>Fixed a problem with the HTTP/1.1 decoding of chunked message bodies that
        was causing continuous change feed requests (/db/_changes?continuous=true)
        to fail. (closes #27)

        <li>Fixed a typo bug in examples/phpSessions, changed createdOn to createdAt.
        Thanks to Yo-Han (github/yo-han) for finding the bug and submitting the
        patch as a pull request. (closes #28)
      </ul>

    <a name="v0.6.0"></a>
    <h2>0.6.0</h2>
    <p>Released September 6th, 2011</p>

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-0.6.0.tar.gz">sag-0.6.0.tar.gz</a> [<a href="./distrib/sag-0.6.0.tar.gz.sig">GPG Sig</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.6.0">Github <img src="./images/external.png"></a>
        </li>
      </ul>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>Breaking Changes</u>
      <ul>
        <li>The HTTP status was incorrectly being added to the root of the response
        object in addition to where it belongs in `$resp->headers->_HTTP->status`.
        It is now removed. Applications that were using it at the `$resp->status`
        should fix their code to use the proper location.
      </ul>

    <p>
      <u>New Features</u>
      <ul>
        <li>Sag's internals now use HTTP/1.1 instead of HTTP/1.0. This requires zero
        code changes for your application because Sag's interface is not impacted
        by this.

        <li>You can now set cookies that will be sent with every request using
        setCookie(), and retrieve them with getCookie().

        <li>SagUserUtils is the first of several utility classes that will be added to
        Sag. It gently wraps the Sag interface to make managing CouchDB users much
        easier. You can create and get users, and change their password.

        <li>An example of how to proxy the cookie based auth's AuthSession cookie from
        your PHP layer to CouchDB, making it easier to have user accounts in your
        application without rewriting user management yet again.

        <li>Support for the server level _session object with getSession(). Thanks to
        Tim Juravich for the original patch.
      </ul>

    <p>
      <u>Bug Fixes</u>
      <ul>
        <li>As of CouchDB 1.1.0 inline attachments are sent as multipart HTTP
        responses, which was breaking our parser. This is now fixed by always
        sending an Accept header for 'application/json'. Thanks to Rob Newson and
        Dale Harvey in #couchdb for helping on this. (closes #23)

        <li>Previously an HTTP response code >=400 to a HEAD request would not throw a
        SagCouchException because there was no error property in the message body
        (because HEAD responses do not have bodies). Now a SagCouchException is
        thrown as expected with the exception's code set to the HTTP response code.
        This also creates a slight performance boost for parsing HEAD requests.

        <li>When calling setDatabase() and specifying to create the database if it does
        not already exist, the logic now uses a HEAD request instead of a GET. This
        was a typo/mistake at the time, so it is getting bug status.
      </ul> 

    <a name="v0.5.1"></a>
    <h2>0.5.1</h2>
    <p>Released July 27th, 2011

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-0.5.1.tar.gz">sag-0.5.1.tar.gz</a> [<a href="./distrib/sag-0.5.1.tar.gz.sig">GPG Sig</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.5.1">Github <img src="./images/external.png"></a>
        </li>
      </ul>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>Fixed Bugs</u>
      <ul>
        <li>Previously PUT was caching CouchDB's response, which created unexpected
        results (the actual data being POST'd was expected to be cached). This is
        now fixed: that data provided to post() is combined with the server's
        response to create a cacheable object whose headers will not be entirely
        accurate. POST is still not cached because CouchDB does not respond with an
        E-tag to cache against. Thanks to Peter Kruithof for reporting and original
        patch. (closes #17)

        <li>setAttachment() now properly URL encodes the ?rev parameter when you
        specify the document's _rev (last function parameter). Thanks to skyshard
        for reporting the issue and the fix. (closes #19)
      </ul>

    <a name="v0.5.0"></a>
    <h2>0.5.0</h2>
    <p>Released June 6th, 2011

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-0.5.0.tar.gz">sag-0.5.0.tar.gz</a> [<a href="./distrib/sag-0.5.0.tar.gz.sig">GPG Sig</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.5.0">Github <img src="./images/external.png"></a>
        </li>
      </ul>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>Breaking Changes</u>
      <ul>
        <li>These Sag class functions now return the class's current instance
        ($this): decode, setDatabase, setOpenTimeout, setRWTimeout, setCache,
        setStaleDefault. This allows configuration functions to be chained before
        you make a call to CouchDB. (closes #14)

        <li>Sag->setDatabase() will now URL encode database names that are passed
        to it. This may break your code if you were already encoding database names
        before passing them. For example,
        `$sag->setDatabase(urlencode('some/db'));` will no longer work as expected.
        Instead use `$sag->setDatabase('some/db');`.
      </ul>

    <p>
      <u>New Features</u>
      <ul>
        <li>Sag now supports connection pooling for sockets with HTTP's Connection:
        Keep-Alive. This means Sag no longer opens and closes a socket for each
        request made (better performance). No management is provided for the
        maximum number of sockets that can be kept open, since this should be done
        at the operating system level (ulimit or pam for Linux/Unix). (closes #15)

        <li>Adding support for CouchDB 1.1.x, while dropping support for 0.11.x -
        most of, or all of, 0.11.x will still work with Sag.

        <li>Added the examples/ directory with an example of how one could store
        PHP session data in CouchDB. Related blog post:
        http://weblog.bocoup.com/storing-php-sessions-in-couchdb

        <li>Added tests/bootstrap.php to make running the tests easier.
      </ul>

    <p>
      <u>Fixed Bugs</u>
      <ul>
        <li>All functions that take query parameters as function parameters, such
        as 'startkey' in Sag->getAllDocs(), now URL encode those parameters before
        adding them to the URL. However, functions that you pass whole URLs to,
        like Sag->get(), do not deconstruct the URL for parameters - you must do
        your own URL encoding when providing a full URL to a function.

        <li>Sag->bulk() no longer attempts to cache. This is not a breaking change,
        because it was never able to successfully cache before.
      </ul>

    <p>
    <a name="v0.4.0"></a>
    <h2>0.4.0</h2>
    <p>Released April 1st, 2011 (no joke)

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-0.4.0.tar.gz">sag-0.4.0.tar.gz</a> [<a href="./distrib/sag-0.4.0.tar.gz.sig">GPG Sig</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.4.0">Github <img src="./images/external.png"></a>
        </li>
      </ul>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>New Features</u>
      <ul>
        <li> When initiated, Sag checks the PHP environment for unsupported
        error_reporting values. Thanks to Simeon Willbanks. (closes #8, #9)

        <li> setStaleDefault() was created to easily allow developers the choice of
        making all of their GET and HEAD requests use stale=ok or not. This is
        great for production systems that do all their querying against stale
        views, allowing another process to trigger index updates based on the
        _changes feed.

        <li> Now when calling setDatabase() you can tell it to create the database if it
        does not exist (uses an HTTP GET to check if it exists). If the database
        does not exist, then createDatabase() is called to create it.
      </ul>

    <p>
      <u>Fixed Bugs</u>
      <ul>
        <li> Fixed a bug where an invalid Content-Size was being sent even if no data
        was passed to the packet.

        <li> Fixed a bug in POST where an incorrect variable name was being used,
        allowing improper paths to be sent to CouchDB.

        <li> When caching, bulk() now iterates over the documents it's trying to update
        and sends them to the cache. If a document's _deleted property is true,
        then it's removed from the cache. 
      </ul>
          

    <a name="v0.3.0"></a>
    <h2>0.3.0</h2>
    <p>Released January 3rd, 2011

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-0.3.0.tar.gz">sag-0.3.0.tar.gz</a> [<a href="./distrib/sag-0.3.0.tar.gz.sig">GPG Sig</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.3.0">Github <img src="./images/external.png"></a>
        </li>
      </ul>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>New Features</u>
      <ul>
        <li> Cookie based authentication. Thanks to Benjamin Young. (closes #1)</li>
        <li> Cache results with the SagCache interface. Currently supports caching to disk with SagFileCache.</li>
        <li> Support for HEAD requests. Thanks to Doug Cone. (closes #3)</li>
        <li> You can now POST to any URI in the database, adding a second $uri parameter to the post() function. Allows POST'ing to views. Thanks to Peter Kruithof. (closes #7)</li>
        <li> Exposing CouchDB's runtime _stats interface with the getStats() function.</li>
      </ul>
      
      <u>Fixed Bugs</u>
      <ul>
        <li>getAllDocs() no longer always includes documents. thanks to www.github.com/hepp.</li>
      </ul>


    <a name="v0.2.0"></a>
    <h2>0.2.0</h2>
    <p>Released August 31st, 2010

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-0.2.0.tar.gz">sag-0.2.0.tar.gz</a> [<a href="./distrib/sag-0.2.0.tar.gz.sig">GPG Sig</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.2.0">Github <img src="./images/external.png"></a>
        </li>
      </ul>

    <p>
      <strong>Changelog</strong>
      <ul>
        <li>Officially adding support for 1.0.x and dropping support for 0.10.x.</li>
      </ul>

      <u>New Features</u>
      <ul>
        <li>Native support for attachments.</li>
        <li>Internal support for different Content-Type values.</li>
        <li>Can set timeout on socket connection.</li>
        <li>Can set timeout on socket read/write.</li>
      </ul>

      <u>Fixed Bugs</u>
      <ul>
        <li>Removed leading white space in header values.</li>
        <li>Fixed ending line breaks when sending data via a PUT.</li>
      </ul>

    <a name="v0.1.0"></a>
    <h2>0.1.0</h2>
    <p>
    Released April 29th, 2010

    <p>
    <strong>Files</strong>
    <ul>
      <li>
        Release: <a href="./distrib/sag-0.1.0.tar.gz">sag-0.1.0.tar.gz</a> [<a href="./distrib/sag-0.1.0.tar.gz.sig">GPG Sig</a>]
      </li>
      <li>
        Git Tag: <a href="http://github.com/sbisbee/sag/tree/v0.1.0">Github <img src="./images/external.png"></a>
      </li>
    </ul>
  </div>
  <div id="downloadTabs-js">
    <p>
      You can always get the latest code under development at <a href="http://github.com/sbisbee/sag-js">Github <img src="./images/external.png"></a>, 
      or by cloning the git repository directly: <br/><code>
      git clone git://github.com/sbisbee/sag-js.git sag-js</code>

    <hr/>

    <a name="v0.3.0"></a>
    <h2>0.3.0</h2>
    <p>Released March 24th, 2012</p>

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-js-0.3.0.tar.gz">sag-js-0.3.0.tar.gz</a> [<a href="./distrib/sag-js-0.3.0.tar.gz.sig">GPG Sig</a>] [<a href="./distrib/sag-js-0.3.0.tar.gz.sha">SHA Checksum</a>] [<a href="./distrib/sag-js-0.3.0.tar.gz.md5">MD5 Checksum</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag-js/tree/v0.3.0">Github <img src="./images/external.png"></a>
        </li>
      </ul>
    </p>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>New Features</u>
      <ul>
        <li>You can now initialize your server connection with a URL by using
    sag.serverFromURL(). For example,
    sag.serverFromURL('http://user:pass@user.cloudant.com/db') would be the
    same as using the server() constructor, then login(), and then
    setDatabase().</li>

        <li>Implemented the toString() function on the server() API to return a full
    URL. For example, it might return 'http://user:pass@user.cloudant.com/db'.</li>
      </ul>
    </p>

    <a name="v0.2.0"></a>
    <h2>0.2.0</h2>
    <p>Released March 14th, 2012</p>

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-js-0.2.0.tar.gz">sag-js-0.2.0.tar.gz</a> [<a href="./distrib/sag-js-0.2.0.tar.gz.sig">GPG Sig</a>] [<a href="./distrib/sag-js-0.2.0.tar.gz.sha">SHA Checksum</a>] [<a href="./distrib/sag-js-0.2.0.tar.gz.md5">MD5 Checksum</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag-js/tree/v0.2.0">Github <img src="./images/external.png"></a>
        </li>
      </ul>
    </p>

    <p>
      <strong>Changelog</strong>

    <p>
      <u>New Features</u>
      <ul>
        <li>All of the thrown exceptions are now Error's instead of strings. Closes #1.</li>

        <li>Introduction of `on('event', callback)` which allows you to create global
    event handlers. Currently the only event supported is 'error' whose
    callback gets the response object as its parameter. For example, you can
    make a global error handler by specifying
    `sag.on('error', function(resp) { ... });`. Closes #5.</li>
      </ul>
    </p>

    <a name="v0.1.0"></a>
    <h2>0.1.0</h2>
    <p>Released December 24th, 2011</p>

    <p>
      <strong>Files</strong>
      <ul>
        <li>
          Release: <a href="./distrib/sag-js-0.1.0.tar.gz">sag-js-0.1.0.tar.gz</a> [<a href="./distrib/sag-js-0.1.0.tar.gz.sig">GPG Sig</a>] [<a href="./distrib/sag-js-0.1.0.tar.gz.sha">SHA Checksum</a>] [<a href="./distrib/sag-js-0.1.0.tar.gz.md5">MD5 Checksum</a>]
        </li>
        <li>
          Git Tag: <a href="http://github.com/sbisbee/sag-js/tree/v0.1.0">Github <img src="./images/external.png"></a>
        </li>
      </ul>
    </p>

    <p>
      This is the first release of Sag-JS. It is API compatible with Sag
      v0.7.1.

  </div>
</div>

<?php require_once('footer.php'); ?>
