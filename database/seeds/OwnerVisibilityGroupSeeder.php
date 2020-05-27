<?php

use App\Label;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerVisibilityGroupSeeder extends Seeder
{
    protected $prefix_data = [
        ['Owner only', 'Only the owner,admins and users in the parent groups can see and edit the details '],
        ['Owner visibility group', 'Users in the same visibility group,admins and users in the parent groups can see and edit the details'],
        ['Owner group and sub-group', 'Users in the same visibility group,sub-groups,admins and users in the parent groups can see and edit details'],
        ['Entire company', 'All users in the company can see and edit the details']
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

    protected function store(array $owner_visibility_group)
    {
        $current = now();
        $bindings = array_merge($owner_visibility_group, [$current, $current]);
        DB::insert('INSERT INTO owner_visibility_group (owner_visibility_name, description, updated_at, created_at) VALUES (?, ?, ?, ?)', $bindings);
    }
}
