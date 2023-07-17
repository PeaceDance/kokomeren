<?php get_header(); ?>

<div class="arhive-row">
  <div class="sidebar-category">
    <p class="sidebar-title">Категории товаров</p>
    <?php display_woocommerce_categories_with_children(); ?>
  </div>
  <div>
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
        'posts_per_page' => 8,
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
    $total_pages = $query->max_num_pages;

    if ($total_pages > 1) {
      $current_page = max(1, get_query_var('paged'));

      echo '<ul class="pagination__ul">';

      if ($current_page > 1) {
        echo '<li class="pagination__li"><a href="' . get_pagenum_link($current_page - 1) . '">&lt;</a></li>';
      }

      for ($i = 1; $i <= $total_pages; $i++) {
        if ($i === $current_page) {
          echo '<li class="pagination__li"><span class="page-numbers current">' . $i . '</span></li>';
        } else {
          echo '<li class="pagination__li"><a href="' . get_pagenum_link($i) . '" class="page-numbers">' . $i . '</a></li>';
        }
      }

      if ($current_page < $total_pages) {
        echo '<li class="pagination__li"><a href="' . get_pagenum_link($current_page + 1) . '">&gt;</a></li>';
      }

      echo '</ul>';
    }
    ?>

  </div>
</div>

<?php get_footer(); ?>
