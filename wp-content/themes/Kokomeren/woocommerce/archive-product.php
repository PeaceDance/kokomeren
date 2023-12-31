<?php get_header(); ?>
<div class="bg-light py-3">
      <div class="container">
       <!-- Хлебные крошки -->
	    <div class="row">
		    <div class="col-md-12 mb-0">
			    <?php
			    if (function_exists('woocommerce_breadcrumb')) {
				    woocommerce_breadcrumb();
			    }
			    ?>
		    </div>
	    </div>
      <!-- Хлебные крошки -->
      </div>
    </div>
<div class="arhive-row">
  <div class="sidebar-category">
    <p class="sidebar-title">Категории товаров</p>
    <?php display_woocommerce_categories_with_children(); ?>
  </div>
  <div class="cards__pagination__box">
    <div class="arhive-cards">
      <?php
      $category = null;
      if (is_product_category()) {
        $category = get_queried_object();
        $category_id = $category->term_id;
      }

      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $args = array(
        'post_type' => 'product',
        'posts_per_page' => 9,
        'paged' => $paged
      );

      if ($category) {
        $args['tax_query'] = array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $category_id
          )
        );
      }

      $query = new WP_Query($args);
      ?>

      <?php if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <?php
          global $product;
          $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'full')[0];
          ?>
          <div class="product-card-box">
            <div class="product-card">
              <?php if ($product->is_on_sale()) : ?>
                <span class="tag">Sale</span>
              <?php endif; ?>
              <a class="product__link" href="<?php echo get_permalink($product->get_id()); ?>">
                <img src="<?php echo $image_url; ?>" alt="Image" class="product-image">
              </a>
              <h3 class="product-title">
                <a class="product__link" href="<?php echo get_permalink($product->get_id()); ?>">
                  <?php echo $product->get_name(); ?>
                </a>
              </h3>
              <?php do_action('woocommerce_after_shop_loop_item'); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
        <?php
        if ($category) {
          $category_name = $category->name;
          echo '<div class="no__product">';
          echo '<p class="no__product__text">Товары в категории "' . $category_name . '" не найдены</p>';
          echo '</div>';
        } else {
          echo '<div class="no__product">';
          echo '<p class="no__product__text">Товары не найдены</p>';
          echo '</div>';
        }
        ?>
      <?php endif; ?>

    </div>

    <?php
    global $wp_query;

    $big = 999999999; // Уникальное число, достаточно большое
    $pagination = paginate_links(array(
      'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total' => $query->max_num_pages,
      'prev_text' => '&lt;',
      'next_text' => '&gt;',
      'type' => 'array'
    ));

    if ($pagination) {
      echo '<ul class="pagination__ul">';
      foreach ($pagination as $page) {
        echo '<li class="pagination__li"><span>' . $page . '</span></li>';
      }
      echo '</ul>';
    }
    ?>

  </div>
</div>

<?php get_footer(); ?>
