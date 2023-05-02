<?php

get_header('shop');

$butiker = new WP_Query(array(
    'post_per_page' => 5,
    'post_type' => 'butik',
));
    ?>
    <ul class="store-list">
        <?php
while ($butiker->have_posts()) {

        ?>
        <li class="store-item">
            <?php
            $butiker->the_post();
            ?>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

            <?php
            the_content();

            ?>
        </li>
    <?php
}

    ?>
    </ul>
    <?php
    get_footer();
