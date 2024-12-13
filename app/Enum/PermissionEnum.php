<?php

namespace App\Enum;

enum PermissionEnum: string
{
    case ProductsManagement = 'productsManagement';

    case UserManagement = 'userManagement';
    case ShoppingManagement = 'shoppingManagement';
    case OrderManagement = "orderManageManagement";
    case PaymentManagement='paymentManagement';
}
