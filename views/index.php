<html>
<head>
	<link rel='stylesheet' href='/public/bootstrap/css/bootstrap.min.css' />
  <link rel='stylesheet' href='/public/skin.css' / >
	<title>Welcome My Blog.</title>
</head>
<body>
	<?php include ('header.php'); ?>
	
       <div class="container">
         <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Welcome to my blog.</h1>
          </div>
        </div>
      </div>
      
      <div class="row">

        <div class="col-sm-8 blog-main">
          <?php 

            $HG =& getInstance ();

            $articleMapper = new ArticleMapper ($HG -> db);
            $articles = $articleMapper -> getArticles ();
            //print_r ($articles);
            foreach ($articles as $article) {
              echo "<div id='wrapper' class='blog-post'>";
              echo "<h2 class='blog-post-title'>{$article ['title']}</h2>";
              echo " <p class='blog-post-meta'><span class='date'>{$article ['date']}</span><a href='#'> by {$article ['author']}</a></p>";
              echo "{$article ['content']}";
              echo "</div>";
            }
          ?>
          <div id='wrapper' class="blog-post">
            <h2 class="blog-post-title">Sample blog post</h2>
            <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

            <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
            <hr>
            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
            
          </div><!-- /.blog-post -->

          <div id='wrapper' class="blog-post">
            <h2 class="blog-post-title">Another blog post</h2>
            <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>

            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
            <blockquote>
              <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </blockquote>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          </div><!-- /.blog-post -->

          <div id='wrapper' class="blog-post">
            <h2 class="blog-post-title">New feature</h2>
            <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <ul>
              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
              <li>Donec id elit non mi porta gravida at eget metus.</li>
              <li>Nulla vitae elit libero, a pharetra augue.</li>
            </ul>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
          </div><!-- /.blog-post -->

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>



<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $ ('.date').each (function (index) {
      var unix_timestamp = $ (this).text();
      $(this).text (new Date (unix_timestamp*1000).toDateString ());
  });
</script>
</body>
</html>