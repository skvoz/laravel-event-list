<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RBACSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Models\Role();

        $admin = $role->create(
            [
                'name' => 'Administrator',
                'slug' => 'administrator',
                'description' => 'have all rights',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        $user = $role->create(
            [
                'name' => 'User',
                'slug' => 'user',
                'description' => 'access to own resources',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
    }
}
