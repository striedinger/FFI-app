<?php

use Illuminate\Database\Seeder;

use App\User;

use App\State;

use App\Role;

use App\Term;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->command->info('Roles table seeded');
        $this->call(StatesTableSeeder::class);
        $this->command->info('States table seeded');
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users table seeded');
        $this->call(TermsTableSeeder::class);
        $this->command->info('Terms table seeded');
    }
}

class RolesTableSeeder extends Seeder{
    public function run(){
        DB::table('roles')->truncate();
        Role::create(['id' => 1, 'name' => 'Administrador', 'description' => 'Administrador de la plataforma']);
        Role::create(['id' => 2, 'name' => 'Evaluador', 'description' => 'Evaluador de proyectos']);
        Role::create(['id' => 3, 'name' => 'Consultor', 'description' => 'Consultor de proyectos']);
        Role::create(['id' => 4, 'name' => 'Empresario', 'description' => 'Empresario usuario']);
    }
}

class UsersTableSeeder extends Seeder{
    public function run(){
        DB::table('users')->truncate();
        User::create(['name' => 'Administrador', 'email' => 'hugostriedinger@hotmail.com', 'password' => Hash::make('qwerty'), 'role_id' => 1, 'state_id' => 1, 'city' => 'Barranquilla', 'active' => true]);
        User::create(['name' => 'Evaluador', 'email' => 'evaluador@hotmail.com', 'password' => Hash::make('qwerty'), 'role_id' => 2, 'state_id' => 1,'city' => 'Barranquilla', 'active' => true]);
        User::create(['name' => 'Consultor', 'email' => 'consultor@hotmail.com', 'password' => Hash::make('qwerty'), 'role_id' => 3, 'state_id' => 1,'city' => 'Barranquilla', 'active' => true]);
        User::create(['name' => 'Empresario', 'email' => 'empresario@hotmail.com', 'password' => Hash::make('qwerty'), 'role_id' => 4, 'state_id' => 1,'city' => 'Barranquilla', 'active' => true]);
    }
}

class StatesTableSeeder extends Seeder{
    public function run(){
        DB::table('states')->truncate();
        State::create(['id' => 1, 'name' => 'Atlántico', 'active' => true]);
        State::create(['id' => 2, 'name' => 'Bolívar', 'active' => true]);
        State::create(['id' => 3, 'name' => 'Magdalena', 'active' => true]);
        State::create(['id' => 4, 'name' => 'Córdoba', 'active' => true]);
        State::create(['id' => 5, 'name' => 'Sucre', 'active' => true]);
        State::create(['id' => 6, 'name' => 'Cesar', 'active' => true]);
        State::create(['id' => 7, 'name' => 'La Guajira', 'active' => true]);
        State::create(['id' => 8, 'name' => 'San Andrés', 'active' => true]);
    }
}

class TermsTableSeeder extends Seeder{
    public function run(){
        DB::table('terms')->truncate();
        Term::create(['name' => '2016-10', 'active' => true]);
    }
}
