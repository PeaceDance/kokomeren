<?php
$taxonomy = 'product_cat';
$categories = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
    'parent' => 0,
));

if (!empty($categories)) {
    echo '<ul class="site-menu">';
    echo '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">';
    echo '<a href="#">Каталог</a>';
    echo '<ul class="sub-menu">';

    foreach ($categories as $category) {
        if ($category->term_id === 15 || $category->term_id === 19 || $category->term_id === 20) {
            continue; // Исключаем категорию Misc с ID 15
        }

        $sub_categories = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
            'parent' => $category->term_id,
        ));

        $has_children = !empty($sub_categories);

        echo '<li class="menu-item menu-item-type-taxonomy' . ($has_children ? ' menu-item-has-children' : '') . '">';

        if ($has_children) {
            echo '<a href="#">' . $category->name . '</a>';
        } else {
            echo '<a href="' . get_term_link($category) . '">' . $category->name . '</a>';
        }

        if (!empty($sub_categories)) {
            echo '<ul class="sub-menu">';

            foreach ($sub_categories as $sub_category) {
                if ($sub_category->term_id === 15) {
                    continue; // Исключаем подкатегории Misc с ID 15
                }

                $sub_sub_categories = get_terms(array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false,
                    'parent' => $sub_category->term_id,
                ));

                $has_sub_children = !empty($sub_sub_categories);

                echo '<li class="menu-item menu-item-type-taxonomy' . ($has_sub_children ? ' menu-item-has-children' : '') . '">';

                if ($has_sub_children) {
                    echo '<a href="#">' . $sub_category->name . '</a>';
                } else {
                    echo '<a href="' . get_term_link($sub_category) . '">' . $sub_category->name . '</a>';
                }

                if (!empty($sub_sub_categories)) {
                    echo '<ul class="sub-menu">';

                    foreach ($sub_sub_categories as $sub_sub_category) {
                        if ($sub_sub_category->term_id === 15) {
                            continue; // Исключаем под-подкатегории с ID 15
                        }

                        $sub_sub_sub_categories = get_terms(array(
                            'taxonomy' => $taxonomy,
                            'hide_empty' => false,
                            'parent' => $sub_sub_category->term_id,
                        ));

                        $has_sub_sub_children = !empty($sub_sub_sub_categories);

                        echo '<li class="menu-item menu-item-type-taxonomy' . ($has_sub_sub_children ? ' menu-item-has-children' : '') . '">';

                        if ($has_sub_sub_children) {
                            echo '<a href="#">' . $sub_sub_category->name . '</a>';
                        } else {
                            echo '<a href="' . get_term_link($sub_sub_category) . '">' . $sub_sub_category->name . '</a>';
                        }

                        if (!empty($sub_sub_sub_categories)) {
                            echo '<ul class="sub-menu">';

                            foreach ($sub_sub_sub_categories as $sub_sub_sub_category) {
                                if ($sub_sub_sub_category->term_id === 15) {
                                    continue; // Исключаем под-под-подкатегории с ID 15
                                }

                                echo '<li class="menu-item menu-item-type-taxonomy">';
                                echo '<a href="' . get_term_link($sub_sub_sub_category) . '">' . $sub_sub_sub_category->name . '</a>';
                                echo '</li>';
                            }

                            echo '</ul>';
                        }

                        echo '</li>';
                    }

                    echo '</ul>';
                }

                echo '</li>';
            }

            echo '</ul>';
        }

        echo '</li>';
    }

    echo '</ul>';
    echo '</li>';
    echo '</ul>';
}
?>
