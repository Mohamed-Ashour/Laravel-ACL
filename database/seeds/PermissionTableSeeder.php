<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	[
        		'name' => 'image-list',
        		'display_name' => 'Display Image Listing',
        		'description' => 'See only Listing Of Image'
        	],
        	[
        		'name' => 'image-create',
        		'display_name' => 'Create Image',
        		'description' => 'Create New Image'
        	],
        	[
        		'name' => 'image-edit',
        		'display_name' => 'Edit Image',
        		'description' => 'Edit Image'
        	],
        	[
        		'name' => 'image-delete',
        		'display_name' => 'Delete Image',
        		'description' => 'Delete Image'
        	]
        ];

        foreach ($permissions as $key => $value) {
        	Permission::create($value);
        }
    }
}
