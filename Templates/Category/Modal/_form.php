<!-- Main modal -->
<div id="_form" tabindex="-1" aria-hidden="true"
     <?= !empty($_SESSION['errors']) ? 'data-modal-show="true"' : '';?>
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="bg-gray-600 flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h1 id="categoryTitle" class="text-xl font-semibold text-gray-900 dark:text-white"></h1>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="_form">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) { ?>
            <div class="grid grid-rows-1 m-5 mb-0">
                <div class="rows-span-1">
                    <div class="p-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <?php foreach($_SESSION['errors'] as $error) { ?>
                            <span class="font-medium">Error : </span> <?= $error ;?> <br>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <form action="" method="post">
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 gap-2">
                        <div class="col-span-1">
                            <label for="nameInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Name of the category</label>
                            <input required type="text" name="name" id="nameInput" class="categoryInput text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <div class="w-1/4">
                        <button type="submit" id="categoryButton" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Confirmed
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>