
<?php
// Подключение файла стилей Woocommerce
add_action( 'wp_enqueue_scripts', 'my_custom_styles' );
function my_custom_styles() {
    if ( class_exists( 'woocommerce' ) ) {
        wp_enqueue_style( 'my-woocommerce-styles', get_stylesheet_directory_uri() . '/woocommerce/my-styles.css' );
    }
}

function custom_wc_product_image_sizes() {
    // Главное изображение товара на странице категории
    add_image_size( 'woocommerce_thumbnail', 300, 300, true );
    
    // Изображение товара на странице товара
    add_image_size( 'woocommerce_single', 600, 600, true );
    
    // Дополнительные изображения товара в галерее
    add_image_size( 'woocommerce_gallery_thumbnail', 100, 100, true );
}

add_action( 'after_setup_theme', 'custom_wc_product_image_sizes' );


// Количество товаров на странице магазина
function custom_shop_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && is_shop()) {
        $query->set('posts_per_page', 9);
    }
}
add_action('pre_get_posts', 'custom_shop_posts_per_page');


function display_woocommerce_categories() {
    $args = array(
        'taxonomy'   => 'product_cat',
        'exclude'    => array(
            get_term_by('slug', 'misc', 'product_cat')->term_id,
            19,
            20
        ),
        'hide_empty' => false,
    );

    $categories = get_terms($args);

    if ($categories && !is_wp_error($categories)) {
        echo '<ul class="category-list">';
        foreach ($categories as $category) {
            echo '<li class="category-item"><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo 'Нет доступных категорий.';
    }
}

function display_woocommerce_categories_with_children($parent_category = 0) {
    $exclude_categories = array(15, 19, 20);

    $taxonomy     = 'product_cat';
    $orderby      = 'name';
    $show_count   = 0;      // Показывать количество товаров в категории
    $pad_counts   = 0;      // Заполнить нулями количество товаров в категории
    $hierarchical = 1;      // Показать категории в иерархическом порядке
    $title        = '';

    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => 0,
        'exclude'      => $exclude_categories, // Исключаем указанные категории
        'parent'       => $parent_category,
        'menu_order'   => 'ASC' // Сортировка по порядку, установленному в административной панели WooCommerce
    );

    $categories = get_categories($args);

    if ($categories) {
        echo '<ul class="product-categories">';

        foreach ($categories as $category) {
            $args['parent'] = $category->term_id;
            $child_categories = get_categories($args);
            $has_children = $child_categories ? true : false;

            echo '<li class="cat-item cat-item-' . $category->term_id . ($has_children ? ' has-children' : '') . '">';

            if ($has_children) {
                echo '<a class="category-toggle" href="javascript:void(0)">' . $category->name . '</a>';
                echo '<ul class="children" style="display: none;">';
                display_woocommerce_categories_with_children($category->term_id);
                echo '</ul>';
            } else {
                echo '<a href="' . get_term_link($category) . '">' . $category->name . '</a>';
            }

            echo '</li>';
        }

        echo '</ul>';
    }
}

// Установка нового размера изображения для карточек товаров
add_image_size('woocommerce_thumbnail', 300, 300, true);

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
add_theme_support( 'woocommerce' );
// add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}
?>