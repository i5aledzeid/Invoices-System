<?php
    if (isset($_SESSION['message'])) { ?>
        <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>تنبيه!</strong>
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lable="Close"></button>
        </div> -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="..." class="rounded me-2" alt="...">
                    <strong class="me-auto">تنبيه</strong>
                    <small>منذ 1 ثانية</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?php echo $_SESSION['message']; ?>
                </div>
            </div>
        </div>
    <?php unset($_SESSION['message']);
    }
?>