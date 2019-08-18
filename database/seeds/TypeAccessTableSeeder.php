<?php

use Illuminate\Database\Seeder;

class TypeAccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_access')->insert([
            ['id' => 1, 'name' => 'type_access.public'],
            ['id' => 2, 'name' => 'type_access.only_for_friends'],
            ['id' => 3, 'name' => 'type_access.private'],
        ]);
    }
}
