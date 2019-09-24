<?php

use Illuminate\Database\Seeder;

class EntryTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory('App\Models\Entry', 10)->create();
    }
}
