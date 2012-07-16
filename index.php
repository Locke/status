<?php

include_once('framework_ajax.php');

/******************************************************************/



echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PIRATEN Hessen IT-Status</title>
    <meta name="description" content="IT-Status der PIRATEN Hessen">
    <meta name="author" content="Niels Lohmann">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="html5.js"></script>
    <![endif]-->
    
    <script src="jquery-1.7.1.min.js"></script>

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="bootstrap-responsive.css" rel="stylesheet">
    <link href="docs.css" rel="stylesheet">
  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50">
		 <a href="https://github.com/levu42/status"><img style="position: fixed; top: 40px; right: 0; border: 0; z-index: 1000;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
';

if (!isset($_GET['view'])) {
	$_GET['view'] = 'overview';
}

echo '
  <div class="topbar">
    <div class="fill">
      <div class="container">
        <a class="brand" href="#">IT Status</a>
        <ul class="nav">
          <li' . (($_GET['view'] === 'overview') ? ' class="active"' : '') . '><a href="index.php?view=overview">Übersicht</a></li>
          <li' . (($_GET['view'] === 'services') ? ' class="active"' : '') . '><a href="index.php?view=services">Status der Systeme</a></li>
          <li' . (($_GET['view'] === 'mailman-stats') ? ' class="active"' : '') . '><a href="index.php?view=mailman-stats">Mailinglisten</a></li>
        </ul>
      </div>
    </div>
  </div>
  
  <div class="container">
';

switch($_GET['view']) {
	case 'overview':
		include 'overview.php';
	break;
	case 'services':
		include 'services.php';
	break;
	case 'mailman-stats':
		include 'mailman-stats.php';
	break;
}

echo '
  </div> <!-- /container -->

  <footer class="footer">
       <div class="container">
         <p>
					Hessische Adaption von <a href="http://twitter.com/levudev">@levudev</a>, vielen Dank an die <a href="http://twitter.com/Piraten_MV_IT">@Piraten_MV_IT</a> für das Grundgerüst!<br>
          Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>.
         </p>
       </div>
     </footer>

<script src="bootstrap-transition.js"></script>
<script src="bootstrap-alert.js"></script>
<script src="bootstrap-modal.js"></script>
<script src="bootstrap-dropdown.js"></script>
<script src="bootstrap-scrollspy.js"></script>
<script src="application.js"></script>

      </body>
    </html>

';


?>
