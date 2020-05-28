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
        [$name, $manager, $description, $members] = $team;

        $team = new Team;
        $team->name = $name;
        $team->manager = $manager;
        $team->description = $description;
        $team->members = $members;
        $team->save();
    }
}
