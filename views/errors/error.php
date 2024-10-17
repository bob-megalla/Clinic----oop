<?php if(!empty($_SESSION["errors"])):?>
    <?php foreach ($_SESSION["errors"] as $err): ?>
        <div class="alert alert-danger m-1"><?= $err ?></div>
        <?php endforeach; ?>
<?php endif;?>


