<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresas;
use App\Helpers\NitHelper;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa 1',
            'direccion' => 'Direccion 1',
            'telefono' => '123456789'
        ]);

        Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa 2',
            'direccion' => 'Direccion 2',
            'telefono' => '987654321'
        ]);
    }
}
