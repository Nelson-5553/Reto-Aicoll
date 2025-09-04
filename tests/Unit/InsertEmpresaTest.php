<?php

// tests/Unit/InsertEmpresaTest.php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Empresas;
use App\Helpers\NitHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsertEmpresaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test que verifica la inserción básica de una empresa.
     */
    public function test_puede_insertar_empresa_con_datos_basicos(): void
    {
        // Arrange
        $datosEmpresa = [
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa 1',
            'direccion' => 'Direccion 1',
            'telefono' => '123456789'
        ];

        // Act
        $empresa = Empresas::create($datosEmpresa);

        // Assert
        $this->assertInstanceOf(Empresas::class, $empresa);
        $this->assertTrue($empresa->exists);
        $this->assertEquals('Empresa 1', $empresa->nombre);
        $this->assertEquals('Direccion 1', $empresa->direccion);
        $this->assertEquals('123456789', $empresa->telefono);
        $this->assertNotNull($empresa->nit);

        // Verificar que está en la base de datos
        $this->assertDatabaseHas('empresas', [
            'nombre' => 'Empresa 1',
            'direccion' => 'Direccion 1',
            'telefono' => '123456789'
        ]);
    }

    /**
     * Test que verifica la inserción con NIT generado automáticamente.
     */
    public function test_inserta_empresa_con_nit_generado(): void
    {
        // Act
        $empresa = Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa Test',
            'direccion' => 'Direccion Test',
            'telefono' => '987654321'
        ]);

        // Assert
        $this->assertNotNull($empresa->nit);
        $this->assertMatchesRegularExpression('/^\d+-\d$/', $empresa->nit);
        $this->assertDatabaseHas('empresas', [
            'nit' => $empresa->nit,
            'nombre' => 'Empresa Test'
        ]);
    }

    /**
     * Test que verifica la inserción de múltiples empresas.
     */
    public function test_puede_insertar_multiples_empresas(): void
    {
        // Arrange
        $empresas = [
            [
                'nit' => NitHelper::generarNIT(),
                'nombre' => 'Empresa 1',
                'direccion' => 'Direccion 1',
                'telefono' => '123456789'
            ],
            [
                'nit' => NitHelper::generarNIT(),
                'nombre' => 'Empresa 2',
                'direccion' => 'Direccion 2',
                'telefono' => '987654321'
            ],
            [
                'nit' => NitHelper::generarNIT(),
                'nombre' => 'Empresa 3',
                'direccion' => 'Direccion 3',
                'telefono' => '456789123'
            ]
        ];

        // Act
        foreach ($empresas as $datosEmpresa) {
            Empresas::create($datosEmpresa);
        }

        // Assert
        $this->assertEquals(3, Empresas::count());

        foreach ($empresas as $datos) {
            $this->assertDatabaseHas('empresas', [
                'nombre' => $datos['nombre'],
                'direccion' => $datos['direccion'],
                'telefono' => $datos['telefono']
            ]);
        }
    }

    /**
     * Test que verifica que los NITs son únicos.
     */
    public function test_nits_son_unicos_en_insercion_multiple(): void
    {
        // Act
        $empresa1 = Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa 1',
            'direccion' => 'Direccion 1',
            'telefono' => '123456789'
        ]);

        $empresa2 = Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa 2',
            'direccion' => 'Direccion 2',
            'telefono' => '987654321'
        ]);

        // Assert
        $this->assertNotEquals($empresa1->nit, $empresa2->nit);
        $this->assertEquals(2, Empresas::count());
    }

    /**
     * Test que verifica la inserción con campos adicionales si existen.
     */
    public function test_inserta_empresa_con_campos_opcionales(): void
    {
        // Arrange
        $datosEmpresa = [
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa Completa',
            'direccion' => 'Direccion Completa',
            'telefono' => '123456789',
            'email' => 'test@empresa.com', // Si tienes este campo
            'estado' => 'activo' // Si tienes este campo
        ];

        // Act
        $empresa = Empresas::create($datosEmpresa);

        // Assert
        $this->assertEquals('Empresa Completa', $empresa->nombre);
        $this->assertDatabaseHas('empresas', [
            'nombre' => 'Empresa Completa',
            'direccion' => 'Direccion Completa',
            'telefono' => '123456789'
        ]);

        // Solo verificar campos opcionales si existen en tu modelo
        if ($empresa->hasAttribute('email')) {
            $this->assertEquals('test@empresa.com', $empresa->email);
        }

        if ($empresa->hasAttribute('estado')) {
            $this->assertEquals('activo', $empresa->estado);
        }
    }

    /**
     * Test que verifica que la inserción falla con datos inválidos.
     */
    public function test_falla_insercion_con_datos_invalidos(): void
    {
        // Arrange & Act & Assert
        $this->expectException(\Illuminate\Database\QueryException::class);

        // Intentar crear empresa sin nombre (campo requerido)
        Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'direccion' => 'Direccion Test',
            'telefono' => '123456789'
            // Falta 'nombre' que debería ser requerido
        ]);
    }

    /**
     * Test que verifica los timestamps automáticos.
     */
    public function test_timestamps_se_crean_automaticamente(): void
    {
        // Act
        $empresa = Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa Timestamps',
            'direccion' => 'Direccion Timestamps',
            'telefono' => '123456789'
        ]);

        // Assert
        $this->assertNotNull($empresa->created_at);
        $this->assertNotNull($empresa->updated_at);
        $this->assertEquals($empresa->created_at, $empresa->updated_at);
    }
}
