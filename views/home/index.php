<div class="text-center">
    <h1><?php echo HOME_TITLE; ?> </h1>
    <p class="lead"><?php echo HOME_TAGLINE; ?> </p>

    <?php if(isset($_SESSION['is_logged_in']) && !empty($_SESSION['is_logged_in'])) : ?>
        <a href="<?php echo ROOT_PATH; ?>articles" class="btn btn-primary text-center"><?php echo HOME_CTA; ?></a>
    <?php else : ?>
        <a href="<?php echo ROOT_PATH; ?>users/login" class="btn btn-primary text-center">Login to write and read articles</a>
    <?php endif;?>
</div>

<?php
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';?>