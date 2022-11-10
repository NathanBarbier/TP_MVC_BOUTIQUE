<?php

enum SignUpErrorEnum: string
{
    case ERROR_EMPTY_INPUT = "One of this input are empty.";
    case ERROR_INPUT_TYPE_EMAIL_INCORRECT = "This Email is incorrect, he has to contain '@' and '.'";
    case ERROR_EMAIL_ALREADY_CHOSEN = "This email is already registered";
    case ERROR_WRONG_PASSWORD = "The password is incorrect, he must contains 8 characters including 1 letter, 1 number, 1 uppercase and 1 lowercase";
    case ERROR_PASSWORD_DONT_MATCH = "the passwords are not equivalent";
    case ERROR_SOMETHING_WANT_WRONG = "Something wrong happened, we can't complete the registration :/";
}
