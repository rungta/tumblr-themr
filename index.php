<?php

$data_file = 'default_data.json';

include_once "themr.php";

$css = array(
  // src     => media
);
$js_head = array(
  // 'js/libs/modernizr-2.7.1.js'
);
$js = array(
  // 'js/script.js',
);



?><!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title><?= _('Title') ?></title>
    
    <?= _('block:Description') ?>
      <meta name="description" content="<?= _('MetaDescription') ?>">
    <?= _('/block:Description') ?>
    
    <link rel="shortcut icon" href="<?= _('Favicon') ?>">
    <link rel="alternate" type="application/rss+xml" href="<?= _('RSS') ?>">
    
    <?php styles($css); ?>
    
    <?php scripts($js_head); ?>
  </head>
  <body>
    <div id="page">
      
      <header id="header" class="container">
        <h1>
          <?= _('Title') ?>
        </h1>
        
        <?= _('block:Description') ?>
          <p>
            <?= _('Description') ?>
          </p>
        <?= _('/block:Description') ?>
        
        <hr>
      </header><!-- #header -->
      
      
      
      <section id="content" class="container">
        <?= _('block:Posts') ?>
          
          <?= _('block:Text') ?>
            <article class="post text">
              <?= _('block:Title') ?>
                <h3>
                  <a href="<?= _('Permalink') ?>">
                    <?= _('Title') ?>
                  </a>
                </h3>
              <?= _('/block:Title') ?>
              
              <?= _('Body') ?>
            </article>
          <?= _('/block:Text') ?>
          
          
          
          <?= _('block:Photo') ?>
            <article class="post photo">
              <img src="<?= _('PhotoURL-500') ?>" alt="<?= _('PhotoAlt') ?>">
              
              <?= _('block:Caption') ?>
                <div class="caption">
                  <?= _('Caption') ?>
                </div>
              <?= _('/block:Caption') ?>
            </article>
          <?= _('/block:Photo') ?>
          
          
          
          <?= _('block:Photoset') ?>
            <article class="post photoset">
              <?= _('Photoset-500') ?>
              
              <?= _('block:Caption') ?>
                <div class="caption">
                  <?= _('Caption') ?>
                </div>
              <?= _('/block:Caption') ?>
            </article>
          <?= _('/block:Photoset') ?>
          
          
          
          <?= _('block:Quote') ?>
            <article class="post quote">
              <blockquote>
                <p>
                  <?= _('Quote') ?>
                </p>
              </blockquote>
              
              <?= _('block:Source') ?>
                <p class="source">
                  &mdash; <?= _('Source') ?>
                </p>
              <?= _('/block:Source') ?>
            </article>
          <?= _('/block:Quote') ?>
          
          
          
          <?= _('block:Link') ?>
            <article class="post link">
              <h3>
                <a href="<?= _('URL') ?>" class="link" <?= _('Target') ?>>
                  <?= _('Name') ?>
                </a>
              </h3>
              
              <?= _('block:Description') ?>
                <div class="description"><?= _('Description') ?></div>
              <?= _('/block:Description') ?>
            </article>
          <?= _('/block:Link') ?>
          
          
          
          <?= _('block:Chat') ?>
            <article class="post chat">
              <?= _('block:Title') ?>
                <h3>
                  <a href="<?= _('Permalink') ?>">
                    <?= _('Title') ?>
                  </a>
                </h3>
              <?= _('/block:Title') ?>
              
              <ul class="chat">
                <?= _('block:Lines') ?>
                  <li class="<?= _('Alt') ?> user_<?= _('UserNumber') ?>">
                    <?= _('block:Label') ?>
                      <b class="label">
                        <?= _('Label') ?>
                      </b>
                    <?= _('/block:Label') ?>
                    
                    <?= _('Line') ?>
                  </li>
                <?= _('/block:Lines') ?>
              </ul>
            </article>
          <?= _('/block:Chat') ?>
          
          
          
          <?= _('block:Video') ?>
            <article class="post video">
              <?= _('Video-500') ?>
              
              <?= _('block:Caption') ?>
                <div class="caption">
                  <?= _('Caption') ?>
                </div>
              <?= _('/block:Caption') ?>
            </article>
          <?= _('/block:Video') ?>
          
          
          
          <?= _('block:Audio') ?>
            <article class="post audio">
              <?= _('AudioPlayerBlack') ?>
              
              <?= _('block:Caption') ?>
                <div class="caption">
                  <?= _('Caption') ?>
                </div>
              <?= _('/block:Caption') ?>
            </article>
          <?= _('/block:Audio') ?>
          
        <?= _('/block:Posts') ?>
      </section><!-- #content -->
      
      
      
      <footer id="footer" class="container">
        <hr>
        
        <p>
          <?= _('block:PreviousPage') ?>
            <a href="<?= _('PreviousPage') ?>">
              &#171; Previous
            </a>
          <?= _('/block:PreviousPage') ?>
          
          <?= _('block:NextPage') ?>
            <a href="<?= _('NextPage') ?>">
              Next &#187;
            </a>
          <?= _('/block:NextPage') ?>
        </p>
        
        <a href="/archive">Archive</a>
      </footer><!-- #footer -->
      
    </div><!-- #page -->
    
    
    
    <?php if (count($js)): // Implicit jQuery inclusion if other JS files are being used ?>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <?php endif ?>
    <?php scripts($js); ?>
    
    <script>
      // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
      // g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      // s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>