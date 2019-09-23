<?php

use App\Models\Centre;
use App\Models\Role;
use App\Models\User;
use App\Models\UserCentre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $superAdminRole = Role::whereName('super-admin')->first();
        $adminRole = Role::whereName('admin')->first();
        $teacherRole = Role::whereName('teacher')->first();

        $northshore = Centre::whereCentreName('North Shore Daycare')->first();
        $horacegreen = Centre::whereCentreName('Horace Green Daycare')->first();
        $johnadams = Centre::whereCentreName('John Adams Daycare')->first();

        $user = new User([
            'username' => 'SuperAdmin',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'super-admin@email.com',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'role_id' => $superAdminRole->id,
        ]);

        $user->save();

        $user = new User([
            'username' => 'rduvall',
            'first_name' => 'Ron',
            'last_name' => 'Duvall',
            'email' => 'rduvall@northshore.com',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'role_id' => $adminRole->id,
        ]);
        $user->save();

        $user_centre = new UserCentre([
            'user_id' => $user->id,
            'centre_id' => $northshore->id
        ]);
        $user_centre->save();

        $user = new User([
            'username' => 'snorbury',
            'first_name' => 'Sharon',
            'last_name' => 'Norbury',
            'email' => 'snorbury@northshore.com',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'role_id' => $teacherRole->id,
        ]);
        $user->save();

        $user_centre = new UserCentre([
            'user_id' => $user->id,
            'centre_id' => $northshore->id
        ]);
        $user_centre->save();

        $user = new User([
            'username' => 'rmullins',
            'first_name' => 'Rosalie',
            'last_name' => 'Mullins',
            'email' => 'rmullins@horacegreen.com',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'role_id' => $adminRole->id,
        ]);
        $user->save();

        $user_centre = new UserCentre([
            'user_id' => $user->id,
            'centre_id' => $horacegreen->id
        ]);
        $user_centre->save();

        $user = new User([
            'username' => 'nschneebly',
            'first_name' => 'Ned',
            'last_name' => 'Schneebly',
            'email' => 'nschneebly@horacegreen.com',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'role_id' => $teacherRole->id,
        ]);
        $user->save();

        $user_centre = new UserCentre([
            'user_id' => $user->id,
            'centre_id' => $horacegreen->id
        ]);
        $user_centre->save();

        $user = new User([
            'username' => 'gfeeny',
            'first_name' => 'George',
            'last_name' => 'Feeny',
            'email' => 'gfeeny@johnadams.com',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'role_id' => $adminRole->id,
        ]);
        $user->save();

        $user_centre = new UserCentre([
            'user_id' => $user->id,
            'centre_id' => $johnadams->id
        ]);
        $user_centre->save();

        $user = new User([
            'username' => 'jturner',
            'first_name' => 'Jonathan',
            'last_name' => 'Turner',
            'email' => 'jturner@johnadams.com',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'role_id' => $teacherRole->id,
        ]);
        $user->save();

        $user_centre = new UserCentre([
            'user_id' => $user->id,
            'centre_id' => $johnadams->id
        ]);
        $user_centre->save();
    }
}
