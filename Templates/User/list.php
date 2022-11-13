<?php
require_once "Modal/_form.php";
require_once "Modal/_formUpdate.php";
?>
<div class="pl-80 bg-gray-50 dark:bg-gray-500 py-8 px-12 w-full h-screen">
    <?php require_once 'Templates/info.php'?>
    <div class="w-full text-center text-3xl">
        <h2 class="text-4xl font-bold dark:text-white text-shadow my-10">Users</h2>
    </div>

    <?php if (!empty($users)) { ?>
        <div class="overflow-x-auto rounded-lg">
            <table class="w-full text-xl text-left text-gray-300 dark:text-gray-200">
                <thead class="text-xl text-gray-300 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
                <tr>
                    <?php foreach ($users[0] as $key => $value) { ?>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex justify-center">
                                <?= $key;?>
                            </div>
                        </th>
                    <?php } ?>
                    <th scope="col" class="py-3 text-center">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) {  ?>
                    <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-500">
                        <?php foreach ($user as $key => $value) {  ?>
                            <td id="<?=$key;?>-<?=$user['id'];?>" class="py-4 px-6 font-large text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex justify-center">
                                    <?= $value ;?>
                                </div>
                            </td>
                        <?php }

                        if ($user['id'] !== $_SESSION['id']) {?>
                        <td class="py-4 px-6 ">
                            <div class="flex justify-center">
                                <button type="button" onclick="updateUser(<?=$user['id'];?>)"
                                        class="text-white bg-blue-700 hover:bg-blue-800 hover:ring-2 hover:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                        data-modal-toggle="_formUpdate">
                                    Update
                                </button>
                                <a type="button" href="?page=user&action=delete&id=<?=$user['id'];?>"
                                   class="focus:outline-none text-white bg-red-700 hover:bg-red-800 hover:ring-2 hover:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    Delete
                                </a>
                            </div>
                        </td>
                        <?php } else { ?>
                        <td class="py-4 px-6 ">
                            <div class="flex justify-center">
                                <a type="button" href="?page=account&action=show"
                                   class="text-white bg-yellow-700 hover:bg-yellow-800 hover:ring-2 hover:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                                    See
                                </a>
                            </div>
                        </td>
                        <?php }?>
                    </tr>
                <?php } ?>
                <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-500 sticky bottom-0 pb-1">
                    <th colspan="10" scope="row"
                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <button type="button"
                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 hover:ring-2 hover:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900"
                                data-modal-toggle="_form">
                            + Add
                        </button>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>

    <?php } else { ?>
        <div class="w-1/3 min-h-max p-4 mb-4 text-xl text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800">
            <span class="font-medium">Info : </span> You don't have users yet.
        </div>
        <button type="button" onclick="create('<?= $_GET['page'];?>' )"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 hover:ring-2 hover:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900"
                data-modal-toggle="_formx">
            + Add
        </button>
    <?php } ?>
</div>
