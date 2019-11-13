<?php

use Illuminate\Database\Seeder;
use App\Classes\Constants;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Constants::ROLES as $roleId => $roleName) {
            $field = Role::find($roleId);

            if (is_null($field)) {
                $item = new Role();
                $item->id = $roleId;
                $item->name = $roleName;
                $item->save();
            }
        }
    }
}
