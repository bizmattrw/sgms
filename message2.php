<?php if(isset($_SESSION['message2'])) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION['message2'];?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>
    <?php 
    unset($_SESSION['message2']);
    endif; 
    ?>