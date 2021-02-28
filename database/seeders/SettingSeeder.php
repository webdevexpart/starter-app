<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // General Settings
        Setting::updateOrCreate(['name'=>'site_title', 'value'=>'LaraStarter']);
        Setting::updateOrCreate(['name'=>'site_description', 'value'=>'A laravel starter kit for web artisans']);
        Setting::updateOrCreate(['name'=>'site_address', 'value'=>'Santhia, Pabna, Bangladesh']);
    }
}
