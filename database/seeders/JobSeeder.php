<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create(['id' => 1, 'date' => '2020-02-16', 'user_id' => 1]);
        Job::create(['id' => 2, 'date' => '2020-03-14', 'user_id' => 2]);
        Job::create(['id' => 3, 'date' => '2020-03-22', 'user_id' => 3]);
        Job::create(['id' => 4, 'date' => '2020-05-01', 'user_id' => 1]);
        Job::create(['id' => 4, 'date' => '2020-11-11', 'user_id' => 2]);
    }
}
