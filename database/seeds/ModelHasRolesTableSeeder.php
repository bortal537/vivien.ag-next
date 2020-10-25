<?php

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('model_has_roles')->delete();
        
        \DB::table('model_has_roles')->insert([
		    [
		        'role_id' => 1,
		        'model_type' => 'App\\Models\\User',
		        'model_id' => 1,
		    ],
		    [
		        'role_id' => 2,
		        'model_type' => 'App\\Models\\User',
		        'model_id' => 2,
		    ],
		    [
		        'role_id' => 3,
		        'model_type' => 'App\\Models\\User',
		        'model_id' => 3,
		    ],
		]);
        
    }
}
