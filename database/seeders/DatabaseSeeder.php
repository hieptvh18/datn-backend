<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Level;
use App\Models\NewCategory;
use App\Models\Permission;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Role;
use App\Models\Room;
use App\Models\Service;
use App\Models\Specialist;
use App\Models\WebSetting;
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

        // new category
        NewCategory::factory(10)->create();

        // rooms
        Room::factory(10)->create();
        // levels
        Level::factory(6)->create();
        // specialists
        Specialist::factory(10)->create();
        //services
        Service::factory(20)->create();
        // product type && product
        ProductType::factory(10)->create();
        Product::factory(20)->create();
        // permission
        $this->createPermissionFactory();
        // role
        $this->createRoleFactory();
        // role permission
        $this->createRolePermissionFactory();
        // account admin
        $account_admin = ['email'=>'admin@gmail.com', 'fullname'=>'Admin', 'birthday'=>null, 'phone'=>'0246879135', 'address'=>'', 'facebook_url'=>'', 'twitter_url'=>'', 'email_url'=>'', 'password'=>Hash::make('12345678'), 'is_active'=>1, 'room_id'=>1, 'level_id'=>1, 'specialist_id'=>1, 'avatar'=>'assets/img/profile-photos/Profile-Icon.png'];
        Admin::create($account_admin);
        // role_admins
        DB::insert('insert into role_admins (admin_id, role_id) values (1, 3)');

        // websetting
        $this->createDataWebsetting();

    }

     // factory permission
    public function createPermissionFactory () {
        DB::table('permissions')->delete();
        $permissions = [
                ['permission_name'=>'Roles', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Roles', 'permission_key_code'=>'List_Roles', 'parent_id'=>1],
                ['permission_name'=>'Add Roles', 'permission_key_code'=>'Add_Roles', 'parent_id'=>1],
                ['permission_name'=>'Edit Roles', 'permission_key_code'=>'Edit_Roles', 'parent_id'=>1],
                ['permission_name'=>'Delete Roles', 'permission_key_code'=>'Delete_Roles', 'parent_id'=>1],
                ['permission_name'=>'Rooms', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Rooms', 'permission_key_code'=>'List_Rooms', 'parent_id'=>6],
                ['permission_name'=>'Add Rooms', 'permission_key_code'=>'Add_Rooms', 'parent_id'=>6],
                ['permission_name'=>'Edit Rooms', 'permission_key_code'=>'Edit_Rooms', 'parent_id'=>6],
                ['permission_name'=>'Delete Rooms', 'permission_key_code'=>'Delete_Rooms', 'parent_id'=>6],
                ['permission_name'=>'Permissions', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Permissions', 'permission_key_code'=>'List_Permissions', 'parent_id'=>11],
                ['permission_name'=>'Add Permissions', 'permission_key_code'=>'Add_Permissions', 'parent_id'=>11],
                ['permission_name'=>'Edit Permissions', 'permission_key_code'=>'Edit_Permissions', 'parent_id'=>11],
                ['permission_name'=>'Delete Permissions', 'permission_key_code'=>'Delete_Permissions', 'parent_id'=>11],
                ['permission_name'=>'Admins', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Admins', 'permission_key_code'=>'List_Admins', 'parent_id'=>16],
                ['permission_name'=>'Add Admins', 'permission_key_code'=>'Add_Admins', 'parent_id'=>16],
                ['permission_name'=>'Edit Admins', 'permission_key_code'=>'Edit_Admins', 'parent_id'=>16],
                ['permission_name'=>'Delete Admins', 'permission_key_code'=>'Delete_Admins', 'parent_id'=>16],
                ['permission_name'=>'Patients', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Patients', 'permission_key_code'=>'List_Patients', 'parent_id'=>21],
                ['permission_name'=>'Add Patients', 'permission_key_code'=>'Add_Patients', 'parent_id'=>21],
                ['permission_name'=>'Edit Patients', 'permission_key_code'=>'Edit_Patients', 'parent_id'=>21],
                ['permission_name'=>'Delete Patients', 'permission_key_code'=>'Delete_Patients', 'parent_id'=>21],
                ['permission_name'=>'Levels', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Levels', 'permission_key_code'=>'List_Levels', 'parent_id'=>26],
                ['permission_name'=>'Add Levels', 'permission_key_code'=>'Add_Levels', 'parent_id'=>26],
                ['permission_name'=>'Edit Levels', 'permission_key_code'=>'Edit_Levels', 'parent_id'=>26],
                ['permission_name'=>'Delete Levels', 'permission_key_code'=>'Delete_Levels', 'parent_id'=>26],
                ['permission_name'=>'Services', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Services', 'permission_key_code'=>'List_Services', 'parent_id'=>31],
                ['permission_name'=>'Add Services', 'permission_key_code'=>'Add_Services', 'parent_id'=>31],
                ['permission_name'=>'Edit Services', 'permission_key_code'=>'Edit_Services', 'parent_id'=>31],
                ['permission_name'=>'Delete Services', 'permission_key_code'=>'Delete_Services', 'parent_id'=>31],
                ['permission_name'=>'Equipments', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Equipments', 'permission_key_code'=>'List_Equipments', 'parent_id'=>36],
                ['permission_name'=>'Add Equipments', 'permission_key_code'=>'Add_Equipments', 'parent_id'=>36],
                ['permission_name'=>'Edit Equipments', 'permission_key_code'=>'Edit_Equipments', 'parent_id'=>36],
                ['permission_name'=>'Delete Equipments', 'permission_key_code'=>'Delete_Equipments', 'parent_id'=>36],
                ['permission_name'=>'Products', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Products', 'permission_key_code'=>'List_Products', 'parent_id'=>41],
                ['permission_name'=>'Add Products', 'permission_key_code'=>'Add_Products', 'parent_id'=>41],
                ['permission_name'=>'Edit Products', 'permission_key_code'=>'Edit_Products', 'parent_id'=>41],
                ['permission_name'=>'Delete Products', 'permission_key_code'=>'Delete_Products', 'parent_id'=>41],
                ['permission_name'=>'Orders', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Orders', 'permission_key_code'=>'List_Orders', 'parent_id'=>46],
                ['permission_name'=>'Add Orders', 'permission_key_code'=>'Add_Orders', 'parent_id'=>46],
                ['permission_name'=>'Edit Orders', 'permission_key_code'=>'Edit_Orders', 'parent_id'=>46],
                ['permission_name'=>'Delete Orders', 'permission_key_code'=>'Delete_Orders', 'parent_id'=>46],
                ['permission_name'=>'Schedules', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Schedules', 'permission_key_code'=>'List_Schedules', 'parent_id'=>51],
                ['permission_name'=>'Add Schedules', 'permission_key_code'=>'Add_Schedules', 'parent_id'=>51],
                ['permission_name'=>'Edit Schedules', 'permission_key_code'=>'Edit_Schedules', 'parent_id'=>51],
                ['permission_name'=>'Delete Schedules', 'permission_key_code'=>'Delete_Schedules', 'parent_id'=>51],
                ['permission_name'=>'Specialists', 'permission_key_code'=>'', 'parent_id'=>0],
                ['permission_name'=>'List Specialists', 'permission_key_code'=>'List_Specialists', 'parent_id'=>56],
                ['permission_name'=>'Add Specialists', 'permission_key_code'=>'Add_Specialists', 'parent_id'=>56],
                ['permission_name'=>'Edit Specialists', 'permission_key_code'=>'Edit_Specialists', 'parent_id'=>56],
                ['permission_name'=>'Delete Specialists', 'permission_key_code'=>'Delete_Specialists', 'parent_id'=>56],
        ];
         foreach($permissions as $permission){
            Permission::create($permission);
        }
    }

    // factory role
    public function createRoleFactory () {
        DB::table('roles')->delete();
        $roles = [
            ['role_name'=>'Guest'],
            ['role_name'=>'Manager'],
            ['role_name'=>'Admin'],
            ['role_name'=>'Doctor'],
        ];

        foreach($roles as $role){
            Role::create($role);
        }
    }

    // factory role permission
    public function createRolePermissionFactory () {
        DB::table('permission_roles')->delete();
        DB::insert('insert into permission_roles (permission_id, role_id) values (2, 1)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (2, 2)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (3, 2)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (4, 2)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (5, 2)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (2, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (3, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (4, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (5, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (7, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (8, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (9, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (10, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (12, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (13, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (14, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (15, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (17, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (18, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (19, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (20, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (22, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (23, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (24, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (25, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (27, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (28, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (29, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (30, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (32, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (33, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (34, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (35, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (37, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (38, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (39, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (40, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (42, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (43, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (44, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (45, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (47, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (48, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (49, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (50, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (52, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (53, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (54, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (55, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (57, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (58, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (59, 3)');
        DB::insert('insert into permission_roles (permission_id, role_id) values (60, 3)');
    }

    // websetting
    public function createDataWebsetting () {
        $websetting = ['logo'=> 'assets/img/logo-DN.png', 'web_name'=>'Nha khoa Đức Nghĩa', 'base_url'=>'nhakhoaducnghia.vn', 'phones'=>'0989581167', 'email'=>'nhakhoaducnghia@gmail.com', 'facebook_url'=>'https://facebook.com', 'twitter_url'=>'https://twitter.com', 'instagram_url'=>'https://instagram.com', 'youtobe_url'=>'https://youtobe.com', 'address'=>'Ngõ 155, Đường Cầu Giấy', 'open_time'=>'08h00', 'close_time'=>'18h30', 'start_date'=>'2022-10-18', 'end_date'=>'2022-10-23', 'short_introduce'=>'Triết lý của ĐỨC NGHĨA sẽ giúp bạn khỏe mạnh, hạnh phúc vì chúng tôi hiểu vai trò quan trọng trong sức khỏe răng miệng của bạn.', 'introduce'=>'Triết lý của ĐỨC NGHĨA sẽ giúp bạn khỏe mạnh, hạnh phúc vì chúng tôi hiểu vai trò quan trọng trong sức khỏe răng miệng của bạn.'];
        WebSetting::create($websetting);
    }
}
