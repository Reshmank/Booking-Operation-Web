<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [

           [ 'email'=>'admin@mail.com',
             'name'=>'Admin',
             'password'=>bcrypt('12345678'),

          ],

           [ 'email'=>'doctor@mail.com',
             'name'=>'Doctor',
             'password'=>bcrypt('12345678'),

          ],

           [ 'email'=>'patient@mail.com',
             'name'=>'Patient',
             'password'=>bcrypt('12345678'),

          ],


         ];

         foreach ($data as $key => $value) {

               $user = DB::table('users')->insert(
                ['name'=>$value['name'],'email'=>$value['email'],'password'=>$value['password'],
               ]);  

             
         }

         $users=DB::table('users')->get();
         foreach ($users as $key => $value) {

            $user = DB::table('model_has_roles')->insert(
                ['role_id'=>$value->id,'model_type'=>'App/User','model_id'=>$value->id,
               ]);  
              
         }

   
    }
}
