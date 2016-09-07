<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;


class RelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ahmed = User::where('email', 'ahmed@gmail.com')->first();
        $user_mohamed = User::where('email', 'mohamed@gmail.com')->first();
        $user_ali = User::where('email', 'ali@gmail.com')->first();

        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $permission_list = Permission::where('name', 'image-list')->first();
        $permission_create = Permission::where('name', 'image-create')->first();
        $permission_edit = Permission::where('name', 'image-edit')->first();
        $permission_delete = Permission::where('name', 'image-delete')->first();


        $user_ahmed->attachRole($role_admin);
        $user_mohamed->attachRole($role_user);
        $user_ali->attachRole($role_user);


        $role_user->attachPermissions(
            array($permission_list, $permission_create, $permission_edit, $permission_delete)
        );
        $role_admin->attachPermissions(
            array($permission_list, $permission_create, $permission_edit, $permission_delete)
        );

    }
}
