<?php

class AccountShowController extends AbstractController
{
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function action(array $data): false|string
    {
        ob_start();
        try {
            $user = $this->userRepository->findOneById($_SESSION['id']);
        } catch (Exception $e) {
            $_SESSION['errors'][] = $e->getMessage();
        }

        require_once RouteEnum::ACCOUNT_SHOW->value;

        return ob_get_clean();
    }
}
