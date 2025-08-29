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
                    'name' => 'Ana Carolina Silva',
                    'phone' => '5581987654321', // Celular Recife (PE)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Carlos Eduardo Santos',
                    'phone' => '558692345678', // Fixo Teresina (PI)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Mariana Oliveira',
                    'phone' => '5586998765432', // Celular Teresina (PI)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'João Pedro Almeida',
                    'phone' => '558321654321', // Fixo João Pessoa (PB)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Paula Rodrigues Costa',
                    'phone' => '5587991234567', // Celular Petrolina (PE)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Ricardo Nunes Lima',
                    'phone' => '558622334455', // Fixo Maceió (AL)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Fernanda Souza Pereira',
                    'phone' => '5584987654321', // Celular Natal (RN)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Bruno Carvalho Dias',
                    'phone' => '558533112233', // Fixo Fortaleza (CE)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Tatiane Martins Rocha',
                    'phone' => '5587987654321', // Celular Juazeiro do Norte (CE)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Lucas Henrique Ferreira',
                    'phone' => '558732445566', // Fixo Aracaju (SE)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Amanda Costa Santos',
                    'phone' => '5582998765432', // Celular Maceió (AL)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Rafael Andrade Oliveira',
                    'phone' => '558321987654', // Fixo João Pessoa (PB)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Vanessa Lima Rodrigues',
                    'phone' => '5586991234567', // Celular Teresina (PI)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Diego Alves Pereira',
                    'phone' => '558733556677', // Fixo Maceió (AL)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Roberta Santos Nunes',
                    'phone' => '5581981234567', // Celular Recife (PE)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Felipe Costa Dias',
                    'phone' => '558422667788', // Fixo Natal (RN)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Larissa Oliveira Martins',
                    'phone' => '5587981234567', // Celular Juazeiro do Norte (CE)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Eduardo Silva Rocha',
                    'phone' => '558832998877', // Fixo Aracaju (SE)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Camila Pereira Almeida',
                    'phone' => '5588998765432', // Celular Juazeiro do Norte (CE)
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Thiago Rodrigues Costa',
                    'phone' => '558521334455', // Fixo Recife (PE)
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            
        
            


            // Adicione mais contatos conforme necessário...
        ];

        // Insere os contatos
        Contact::insert($contacts);
    }
}
