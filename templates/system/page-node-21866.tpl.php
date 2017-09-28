<?php

/**
 * @file
 * Displays a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   element.
 * - $head: Markup for the HEAD element (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the
 *   current path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled in
 *   theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been
 *   disabled in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been
 *   disabled.
 * - $primary_links (array): An array containing primary navigation links for
 *   the site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links
 *   for the site, if they have been configured.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $content: The main content of the current Drupal page.
 * - $right: The HTML for the right sidebar.
 * - $node: The node object, if there is an automatically-loaded node associated
 *   with the page, and the node ID is the second argument in the page's path
 *   (e.g. node/12345 and node/12345/revisions, but not comment/reply/12345).
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic
 *   content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
  <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700|Merriweather:300,300i,400,700" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body class="<?php print $body_classes; ?>">

<?php
$printTitile=true;
if($node->type == 'pw_staff_profile'){
  $printTitile=false;
}
?>

<div id="header" class="header hidden-xs">
  <div class="container">
    
    <div id="logo-title" class="logo pull-left">
      <?php if (!empty($logo)): ?>
        <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?> Home" rel="home" id="logo">
          <img src="<?php print base_path().path_to_theme();?>/medical-logo.png" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>
    </div> <!-- /logo-title -->

    <?php if (!empty($header)): ?>
      <div id="header-region" class="pull-right">
        <?php print $header; ?>
      </div>
    <?php endif; ?>

  </div>
</div><!-- /header -->

<div id="top-nav" class="top-nav hidden-xs">
  <div class="container">
    
    <div id="navigation" class="menu <?php if (!empty($primary_links)) { print "withprimary"; } ?> ">
      <?php if (!empty($primary_links)): ?>
        <div id="primary" class="clear-block pull-left">
          <?php print theme('links', $primary_links, array('class' => 'links primary-links')); ?>
        </div>
        
        <div class="search-icon pull-right"><a data-toggle="modal" href="#modalsearch"><i class="fa fa-search"></i><span class="hidden-text">search</span></a>
        </div>
        
        <div class="top-login pull-right">				  
          <?php if ($logged_in) { ?>
            <?php if ($is_admin) ?>
              <a href="/user" class="signup"><span class="hidden-text">Profile</span>Profile</a>
              <a href="/logout" class="login">Log out</a>
            <?php } else { ?>
            <a href="/user/login" class="login">Login</a>
            <a class="regtr header-btn butn" href="/user/register">Register</a>
          <?php } ?>
        </div>

      <?php endif; ?>
    </div> <!-- /navigation -->
    
  </div>
</div><!-- top-nav -->

<div id="mobile-header" class="visible-xs clearfix clear-all">
  <nav id="primary-links" class="navbar navbar-default mobile-menu" role="navigation">
    <div class="container">
      <div class="row">
        <div class="navbar-header"<?php print $mobile_nav_bg; ?>>
        
        <div class="pull-left mobile-logo">
          <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?> home" class="mobile-header-bottom">
            <?php if ($mobile_logo == TRUE) { ?>
              <img src="<?php print base_path().path_to_theme();?>/medical-mobile-logo.png" alt="Foxley Kingham">
            <?php } else { ?>
              <img src="<?php print base_path().path_to_theme();?>/medical-mobile-logo.png" alt="Foxley Kingham">
            <?php }; ?>          
          </a>
        </div>
          
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <ul class="mobile-header-top list-style pull-right">
          <li><a href="tel:<?php print $company_phone; ?>"><i class="fa fa-phone"></i><span class="hidden-text">Tel</span></a></li>
          <li><a href="mailto:<?php print $site_mail; ?>"><i class="fa fa-envelope"></i></i><span class="hidden-text">Mail</span></a></li>
        </ul>
          
        </div>
        
        <div class="collapse navbar-collapse navbar-ex1-collapse ul-no-style list-style list-ul top-nav">
          <div class="visible-xs navbar-utilities bottom-space">
            <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modalsearch"><span class="fa fa-search"></span><span class="sr-only">Search</span></a>
            <?php if ($logged_in) { ?>
              <?php if ($is_admin) ?><a type="button" class="btn btn-default" href="/admin">Admin</a>
            <a type="button" class="btn btn-default" href="/user">Profile</span></a>
            <a type="button" class="btn btn-default" href="/logout">Logout</span></a>
            <?php } else { ?>
            <a type="button" class="btn btn-default" href="/user/login">Login</a>
            <a type="button" class="btn btn-default" href="/user/register">Register</a>
            <?php } ?>
          </div>
    
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
              <div class="addthis_inline_follow_toolbox social-media"></div>
    
          <?php print theme('links', $primary_links, array('class' => 'primary-links list-style'), 'primary-links'); ?>
          
        </div>
      </div>
    </div>
  </nav>
  <?php print $mobile_contact_utilities; ?>
</div><!-- Mobile Header End -->


<div class="inner-banner position-re">
  <?php if($inner_banner) {
    if($printTitile){
      print $inner_banner;
        print '<div class="inner-banner-cnt position-ab"><div class="container"><div class="row"><div class="col-xs-6 col-sm-4 bg-width"><div class="banner-content">';
      $menuparent = menu_get_active_trail();
        if ($menuparent[1]) {
          if($printTitile != null || $printTitile){
           print '<h1 class="position-re">' . $menuparent[1]['link_title'] . '</h1>'; 
          }
        
      }
    print '</div></div></div></div></div>';
    }
  } ?>
</div>

  <div id="page" class="container">
    
    <?php
     if($inner_banner){
      
      }else{
      ?>
      <?php
      if($printTitile){
       ?>
        <?php if (!empty($menuparent)): ?><h1 id="page-title"><?php print $menuparent; ?></h1><?php endif; ?>
       <?php
      }
      
      ?>
      <?php
      }
     ?>
    
    <div id="container" class="clear-block inner-page">
      <?php if (!empty($breadcrumb)): ?><div id="breadcrumb"><?php print $breadcrumb; ?></div><?php endif; ?>
      <div id="main" class="column"><div id="main-squeeze">
        
        <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>

        <div id="content">
         
          <?php if (!empty($title)):
          if($printTitile){?>
          
          <h1 class="title" id="page-title"><?php print $title; ?></h1>
          
          <?php
          }
          endif; ?>
          <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
          <?php if (!empty($messages)): print $messages; endif; ?>
          <?php if (!empty($help)): print $help; endif; ?>
          <div id="content-content" class="clear-block">
            <?php print $content; ?>
          </div> <!-- /content-content -->
          <?php print $feed_icons; ?>
        </div> <!-- /content -->
      
      <div class="contact-section">
        <div class="row">
          <?php
            if($contact_section)
            print "$contact_section";
          ?>
        </div>
      </div>
      
      <div class="content-bottom">
        <div class="row">
          <?php
            if($content_bottom)
            print "$content_bottom";
          ?>
        </div>
      </div>

      </div></div> <!-- /main-squeeze /main -->

      <?php if (!empty($left)): ?>
        <div id="sidebar-left" class="column sidebar">
          <?php print $left; ?>
          
          <?php if ($node->field_testimonial[0][nid] != NULL): ?>
            <?php if ($node->field_testimonial[0][nid]): ?>
              <div class="sidebar-testimonials">
              <?php print views_embed_view('left_sidebar_testimonials','block_1',$node->field_testimonial[0][nid]); ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>
          
        </div> <!-- /sidebar-left -->
      <?php endif; ?>

      <?php if (!empty($right)): ?>
        <div id="sidebar-right" class="column sidebar">
          <?php print $right; ?>
        </div> <!-- /sidebar-right -->
      <?php endif; ?>

    </div> <!-- /container -->

    <?php print $closure; ?>

  </div> <!-- /page -->
  
<div id="footer-wrapper" class="footer">
  <div class="container">
    <div class="row">
      <div id="footer">
          
        <?php if (!empty($footer)): print $footer; endif; ?>
          
        <?php if($footer_bottom){
          print '<div class="footer-bottom col-xs-12">';
            print $footer_bottom;
          print '</div>';
        } ?>
          
      </div> <!-- /footer -->
    </div>
  </div>
</div> <!-- /footer-wrapper -->
  
<!-- Modal Search -->
<div class="modal fade" id="modalsearch" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title">Search</h2>
      </div>
      <div class="modal-body">
        <?php print $search_box; ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57d29415142a01cf"></script>

</body>
</html>
