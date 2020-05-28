<?php

use App\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    protected $prefix_data = [
        'CUSTOMER',
        'HOT LEAD',
        'WARM LEAD',
        'COLD LEAD'
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

    protected function store(string $name)
    {
        $label = new Label;
        $label->name = $name;
        $label->save();
    }
}
