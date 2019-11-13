<?php

use Illuminate\Database\Seeder;
use App\Classes\Constants;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { $roles = array_flip(Constants::ROLES);
        for ($id = 1; $id <=5; $id++) {
            $field = User::find($id);

            if(is_null($field)) {
                $model = new User();
                $model->name = 'Name ' . $id;
                $model->surname = 'Surname ' . $id;
                $model->middle_name = 'Middle Name ' . $id;
                $model->nick = 'Nick ' . $id;
                $model->email = 'user' . $id . '@gmail.com';
                $model->email_verified_at = date('Y-m-d h:i:s', time());
                $model->password = bcrypt(1234567890);
                $model->is_active = true;
                $model->role_id = $id > 2 ? $roles['Client'] : $id;
                $model->save();
            }
        }
    }
}
