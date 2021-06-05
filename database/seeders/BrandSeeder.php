<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'lg',
            'website' => 'https://www.lg.com/ar'
        ]);
        Brand::create([
            'name' => 'samsung',
            'website' => 'http://samsung.com'
        ]);
        Brand::create([
            'name' => 'apple',
            'website' => 'http://apple.com'
        ]);
        Brand::create([
            'name' => 'xiaomi',
            'website' => 'http://xiaomi.com.ar'
        ]);
        Brand::create([
            'name' => 'ga.ma',
            'website' => 'https://www.gamaitaly.com.ar/'
        ]);
        Brand::create([
            'name' => 'hp',
            'website' => 'http://hp.com.ar'
        ]);
        Brand::create([
            'name' => 'fiat',
            'website' => 'https://fiat.com.ar'
        ]);
        Brand::create([
            'name' => 'chevrolet',
            'website' => 'https://www.chevrolet.com.ar/'
        ]);
        Brand::create([
            'name' => 'renault',
            'website' => 'https://www.renault.com.ar/'
        ]);
        Brand::create([
            'name' => 'toshiba',
            'website' => 'https://www.toshiba.com/'
        ]);
        Brand::create([
            'name' => 'nintendo',
            'website' => 'https://www.nintendo.com/es_AR/'
        ]);
        Brand::create([
            'name' => 'playstation',
            'website' => ' https://www.playstation.com/es-ar/ '
        ]);
    }
}
