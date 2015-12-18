<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <base href="<?php echo $base; ?>" />
    <?php if ($description) { ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php } ?>
    <?php if ($keywords) { ?>
    <meta name="keywords" content= "<?php echo $keywords; ?>" />
    <?php } ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php foreach ($links as $link) { ?>
    <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
    <?php } ?>
    <!-- Essential styles -->
    <link rel="stylesheet" href="catalog/view/theme/antibio/assets/assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="catalog/view/theme/antibio/assets/font-awesome/css/font-awesome.min.css" type="text/css"> 
    <link rel="stylesheet" href="catalog/view/theme/antibio/assets/assets/fancybox/jquery.fancybox.css?v=2.1.5" media="screen"> 


    <!-- Boomerang styles -->
    <link id="wpStylesheet" type="text/css" href="catalog/view/theme/antibio/assets/css/global-style.css" rel="stylesheet" media="screen"> 
     <link rel="stylesheet" href="catalog/view/theme/antibio/assets/css/jquery-ui.css">  
    <?php foreach ($styles as $style) { ?>
    <link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
    <?php } ?>
    <?php echo $google_analytics; ?>

    <!-- Favicons -->
    <link href="favicon.png" rel="icon" />

</head>
<body>


<!-- MAIN WRAPPER -->
<div class="body-wrap">
<!-- HEADER -->
<div id="divHeaderWrapper">
  <header class="header-standard-2">     
    <!-- MAIN NAV -->
    <div class="navbar navbar-wp navbar-fixed affix-top navbar-shadow navbar-arrow" data-spy="affix" data-offset-top="100" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars icon-custom"></i>
                </button>
                <?php if ($logo) { ?>
                  <a class="navbar-brand" href="<?php echo $home; ?>">
                    <img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>"/>
                  </a>
                <?php } ?>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about_us">О проекте</a></li>
                    
                    <?php if (!empty($icategories)) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Лекции и вебинары</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($icategories as $ic) { ?>
                                <li><a href="<?php echo $ic['icategory_href']; ?>"><?php echo $ic['icategory_title']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                      
                    <? } ?>
                    

                 <!--   <li ><a href="<?php echo $places; ?>"><?php echo $text_places; ?></a></li> -->
                    <li><a href="<?php echo $news; ?>"><?php echo $text_news; ?></a></li>
                    <?php if ($logged) { ?>
                      <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
                      <li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
                      <?php } else { ?>
                      <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a></li>
                      <li><a  href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
                      <?php } ?>
                </ul>
               
            </div><!--/.nav-collapse -->
        </div>
    </div>
  </header>        
</div>