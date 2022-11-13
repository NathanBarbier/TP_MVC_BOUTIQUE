<?php

enum ProductErrorEnum: string
{
    case ERROR_INPUT_MISSING = "Input name is missing";
    case ERROR_CATEGORY_UNKNOWN = "This category doesn't exist";
    case ERROR_WRONG_CATEGORY = "This is the wrong category";
    case ERROR_WRONG_TYPE = "The category value is of the wrong type";
}
