<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate(['name'=> 'admin']);
        $scpermission = Permission::firstOrCreate(
            [
                'name'=>'schedule-import',
            ],
            [
                'display_name'=>'Import users schedule file'
            ]
        );

        $scindexpermission = Permission::firstOrCreate(
            [
                'name'=>'schedule-index',
            ],
            [
                'display_name'=>'List all schedules'
            ]
        );
        // dd($permission->toArray());
        $admin->syncPermissions([$scpermission, $scindexpermission]);
        
        $user = User::where('email', 'mohamed.foly@eventpoc.test')->first();
        $user->syncRoles([$admin]);
    }
}
