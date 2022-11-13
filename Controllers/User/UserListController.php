<?php

class UserListController extends AbstractController
{
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function action(array $data): false|string
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }

        ob_start();

        $usersWithPassword = $this->userRepository->findAll();

        $users =  array_map(function (array $user) {
           unset($user['password']);
           return $user;
        }, $usersWithPassword);

        $roles = UserRoleEnum::getValues();

        require_once RouteEnum::USER_LIST->value;

        return ob_get_clean();
    }
}
