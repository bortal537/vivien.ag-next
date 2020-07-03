<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert([
		    [
		        'created_at' => '2020-05-15 03:20:47',
		        'deleted_at' => null,
		        'id' => 1,
		        'published' => 1,
		        'slug' => 'main',
		        'updated_at' => '2020-05-15 03:20:47',
		        'uuid' => 'b69492ea-e36f-41a2-bc87-77b817d34854',
		    ],
		    [
		        'created_at' => '2020-05-20 21:32:02',
		        'deleted_at' => null,
		        'id' => 2,
		        'published' => 1,
		        'slug' => 'footer',
		        'updated_at' => '2020-05-20 21:32:02',
		        'uuid' => '2b7c2d73-2e32-49ea-8081-18a7a04c0ef8',
		    ],
		]);
        
    }
}
