<?php

enum UserErrorEnum: string
{
    case ERROR_EMPTY_INPUT = "One of this input are empty.";
    case ERROR_INPUT_TYPE_EMAIL_INCORRECT = "This Email is incorrect, he has to contain '@' and '.'";
    case ERROR_EMAIL_ALREADY_CHOSEN = "This email is already registered";
    case ERROR_WRONG_OLD_PASSWORD = "The password do not correspond to the actual one";
    case ERROR_WRONG_PASSWORD = "The password is incorrect, he must contains 8 characters including 1 letter, 1 number, 1 uppercase and 1 lowercase and 1 special character(@#-_$%^&+=§!?)";
    case ERROR_PASSWORD_DONT_MATCH = "the passwords are not equivalent";
    case ERROR_SOMETHING_WENT_WRONG = "Something wrong happened, we can't complete the registration :/";
    case ERROR_NEW_AND_OLD_PASSWORD_EQUAL = "Your new password can't be the same as the old password";
}
