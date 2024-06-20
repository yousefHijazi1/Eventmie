<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            BannersTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            SettingsTableSeeder::class,
            DataTypesTableSeeder::class,
            CategoriesTableSeeder::class,
            CurrenciesTableSeeder::class,
            DataRowsTableSeeder::class,
//            EventmieDatabaseSeeder::class,
//            EventmieDatabaseUpdateSeeder::class,
            EventsTableSeeder::class,
            MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            PagesTableSeeder::class,
            PostsTableSeeder::class,
            TaxesTableSeeder::class,
            TicketsTableSeeder::class,
            TranslationsTableSeeder::class,
        ]);
    }
}
