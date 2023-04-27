<?php

get_header('shop');

the_post();

?>
<div class="single-store-info-container">
    <?php
    $store_adress = get_post_meta(get_the_ID(), 'adress', true);
    $store_tel = get_post_meta(get_the_ID(), 'tel', true);
    $store_email = get_post_meta(get_the_ID(), 'e-mail', true);
    the_title();
    ?>
    <h5><?php echo $store_adress ?></h5>
    <h5>tel. <?php echo $store_tel ?></h5>
    <h5><a href="<?php echo $store_email ?>"> <?php echo $store_email ?></a></h5>
<?php
    the_content();
?>
</div>
<?php
get_footer();
