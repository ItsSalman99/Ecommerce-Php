<?php if (isset($_SESSION['error'])) : ?>
            <?php
            echo '<script> swal(' . '"Oops!",'. '"'. $_SESSION['error'] . '", "error"' . ')</script>';
            unset($_SESSION['error']);
            ?>
<?php endif ?>