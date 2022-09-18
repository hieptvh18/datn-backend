<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Level;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Room;
use App\Models\Service;
use App\Models\Specialist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // permissions
        // $permissions = [
        //     ['permission_name'=>'Roles', 'permission_key_code'=>'', 'parent_id'=>0],
        //     ['permission_name'=>'List Roles', 'permission_key_code'=>'List_Roles', 'parent_id'=>1],
        //     ['permission_name'=>'Add Roles', 'permission_key_code'=>'Add_Roles', 'parent_id'=>1],
        //     ['permission_name'=>'Edit Roles', 'permission_key_code'=>'Edit_Roles', 'parent_id'=>1],
        //     ['permission_name'=>'Delete Roles', 'permission_key_code'=>'Delete_Roles', 'parent_id'=>1],
        //     ['permission_name'=>'Rooms', 'permission_key_code'=>'', 'parent_id'=>0],
        //     ['permission_name'=>'List Rooms', 'permission_key_code'=>'List_Rooms', 'parent_id'=>6],
        //     ['permission_name'=>'Add Rooms', 'permission_key_code'=>'Add_Rooms', 'parent_id'=>6],
        //     ['permission_name'=>'Edit Rooms', 'permission_key_code'=>'Edit_Rooms', 'parent_id'=>6],
        //     ['permission_name'=>'Delete Rooms', 'permission_key_code'=>'Delete_Rooms', 'parent_id'=>6],
        //     ['permission_name'=>'Permissions', 'permission_key_code'=>'', 'parent_id'=>0],
        //     ['permission_name'=>'List Permissions', 'permission_key_code'=>'List_Permissions', 'parent_id'=>11],
        //     ['permission_name'=>'Add Permissions', 'permission_key_code'=>'Add_Permissions', 'parent_id'=>11],
        //     ['permission_name'=>'Edit Permissions', 'permission_key_code'=>'Edit_Permissions', 'parent_id'=>11],
        //     ['permission_name'=>'Delete Permissions', 'permission_key_code'=>'Delete_Permissions', 'parent_id'=>11],
        //     ['permission_name'=>'Admins', 'permission_key_code'=>'', 'parent_id'=>0],
        //     ['permission_name'=>'List Admins', 'permission_key_code'=>'List_Admins', 'parent_id'=>16],
        //     ['permission_name'=>'Add Admins', 'permission_key_code'=>'Add_Admins', 'parent_id'=>16],
        //     ['permission_name'=>'Edit Admins', 'permission_key_code'=>'Edit_Admins', 'parent_id'=>16],
        //     ['permission_name'=>'Delete Admins', 'permission_key_code'=>'Delete_Admins', 'parent_id'=>16],
        // ];

        // foreach($permissions as $permission){
        //     Permission::create($permission);
        // }

        // roles
        // $roles = [
        //     ['role_name'=>'Guest'],
        //     ['role_name'=>'Manager'],
        //     ['role_name'=>'Admin']
        // ];

        // foreach($roles as $role){
        //    Role::create($role);
        // }

        // //permission_roles
        // DB::insert('insert into permission_roles (permission_id, role_id) values (2, 1)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (2, 2)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (3, 2)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (4, 2)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (5, 2)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (2, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (3, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (4, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (5, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (7, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (8, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (9, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (10, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (12, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (13, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (14, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (15, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (17, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (18, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (19, 3)');
        // DB::insert('insert into permission_roles (permission_id, role_id) values (20, 3)');

        // rooms
        Room::factory(10)->create();
        // levels
        Level::factory(6)->create();
         // specialists
         Specialist::factory(10)->create();
         //services
        Service::factory(20)->create();

        // account admin
    //    $account_admin = ['email'=>'admin@gmail.com', 'fullname'=>'Admin', 'birthday'=>null, 'phone'=>'0246879135', 'address'=>'', 'facebook_url'=>'', 'twitter_url'=>'', 'email_url'=>'', 'password'=>Hash::make('12345678'), 'is_active'=>1, 'room_id'=>1, 'level_id'=>1, 'specialist_id'=>1];
    //    Admin::create($account_admin);


        // role_admins
        // DB::insert('insert into role_admins (admin_id, role_id) values (1, 3)');
    }
}
