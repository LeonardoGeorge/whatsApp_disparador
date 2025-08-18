<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'name' => 'Leonardo George',
                'phone' => '5519990031768',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Laura',
                'phone' => '5519992910374',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Samuel',
                'phone' => '5519995180998',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rafaell',
                'phone' => '5519993946795',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Marcelle',
                'phone' => '5491126507784',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Elielton Almeida',
                'phone' => '55199999269043',
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            
            // Adicione mais contatos...
        ];

        \App\Models\Contact::insert($contacts);
    }
}
