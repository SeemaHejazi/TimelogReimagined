<?php

use App\Models\Center;
use Illuminate\Database\Seeder;

class CentersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $center = new Center([
            'center_name' => 'North Shore Daycare',
            'location' => '123 Evanston St, Evanston, Illinois',
            'timezone' => 'America/Chicago'
        ]);

        $center->save();

        $center = new Center([
            'center_name' => 'Horace Green Daycare',
            'location' => '123 Staten Island St, Staten Island, New York',
            'timezone' => 'America/New_York'
        ]);

        $center->save();

        $center = new Center([
            'center_name' => 'John Adams Daycare',
            'location' => '123 Philly St, Philadelphia, Pennsylvania',
            'timezone' => 'America/Toronto'
        ]);

        $center->save();
    }
}
