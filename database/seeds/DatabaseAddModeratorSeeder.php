<?php

use Illuminate\Database\Seeder;
use App\Privilege;

class DatabaseAddModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // priviledges
      Privilege::create([
        "id" => 3,
        "name" => "Moderator"
      ]);
    }
}
