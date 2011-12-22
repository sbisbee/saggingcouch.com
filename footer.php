      </div>
    </div>
    <div id="downloadDialog" title="Download Sag">
      <p>
        <ul>
          <li><a href="download.php">All Downloads</a>
          <li><a href="distrib/sag-0.7.1.tar.gz">Sag-PHP v0.7.1</a>
          <li><a href="distrib/sag-js-0.1.0.tar.gz">Sag-JS v0.1.0</a>
        </ul>
      </p>
    </div>

    <script src="jquery-ui/js/jquery-1.6.2.min.js"></script>
    <script src="jquery-ui/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script src="main.js"></script>
    <script>
      (function (window, document) {
        var ref = document.getElementsByTagName('script')[0],
            script = document.createElement('script'),
            secure = window.location.protocol === 'https:';
        script.async = true;
        script.src = secure ? 'https://secure-platform.tiptheweb.org/tip/button.js'
                            : 'http://platform.tiptheweb.org/tip/button.js';
        ref.parentNode.insertBefore(script, ref);
      }(this, this.document));
    </script>
    <script>
      var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
      document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script>
      try {
      var pageTracker = _gat._getTracker("UA-15812049-1");
      pageTracker._trackPageview();
      } catch(err) {}
    </script>
  </body>
</html>
