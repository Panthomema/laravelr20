<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create(['id' => 1, 'fiesta_id' => '1', 'user_id' => '2']);
        Ticket::create(['id' => 2, 'fiesta_id' => '1', 'user_id' => '1']);
    }
}
