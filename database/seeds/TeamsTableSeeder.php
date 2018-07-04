<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 16)->create()->each(function ($u) {
            factory(\App\Player::class, 22)->create(['team_id'=>$u->id]);
        });
    }
}
