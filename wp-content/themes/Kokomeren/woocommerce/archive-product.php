<?php get_header(); ?>

<div class="arhive-row">
  <div class="sidebar-category">
    <p class="sidebar-title">Категории товаров</p>
    <?php display_woocommerce_categories_with_children(); ?>
  </div>
  <div>
    <div class="arhive-cards">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
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
        <div class="no__product">
        <p class="no__product__text">Товары не найдены</h1>
        </div>
      <?php endif; ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>
