<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppCarouselTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('app_carousel')->delete();
        
        \DB::table('app_carousel')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"dsd updated","hi":"dasd","ar":"dasd"}',
                'description' => '{"en":"<p>dsda</p>","hi":"<p>dsad</p>","ar":"<p>dsd</p>"}',
                'is_active' => 1,
                'image' => '/images/app_carousels/67aded871f627.png',
                'created_at' => '2025-02-13 08:03:03',
                'updated_at' => '2025-02-13 08:03:19',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}