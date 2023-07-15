<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Kokomeren</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body>
  <div class="site-wrap">
    <div class="site-navbar py-2">
      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input type="hidden" name="post_type" value="product" />
      <input type="text" class="form-control" placeholder="Введите поисковый запрос и нажмите Enter" name="s" value="<?php echo get_search_query(); ?>">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
        <div class="logo">
  <div class="site-logo">
    <?php
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
    
    if (has_custom_logo()) {
      echo '<a href="' . esc_url(home_url('/')) . '" class="js-logo-clone">';
      echo '<img class="logo__image" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
      echo '</a>';
    } else {
      echo '<a href="' . esc_url(home_url('/')) . '" class="js-logo-clone">' . get_bloginfo('name') . '</a>';
    }
    ?>
  </div>
</div>
          <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="nav-flex">
        <?php get_template_part('catalog-menu'); ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'top',
                'menu_class'     => 'site-menu js-clone-nav d-none d-lg-block',
                'menu_item_class' => 'active has-children dropdown', // Добавляем классы к <li>
                'container'      => false,
            ) );
            ?>
          </div>
        </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>