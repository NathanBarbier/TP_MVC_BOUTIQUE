<?php

enum UserRoleEnum: string
{
    case ROLE_ADMIN = 'admin';
    case ROLE_USER = 'user';

    /**
     * @return array<string>
     */
    public static function getValues(): array
    {
        $cases = self::cases();
        return array_map(
            static fn (UserRoleEnum $case) => $case->value,
            $cases,
        );
    }
}
