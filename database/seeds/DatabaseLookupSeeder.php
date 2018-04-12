<?php

use Illuminate\Database\Seeder;
use App\Privilege;
use App\Rank;
use App\User;
use App\Status;
use App\EventType;
use App\Role;

class DatabaseLookupSeeder extends Seeder
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
        "id" => 1,
        "name" => "User"
      ]);

      Privilege::create([
        "id" => 2,
        "name" => "Admin"
      ]);

      // Ranks
      Rank::create([
        "name" => "RECRUIT",
        "rank" => 1,
        "points" => 0
      ]);

      Rank::create([
        "name" => "PVT",
        "rank" => 2,
        "points" => 50
      ]);

      Rank::create([
        "name" => "PV2",
        "rank" => 3,
        "points" => 100
      ]);

      Rank::create([
        "name" => "PFC",
        "rank" => 4,
        "points" => 200
      ]);

      Rank::create([
        "name" => "SPC",
        "rank" => 5,
        "points" => 400
      ]);

      Rank::create([
        "name" => "CPL",
        "rank" => 6,
        "points" => 450
      ]);

      Rank::create([
        "name" => "SGT",
        "rank" => 7,
        "points" => 600
      ]);

      Rank::create([
        "name" => "SSG",
        "rank" => 8,
        "points" => 750
      ]);

      Rank::create([
        "name" => "1SG",
        "rank" => 9,
        "points" => 1000
      ]);

      Rank::create([
        "name" => "2LT",
        "rank" => 10,
        "points" => 600
      ]);

      Rank::create([
        "name" => "1LT",
        "rank" => 11,
        "points" => 800
      ]);

      Rank::create([
        "name" => "CPT",
        "rank" => 12,
        "points" => 1200
      ]);

      Rank::create([
        "name" => "MAJ",
        "rank" => 13,
        "points" => 1600
      ]);

      Rank::create([
        "name" => "COL",
        "rank" => 14,
        "points" => 200
      ]);

      // User
      User::create([
        "username" => "Admin",
        'password' => bcrypt("tacfam"),
        'rank' => 1,
        "base_rank" => 1,
        'privilege' => 2
      ]);

      // attendance statuses
      Status::create([
        "id" => "1",
        'name' => "Pending"
      ]);

      Status::create([
        "id" => "2",
        'name' => "Approved"
      ]);

      Status::create([
        "id" => "3",
        'name' => "Revoked"
      ]);

      // Event Types
      EventType::create([
        "id" => "1",
        'name' => "Training",
        'points' => 5
      ]);

      EventType::create([
        "id" => "2",
        'name' => "Op",
        'points' => 3
      ]);

      EventType::create([
        "id" => "3",
        'name' => "Recruiting",
        'points' => 10
      ]);

      EventType::create([
        "id" => "4",
        'name' => "Misc",
        'points' => 0
      ]);

      // Roles
      Role::create([
        "id" => "1",
        'name' => "RTO",
        'points' => 2
      ]);

      Role::create([
        "id" => "2",
        'name' => "Medic",
        'points' => 2
      ]);

      Role::create([
        "id" => "3",
        'name' => "Team Leader",
        'points' => 2
      ]);

      Role::create([
        "id" => "4",
        'name' => "Squad Leader",
        'points' => 3
      ]);

      Role::create([
        "id" => "5",
        'name' => "Rifleman",
        'points' => 0
      ]);

      Role::create([
        "id" => "6",
        'name' => "SAW Gunner",
        'points' => 0
      ]);

      Role::create([
        "id" => "7",
        'name' => "AT",
        'points' => 0
      ]);
    }
}
