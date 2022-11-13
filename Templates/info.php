<?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) { ?>
    <div class="grid grid-rows-1">
        <div class="rows-span-1">
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <?php foreach($_SESSION['errors'] as $error) { ?>
                    <span class="font-medium">Error : </span> <?= $error ;?> <br>
                <?php } ?>
            </div>
        </div>
    </div>
<?php }
if (isset($_SESSION["success"]) && !empty($_SESSION["success"])) { ?>
    <div class="grid grid-rows-1">
        <div class="rows-span-1">
            <div class="p-4 mb-4 text-sm text-geen-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <?php foreach($_SESSION['success'] as $success) { ?>
                    <span class="font-medium">Success : </span> <?= $success ;?> <br>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>