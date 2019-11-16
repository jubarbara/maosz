<?php
    // Alkalmazás logika:
    include('config.inc.php');

    // adatok összegyűjtése:
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);

    // Megjelenítés logika:
?><!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Galéria</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/media-queries.css">

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" >

  <style>
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>

<style type="text/css">
    div#galeria {margin: 0 auto; width: 620px;}
    div.kep { display: inline-block; }
    div.kep img { width: 200px; }
</style>

</head>

<body>

   <!-- Header
   ================================================== -->
   <header>

      <div class="row">

         <div class="twelve columns">

            <div class="logo">
               <a href="index.html"><img alt="" src="images/logo.png"></a>
            </div>

            <nav id="nav-wrap">

               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

               <ul id="nav" class="nav">

	               <li><a href="index.html">Kezdőlap</a></li>
	               <li><a href="blog.html">Blog</a></li>
                 <li class="current"><span><a href="gallery.php">Galéria</a></span>
                 <ul>
                   <li><a href="gallery.php">Képek</a></li>
                   <li><a href="upload.php">Kép feltöltése</a></li>
                 </ul>
                 </li>
	               <li><a href="about.html">Rólunk</a></li>
                  <li><a href="contact.html">Kapcsolat</a></li>

               </ul> <!-- end #nav -->

            </nav> <!-- end #nav-wrap -->

         </div>

      </div>

   </header> <!-- Header End -->

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Galéria<span>.</span></h1>

         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row page">

         <div id="primary" class="eight columns">

            <section>
              <div id="galeria">

              <?php
              arsort($kepek);
              foreach($kepek as $fajl => $datum)
              {
              ?>
                  <div class="kep">
                      <a href="<?php echo $MAPPA.$fajl ?>">
                          <img src="<?php echo $MAPPA.$fajl ?>">
                      </a>
                      <p>Név:  <?php echo $fajl; ?></p>
                      <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
                  </div>
              <?php
              }
              ?>
              </div>
            </section> <!-- section end -->

         </div> <!-- primary end -->

         <div id="secondary" class="four columns end">

            <aside id="sidebar">

               <div class="widget widget_text">
                  <h5 class="widget-title">Google keresés</h5>
                  <div class="textwidget">

                    <form role="search" method="get" id="searchform" class="searchform" action="http://www.google.co.uk/search?hl=en-GB&source=hp&q=">
                      <div id="gform">
                      <label class="screen-reader-text" for="s"></label>
                      <input type="text" value="" name="q" id="s">
                      <input type="submit" class="btn fa-input" value="&#xf002;" style="font-family: FontAwesome;">
                    </div>
                    </form>

                   </div>
            </div>

               <div class="widget widget_contact">
            <h5>Cím és telefonszám</h5>
            <p class="address">
              Székhely: 1124 Budapest, Thomán István utca 2/B<br>
              <span>+36 30 285 1737</span>
            </p>

            <h5>Email és Közösségi oldal</h5>
            <p>
                     E-mail: elnok@maosz.hu<br>
                     Facebook: <a href="https://www.facebook.com/magyarallatvedokorszagosszervezete/">facebook.com/magyarallatvedokorszagosszervezete</a><br>
                  </p>
          </div>


            </aside>

         </div>

      </div> <!-- page-content End-->

   </div> <!-- Content End-->

   <!-- Tweets Section
   ================================================== -->
   <section id="tweets">

         <ul id="twitter" class="align-center">
            <li>
               <span>
               <a href="http://www.maosz.hu">Eredeti oldal megtekintése</a>
               </span>
            </li>

   </section> <!-- Tweet Section End-->

   <!-- footer
   ================================================== -->
   <footer>

      <div class="row">

         <div class="twelve columns">

            <ul class="footer-nav">
					<li><a href="index.html">Kezdőlap.</a></li>
              	<li><a href="blog.html">Blog.</a></li>
                <li><a href="gallery.php">Galéria.</a></li>
              	<li><a href="about.html">Rólunk.</a></li>
              	<li><a href="contact.html">Kapcsolat.</a></li>
			   </ul>

            <ul class="footer-social">
               <li><a href="https://www.facebook.com/magyarallatvedokorszagosszervezete/"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            </ul>

            <ul class="copyright">
               <li>Copyright &copy; 2014 sparrow</li>
               <li>Design by <a href="http://www.styleshout.com/">Styleshout</a></li>
            </ul>

         </div>

         <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

      </div>

   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

   <script src="js/jquery.flexslider.js"></script>
   <script src="js/doubletaptogo.js"></script>
   <script src="js/init.js"></script>

</body>

</html>
