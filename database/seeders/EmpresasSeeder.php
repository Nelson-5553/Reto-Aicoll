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
        Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa 3',
            'direccion' => 'Direccion 3',
            'telefono' => '987654321'
        ]);
        Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa 4',
            'direccion' => 'Direccion 4',
            'telefono' => '987654321'
        ]);
        Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa 5',
            'direccion' => 'Direccion 5',
            'telefono' => '987654321'
        ]);
        Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa 6',
            'direccion' => 'Direccion 6',
            'telefono' => '987654321'
        ]);
    }
}
