<?php
/*
Template Name: Домашняя страница
*/
?>
    <?php get_header(); ?>
    <div class="site-blocks-cover" style="background-image: url('<?php bloginfo('template_directory'); ?>/images/banner3-1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
            <h1>Кокомерен</h1>
              <h2 class="sub-title">ПРОДАЖА МЕДИЦИНСКОЙ ТЕХНИКИ И ЛАБОРАТОРНЫХ РЕАГЕНТОВ</h2>
              <!-- <p>
                <a href="#" class="btn btn-primary px-5 py-3">Shop Now</a>
              </p> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch section-overlap">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-primary h-100">
              <a href="#" class="h-100">
                <h5>Free <br> Shipping</h5>
                <p>
                  Amet sit amet dolor
                  <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap h-100">
              <a href="#" class="h-100">
                <h5>Season <br> Sale 50% Off</h5>
                <p>
                  Amet sit amet dolor
                  <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-warning h-100">
              <a href="#" class="h-100">
                <h5>Buy <br> A Gift Card</h5>
                <p>
                  Amet sit amet dolor
                  <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                </p>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Популярные товары</h2>
          </div>
        </div>

        <div class="row">
        <?php
$args = array(
  'post_type'      => 'product',
  'posts_per_page' => 6,
  'tax_query'      => array(
    array(
      'taxonomy' => 'product_cat',
      'field'    => 'term_id',
      'terms'    => 19, // Replace with the actual category ID
    ),
  ),
);

$products = new WP_Query($args);

if ($products->have_posts()) {
  while ($products->have_posts()) {
    $products->the_post();
    global $product;
    ?>
    <div class="col-sm-6 col-lg-4 text-center item mb-4">
      <a href="<?php the_permalink(); ?>"><img class="home__img" src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="Image"></a>
      <h3 class="text-dark"><a  class="popular__product__text" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <a href="<?php the_permalink(); ?>" class="btn btn-primary">Подробнее</a>
    </div>
    <?php
  }

  wp_reset_postdata(); // Reset the query
} else {
  // No products found
}
?>

</div>
<div class="row mt-5">
  <!-- <div class="col-12 text-center">
    <a href="shop.html" class="btn btn-primary px-4 py-3">View All Products</a>
  </div> -->
</div>
</div>
</div>
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="title-section text-center col-12">
        <h2 class="text-uppercase">Новые товары</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 block-3 products-wrap">
        <div class="nonloop-block-3 owl-carousel">
        <?php
$args = array(
  'post_type'      => 'product',
  'posts_per_page' => 6,
  'tax_query'      => array(
    array(
      'taxonomy' => 'product_cat',
      'field'    => 'term_id',
      'terms'    => 20, // ID of the WooCommerce category
    ),
  ),
);

$query = new WP_Query($args);

if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();

    global $product;

    ?>
    <div class="text-center item mb-4">
      <?php if (has_post_thumbnail()) : ?>
        <a class="product__new__image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      <?php endif; ?>
      <h3 class="text-dark"><a class="popular__product__text" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <!-- <span class="price"><?php echo $product->get_price_html(); ?></span> -->
      <a href="<?php the_permalink(); ?>" class="btn btn-primary">Подробнее</a>
    </div>
    <?php
  }

  wp_reset_postdata(); // Reset the query
} else {
  // No products found
}
?>

        </div>
      </div>
    </div>
  </div>
</div>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Отзывы клиентов</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 no-direction owl-carousel">
        
              <div class="testimony">
                <blockquote>
                  <!-- <img src="<?php bloginfo('template_directory'); ?>/images/person_1.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle"> -->
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat unde.&rdquo;</p>
                </blockquote>

                <p>&mdash; Kelly Holmes</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <!-- <img src="<?php bloginfo('template_directory'); ?>/images/person_2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle"> -->
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p>&mdash; Rebecca Morando</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <!-- <img src="<?php bloginfo('template_directory'); ?>/images/person_3.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle"> -->
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p>&mdash; Lucas Gallone</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <!-- <img src="<?php bloginfo('template_directory'); ?>/images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle"> -->
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p>&mdash; Andrew Neel</p>
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php get_footer(); ?>