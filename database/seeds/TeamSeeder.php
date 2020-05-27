<?php

use App\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    protected $prefix_data = [
        ['Sales', 0, 'we love money', '8']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_map([$this, 'store'], $this->prefix_data);
    }

    protected function store(array $team)
    {
        [$team_name, $team_manager, $team_description, $team_members] = $team;

        $team = new Team;
        $team->team_name = $team_name;
        $team->team_manager = $team_manager;
        $team->team_description = $team_description;
        $team->team_members = $team_members;
        $team->save();
    }
}
