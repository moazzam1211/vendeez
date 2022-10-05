<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Role;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'role' => 'admin'],
            ['id' => 2, 'role' => 'users'],
            ['id' => 3, 'role' => 'super Admin']
        ];
        foreach ($roles as $role) {
            Role::create([
                'id' => $role['id'],
                'role' => $role['role'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
