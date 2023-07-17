<?php
// Отступ для админ бара
function add_admin_bar_margin() {
    if (is_admin_bar_showing() && current_user_can('manage_options')) {
        echo '<style>.top-header { margin-top: 32px !important; }</style>';
    }
}
add_action('wp_head', 'add_admin_bar_margin');

// Подключение файла WooCommerce
if ( class_exists( 'WooCommerce' ) ) {
    require_once(get_template_directory() . '/wooc.php');
    }

add_action( 'wp_enqueue_scripts', function() { 
 
    // Подключение стилей
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css' );
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/css/magnific-popup.css' );
    wp_enqueue_style( 'jquery-ui.css', get_template_directory_uri() .'/css/jquery-ui.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/css/owl.carousel.min.css' );
    wp_enqueue_style( 'theme-default', get_template_directory_uri() .'/css/owl.theme.default.min.css' );
    wp_enqueue_style( 'fonts', get_template_directory_uri() .'/fonts/icomoon/style.css' );
    wp_enqueue_style( 'aos', get_template_directory_uri() .'/css/aos.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() .'/css/style.css' );
    wp_enqueue_style( 'mystyle', get_template_directory_uri() .'/css/mystyle.css' );


// 	wp_deregister_script( 'jquery' ); 
//  	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'); 
//  	wp_enqueue_script( 'jquery' );  
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array('jquery'), 'null', true ); 
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array('jquery'), 'null', true );
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), 'null', true ); 
    wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), 'null', true ); 
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js"', array('jquery'), 'null', true ); 
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), 'null', true ); 
    wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array('jquery'), 'null', true ); 
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), 'null', true );  

    });


register_nav_menus(array(
	'top'    => 'Верхнее меню',
	// 'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
));



// Функция для вывода подкатегорий
function display_subcategories($parent_id = 0) {
    $args = array(
        'taxonomy' => 'product_cat',
        'exclude' => array(19, 20), // Исключаем категории с ID 19 и 20
        'hide_empty' => false, // Показывать пустые категории
        'parent' => $parent_id, // Получаем только дочерние категории для указанного родителя
    );

    $categories = get_terms($args);

    if ($categories) {
        echo '<ul class="subcategories">';
        foreach ($categories as $category) {
            echo '<li class="subcategories-title">' . $category->name;

            $productargs = array(
                'post_type' => 'product',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $category->term_id, // Получаем товары текущей подкатегории
                    ),
                ),
            );

            $products = new WP_Query($productargs);

            if ($products->have_posts()) {
                echo '<ul class="subcategories-product">';
                while ($products->have_posts()) {
                    $products->the_post();
                    echo '<li>' . get_the_title() . '</li>';
                }
                echo '</ul>';
            }

            display_subcategories($category->term_id); // Рекурсивный вызов для вывода подкатегорий подкатегорий

            echo '</li>';
        }
        echo '</ul>';
    }
}

// Функция для вывода главных категорий и их подкатегорий
function display_main_categories() {
    $args = array(
        'taxonomy' => 'product_cat',
        'exclude' => array(19, 20), // Исключаем категории с ID 19 и 20
        'hide_empty' => false, // Показывать пустые категории
        'parent' => 0, // Получаем только родительские категории
    );

    $categories = get_terms($args);

    echo '<ul class="dropmenu">';
    echo '<li class="dropmenu-li">Каталог';
    echo '<ul class="dropmenu-drop">';

    foreach ($categories as $category) {
        echo '<li class="dropmenu-drop-product">' . $category->name;
        display_subcategories($category->term_id); // Выводим подкатегории для каждой родительской категории
        echo '</li>';
    }

    echo '</ul>';
    echo '</li>';
    echo '</ul>';

    wp_reset_query();
}



// add_filter( 'woocommerce_get_checkout_url', 'change_checkout_url' );

// function change_checkout_url( $url ) {
//     $new_url = 'https://yandex.ru/'; // замените это на URL-адрес вашей страницы оформления заказа
//     return $new_url;
// }


add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');
?>
