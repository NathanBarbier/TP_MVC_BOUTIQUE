<div class="pl-80 bg-gray-50 dark:bg-gray-500 py-8 px-12 w-full h-screen">
    <div class="w-full text-center text-3xl">
        <h2 class="text-4xl font-bold dark:text-white text-shadow my-10">Categories</h2>
    </div>

<?php if (!empty($categories)) { ?>
    <div class="overflow-x-auto rounded-lg">
        <table class="w-full text-xl text-left text-gray-300 dark:text-gray-200">
            <thead class="text-xl text-gray-300 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
                <tr>
                <?php foreach ($categories[0] as $key => $value) { ?>
                    <th scope="col" class="py-3 px-6">
                        <?= $key;?>
                    </th>
                <?php } ?>
                <th scope="col" class="py-3 text-center">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category) {  ?>
                <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-500">
                <?php foreach ($category as $key => $value) {  ?>
                    <td scope="row" class="py-4 px-6 font-large text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $value ;?>
                    </td>
                <?php } ?>

                    <td class="py-4 px-6 ">
                        <div>
                            <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 hover:ring-2 hover:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    >
                                Go to
                            </button>
                            <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 hover:ring-2 hover:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    data-modal-toggle="updateCategorie">
                                Modifier
                            </button>
                            <button type="button"
                                    data-modal-toggle="popup-modal"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 hover:ring-2 hover:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php } else { ?>
    <div class="w-1/3 min-h-max p-4 mb-4 text-xl text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800">
        <span class="font-medium">Info : </span> u don't have categories yet.
    </div>
<?php } ?>
</div>
