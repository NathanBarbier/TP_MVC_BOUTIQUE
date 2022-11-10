<?php

enum LogInErrorEnum: string
{
    case ERROR_EMPTY_INPUT = "One of this input are empty.";
    case ERROR_INPUT_TYPE_EMAIL_INCORRECT = "This Email is incorrect, he has to contain '@' and '.'";
    case ERROR_FORM_INCORRECT = "The email address and the password are incorrect.";
}
