<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11.10.2019
 * Time: 4:21
 */
require APPROOT . '/views/layouts/header.php';
?>
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container"></div>
    <h1 class="display-3"><?php echo $data['title'];?></h1>
    <p class="lead"><?php echo $data['description'];?></p>
    <p>Version: <strong><?php echo $data['version'];?></strong></p>
</div>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>

