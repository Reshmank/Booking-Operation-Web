<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $data = [];
        $data[] = ['name'=>'admin', 'guard_name'=>'web'];
        $data[] = ['name'=>'doctor', 'guard_name'=>'web'];
        $data[] = ['name'=>'patient', 'guard_name'=>'web'];
        DB::table('roles')->insert($data);
        
        
    }
}
