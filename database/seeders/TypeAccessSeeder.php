<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_access')->insert([
            ['id' => 1, 'name' => 'type_access.public'],
            ['id' => 2, 'name' => 'type_access.only_for_friends'],
            ['id' => 3, 'name' => 'type_access.private'],
        ]);
    }
}
