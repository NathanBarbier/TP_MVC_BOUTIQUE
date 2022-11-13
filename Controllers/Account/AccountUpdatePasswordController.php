<?php

class AccountUpdatePasswordController extends AbstractController
{
    protected UserRepository $userRepository;
    protected AccountValidator $accountValidator;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->accountValidator = new AccountValidator();
    }

    public function action(array $data): void
    {
        if (!empty($data["updatePasswordButton"]) && $data["updatePasswordButton"] == 1) {
            $errors = $this->accountValidator->validatePassword($data);
            if (empty($errors)) {
                try {
                    if (0 === $this->userRepository->updatePassword($data)) {
                        $_SESSION['errors'][] = "Something wrong happened, we can't complete the registration :/";
                    } else {
                        $_SESSION['success'][] = 'the update has been successful';
                        $_SESSION['password'] = password_hash($data["password"], PASSWORD_BCRYPT);
                        header("location:?page=account&action=show");
                    };
                } catch (Exception $e) {
                    $_SESSION['errors'][] = $e->getMessage();
                }
            }
        }

        header("location:?page=account&action=show");
    }
}
