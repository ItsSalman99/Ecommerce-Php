<?php if (isset($_SESSION['success'])) : ?>
            <?php
            echo '<script> swal(' . '"Good Job!",'. '"'. $_SESSION['success'] . '", "success"' . ')</script>';
            unset($_SESSION['success']);
            ?>
<?php endif ?>