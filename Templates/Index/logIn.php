<div class="bg-gray-50 dark:bg-gray-500 py-8 px-12 grid gap-4 w-full h-screen grid justify-center">
    <div class="relative p-4 w-[36rem] h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="bg-gray-600 flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h1 class="text-3xl font-semibold text-gray-900 dark:text-white">
                    Connexion
                </h1>
            </div>
            <form action="?page=index&action=logIn" method="POST">
                <div class="p-6 space-y-6">
                <?php require_once 'Templates/info.php'?>
                    <div class="grid grid-rows-2 gap-2">
                        <div class="rows-span-1">
                            <label for="email" class="block mb-2 text-xl font-medium text-gray-900 dark:text-gray-400">Email</label>
                            <input required name="email" type="email" id="email" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="rows-span-1">
                            <label for="password" class="block mb-2 text-xl font-medium text-gray-900 dark:text-gray-400">Password</label>
                            <input required name="password" type="password" id="password" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <div class=" p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600 grid justify-center">
                    <div class="w-full">
                        <div class="grid grid-rows-2 gap-1">
                            <div class="rows-span-1">
                                <button name="login" id="login" type="submit" value="1"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Log In
                                </button>
                            </div class="rows-span-1">
                            <div>
                                <a type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                href="?page=index&action=signUp">
                                    Inscription
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
