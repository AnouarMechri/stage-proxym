<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'passed test',

            'test',

            'add test',

            'index',

           'test index',
           'test show',
           'test edit',
           'test delete',
           'test create',

           'question index',
           'question show',
           'question edit',
           'question delete',
           'question create',

           'option index',
           'option show',
           'option edit',
           'option delete',
           'option create',
            
            'users' , 

           'user index',
           'user show',
           'user edit',
           'user delete',
           'user create',

           'settings',

           'role index',
           'role show',
           'role edit',
           'role delete',
           'role create',

           'edit profile',
           'notification',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}