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
                'name' => 'Leonardo George',
                'phone' => '5491133343771',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ricardo Almeida',
                'phone' => '5581987623456', // Celular Recife (PE)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fernanda Castro',
                'phone' => '558692345678', // Fixo Teresina (PI)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Marcos Vinícius',
                'phone' => '5586998765432', // Celular Teresina (PI)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Juliana Porto',
                'phone' => '558321654321', // Fixo João Pessoa (PB)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rodrigo Santana',
                'phone' => '5587991234567', // Celular Petrolina (PE)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Amanda Nunes',
                'phone' => '558622334455', // Fixo Maceió (AL)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lucas Peixoto',
                'phone' => '5584987654321', // Celular Natal (RN)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Carolina Dias',
                'phone' => '558533112233', // Fixo Fortaleza (CE)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gustavo Henrique',
                'phone' => '5587987654321', // Celular Juazeiro do Norte (CE)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Patrícia Lemos',
                'phone' => '558732445566', // Fixo Aracaju (SE)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rafael Monteiro',
                'phone' => '5582998765432', // Celular Maceió (AL)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tatiane Vasconcelos',
                'phone' => '558321987654', // Fixo João Pessoa (PB)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Diego Ramos',
                'phone' => '5586991234567', // Celular Teresina (PI)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Vanessa Lima',
                'phone' => '558733556677', // Fixo Maceió (AL)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Roberto Júnior',
                'phone' => '5581981234567', // Celular Recife (PE)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mariana Costa',
                'phone' => '558422667788', // Fixo Natal (RN)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Felipe Andrade',
                'phone' => '5587981234567', // Celular Juazeiro do Norte (CE)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Larissa Martins',
                'phone' => '558832998877', // Fixo Aracaju (SE)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Eduardo Sampaio',
                'phone' => '5588998765432', // Celular Juazeiro do Norte (CE)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Camila Rocha',
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
