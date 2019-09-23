<?php

use App\Models\Centre;
use Illuminate\Database\Seeder;

class CentresTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $centre = new Centre([
            'centre_name' => 'North Shore Daycare',
            'location' => '123 Evanston St, Evanston, Illinois',
            'timezone' => 'America/Chicago'
        ]);

        $centre->save();

        $centre = new Centre([
            'centre_name' => 'Horace Green Daycare',
            'location' => '123 Staten Island St, Staten Island, New York',
            'timezone' => 'America/New_York'
        ]);

        $centre->save();

        $centre = new Centre([
            'centre_name' => 'John Adams Daycare',
            'location' => '123 Philly St, Philadelphia, Pennsylvania',
            'timezone' => 'America/Toronto'
        ]);

        $centre->save();
    }
}
