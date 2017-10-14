<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Ecommerce</title>

        <!-- Bootstrap -->
        <link href="<?php echo BOOTSTRAP_CSS; ?>" rel="stylesheet">
        <!-- Style sheet -->
        <link href="<?php echo STYLE_CSS; ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="<?php echo FAVICON; ?>">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Ecommerce Project</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li <?php if($page=='home'){ echo 'class="active"'; } ?>><a href="<?php echo ADRESSE_ABSOLUE_URL . 'home'?>">Home</a></li>
                    <li <?php if($page=='articles'){ echo 'class="active"'; } ?>><a href="<?php echo ADRESSE_ABSOLUE_URL . 'articles'?>">Articles</a></li>
                    <li <?php if($page=='contact'){ echo 'class="active"'; } ?>><a href="<?php echo ADRESSE_ABSOLUE_URL . 'contact'?>">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if($page=='myCart'){ echo 'class="active"'; } ?>><a href="<?php echo ADRESSE_ABSOLUE_URL . 'myCart'?>">My cart</a></li>
                    <li <?php if($page=='signin'){ echo 'class="active"'; } ?>><a href="<?php echo ADRESSE_ABSOLUE_URL . 'signin'?>">Sign in</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>