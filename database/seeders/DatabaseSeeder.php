<?php

namespace Database\Seeders;

use App\Enum\PermissionEnum;
use App\Enum\RolesEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $userRole = Role::create(['name' => RolesEnum::User->value]);
        $adminRole = Role::create(['name' => RolesEnum::Admin->value]);
        $sellerRole = Role::create(['name' => RolesEnum::Seller->value]);

        $userManagementPermissions = Permission::create(['name' => PermissionEnum::UserManagement->value]);
        $orderManagementPermissions = Permission::create(['name' => PermissionEnum::OrderManagement->value]);
        $productManagementPermissions = Permission::create(['name' => PermissionEnum::ProductsManagement->value]);
        
        $paymentsManagementPermissions = Permission::create(['name' => PermissionEnum::PaymentManagement->value]);
        $shoppingManagementPermissions = Permission::create(['name' => PermissionEnum::ShoppingManagement->value]);

        $userRole->syncPermissions([$shoppingManagementPermissions]);
        $sellerRole->syncPermissions([$shoppingManagementPermissions,$productManagementPermissions,$orderManagementPermissions,$paymentsManagementPermissions]);
        $adminRole->syncPermissions([$shoppingManagementPermissions,$productManagementPermissions,$orderManagementPermissions,$paymentsManagementPermissions ,$userManagementPermissions]);


        User::factory()->create([
            'name' => ' User',
            'email' => 'user@example.com',
        ])->assignRole($userRole);
        User::factory()->create([
            'name' => ' Seller',
            'email' => 'seller@example.com',
        ])->assignRole($sellerRole);
        User::factory()->create([
            'name' => ' Admin',
            'email' => 'admin@example.com',
        ])->assignRole($adminRole);


    }
}
