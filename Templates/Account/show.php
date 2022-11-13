<div class="pl-80 bg-gray-50 dark:bg-gray-500 py-8 px-12 w-full h-screen">
    <?php require_once 'Templates/info.php'?>
    <div class="w-full text-center text-3xl mt-12 mb-24">
        <h2 class="text-4xl font-bold dark:text-white text-shadow">My Account</h2>
    </div>
    <?php if (empty($user)) {
        echo '<div class="w-1/3 min-h-max p-4 mb-4 text-xl text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800">
            <span class="font-medium">Info : Something wrong happened.
        </div>';
    };?>
    <div class="container">
        <form action="?page=account&action=updateEmail&id=<?= $user['id'];?>" method="post">
            <div class="grid grid-cols-12 gap-3 mb-10">
                <div class="col-span-1">
                    <label for="email" class="pt-2 block mb-2 text-2xl font-medium text-white-900 dark:text-white-400">Email :</label>
                </div>
                <div class="col-span-9">
                    <input required value="<?= $user['email'];?>" name="email" type="email" id="email"
                           class="text-xl bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="col-span-2">
                    <button name="updateEmailButton" value="1" type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 hover:ring-2 hover:ring-green-500 font-medium rounded-lg text-lg px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                        Update Email
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <form action="?page=account&action=updatePassword&id=<?= $user['id'];?>" method="post">
            <div class="grid grid-rows-4 gap-4">
                <div class="row-span-1">
                    <label for="oldPassword" class="block mb-2 text-2xl font-medium text-white-900 dark:text-white-400">Actual Password : </label>
                    <input required type="password" name="oldPassword" id="oldPassword" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="row-span-1">
                    <label for="password" class="block mb-2 text-2xl font-medium text-white-900 dark:text-white-400">New Password : </label>
                    <input required type="password" name="password" id="password" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="row-span-1">
                    <label for="confirmedPassword" class="block mb-2 text-2xl font-medium text-white-900 dark:text-white-400">Confirmed New Password : </label>
                    <input required type="password" name="confirmedPassword" id="confirmedPassword" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="row-span-1">
                    <button name="updatePasswordButton" value="1" type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 hover:ring-2 hover:ring-green-500 font-medium rounded-lg text-lg px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                        Update Password
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>