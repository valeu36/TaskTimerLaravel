<?php


namespace App\Classes;


class Constants
{
    const USER_IS_ACTIVE = '1';
    const USER_IS_NOT_ACTIVE = '0';

    const ROLES = [
        1 => 'SuperAdmin',
        2 => 'Admin',
        3 => 'Client',
    ];

    const ROLES_VALUE_KEY = [
        'SuperAdmin' => 1,
        'Admin' => 2,
        'Client' => 3
    ];
}
