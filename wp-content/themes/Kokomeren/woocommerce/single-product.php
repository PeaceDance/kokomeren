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

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
		  <div class="border text-center">
  <?php
    global $product;
    $product = wc_get_product(get_the_ID()); // Получаем объект товара
    woocommerce_show_product_images();
  ?>
</div>

          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
            <p><del><?php echo $product->get_regular_price(); ?></del>  <strong class="text-primary h4"><?php echo $product->get_price(); ?></strong></p>
            <div class="mb-5">
            </div>
            <!-- <p><a href="<?php echo $product->add_to_cart_url(); ?>" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Добавить в корзину</a></p> -->

            <div class="mt-5">
              <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">Информация о товаре</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Характеристики</a>
                </li>
            
              </ul>
              <div class="tab-content" id="pills-tabContent">
			  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <table class="table custom-table">
    <tbody>
      <tr>
        <th scope="row"><?php echo $product->get_sku(); ?></th>
        <td><?php echo $product->get_short_description(); ?></td>
        <td><?php echo $product->get_attribute('packaging'); ?></td>
      </tr>
    </tbody>
  </table>
</div>

<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <table class="table custom-table">
    <tbody>
      <tr>
        <th>Атрибут</th>
        <th>Значение атрибута</th>
      </tr>
      <?php
        $attributes = $product->get_attributes();
        foreach ($attributes as $attribute) {
          $attribute_name = $attribute->get_name();
          $attribute_value = $product->get_attribute($attribute_name);
          if (!empty($attribute_value)) {
            echo '<tr>';
            echo '<td>' . $attribute_name . '</td>';
            echo '<td class="bg-light">' . $attribute_value . '</td>';
            echo '</tr>';
          }
        }
      ?>
    </tbody>
  </table>
</div>


            
              </div>
            </div>

    
          </div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>
