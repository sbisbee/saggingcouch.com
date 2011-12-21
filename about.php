<?php $title = 'About'; require_once('./header.php'); ?>

<h1>About Sag</h1>

<p>
I (<a href="http://www.sbisbee.com">Sam Bisbee <img src="./images/external.png"></a>
) started developing Sag because I was tired of the options for PHP CouchDB
interfaces. I was using the <a href="http://wiki.apache.org/couchdb/Getting_started_with_PHP">CouchDB PHP
example <img src="./images/external.png"></a> code for about a year with some
slight modifications, including on client projects, and it just wasn't cutting
it anymore.

<p>
Most of the projects I looked at used programming models that I didn't like:
they didn't feel natural, were bloated, had some crazy stuff going on under the
hood, etc. I enjoy simplicity in my work, and wanted a library that closely
resembled the actual CouchDB REST interface - <strong><i>I wanted CouchDB's
relaxation in my PHP</i></strong>.

<p>
Building the library this way has the added benefit that the project can easily
build layers on top of the base Sag code. For example, I plan to release
additional classes that provide utility functions for dealing with common
CouchDB problems. Even better is that other people can easily write their own
CouchDB libraries that feel more natural for their application on top of Sag.
Everyone's a winner.

<?php require_once('./footer.php'); ?>
