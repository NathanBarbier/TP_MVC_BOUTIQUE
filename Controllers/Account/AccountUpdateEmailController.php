<?php

class AccountUpdateEmailController extends AbstractController
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
        if (!empty($data["updateEmailButton"]) && $data["updateEmailButton"] == 1) {
            $errors = $this->accountValidator->validateEmail($data);
            if (empty($errors)) {
                try {
                    if (0 === $this->userRepository->updateEmail($data)) {
                        $_SESSION['errors'][] = "Something wrong happened, we can't complete the registration :/";
                    } else {
                        $_SESSION['success'][] = 'the update has been successful';
                        $_SESSION['email'] = $data['email'];
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
