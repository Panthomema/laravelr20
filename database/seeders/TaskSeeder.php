<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create(['id' => 1, 'name' => 'Recepción']);
        Task::create(['id' => 2, 'name' => 'Atención de barra']);
        Task::create(['id' => 3, 'name' => 'Atención de salón']);
        Task::create(['id' => 4, 'name' => 'Cocina']);
        Task::create(['id' => 5, 'name' => 'Limpieza']);
        Task::create(['id' => 6, 'name' => 'Atención de terraza']);
        Task::create(['id' => 7, 'name' => 'Coctelería']);
    }
}
