<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

        app(Role::class)->forgetCachedPermissions();
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'AOM',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'bisnis',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
    }
}
