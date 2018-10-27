<?php

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
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        app(Permission::class)->forgetCachedPermissions();
        $permissions = [
            'user-list',
            'user-edit',
            'user-create',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'lihat-statistik',
            'lihat-bisnis',
            'lihat-admin',
            'kelola-aom',
            'import-data',
            'export-data',
            'lihat-nasabah-unit',
            'lihat-pendapatan-unit',
            'lihat-noa-unit'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
