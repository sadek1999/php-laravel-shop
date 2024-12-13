<?php

namespace App\Enum;

enum RolesEnum: string
{
    case User = 'user';
    case Admin = 'admin';
    case Seller = 'seller';

    public static function labels()
    {
        return [
            self::Admin->value => 'admin',
            self::User->value => 'user',
            self::Seller->value => "seller",
        ];
    }
    public function label()
    {

    return match($this){
        self::Admin=>'admin',
        self::User=>'user',
        self::Seller=>'seller'
    } ;
    }
}
