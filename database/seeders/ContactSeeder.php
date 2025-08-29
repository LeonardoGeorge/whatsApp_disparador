<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Desativa a verificação de chaves estrangeiras
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Limpa a tabela de forma segura
        Contact::truncate();

        // Reativa a verificação
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $contacts = [
                [
                    'name' => 'XXXX',
                    'phone' => '5519990031768', 
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'XXXX',
                    'phone' => '5519999269043', 
                    'created_at' => now(),
                    'updated_at' => now()
                ]
                    
            
        
            


            // Adicione mais contatos conforme necessário...
        ];

        // Insere os contatos
        Contact::insert($contacts);
    }
}
