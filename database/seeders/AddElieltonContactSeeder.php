<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddElieltonContactSeeder extends Seeder
{
    public function run()
    {
        DB::table('contacts')->insert([
            'name' => 'Elielton Almeida',
            'phone' => '5519999269043',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->command->info('Contato Elielton Almeida adicionado com sucesso!');
    }
}
