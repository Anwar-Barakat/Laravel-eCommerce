<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles  = ['general_manager', 'product_manager', 'order_manager'];
        $admin1 = Admin::where('email', 'brkatanwar0@gmail.com')->first();
        $admin2 = Admin::where('email', 'admin@admin.com')->first();

        foreach ($roles as $role) {
            if (is_null(Role::where('name', $role)->first())) {
                Role::create([
                    'name'          => $role,
                    'guard_name'    => 'admin'
                ]);
            }
        }

        $admin1->assignRole($roles);
        $admin2->assignRole('product_manager');
    }
}
