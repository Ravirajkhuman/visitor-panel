<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use DB;
use App\Models\Visitors;
use Faker\Factory as Faker;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visitors')->truncate();

        $faker = Faker::create();

        foreach (range(1,500) as $index) {
            DB::table('visitors')->insert([
                'first_name' => $faker->firstname,
                'last_name' => $faker->lastname,
                'email' => $faker->email,
                'dob' => date('Y-m-d', strtotime( '+'.mt_rand(0,30).' days')),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ]);
        }
    }
}
