<?php

// tests/Feature/DeleteEmpresaTest.php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Empresas;
use App\Models\User;
use App\Helpers\NitHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class DeleteEmpresaTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * Test que verifica que se puede eliminar una empresa inactiva.
     */
    public function test_puede_eliminar_empresa_inactiva(): void
    {
        // Arrange
        $this->actingAs($this->user);

        $empresa = Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa a Eliminar',
            'direccion' => 'Direccion Test',
            'telefono' => '123456789',
            'estado' => 'inactivo'
        ]);

        // Act
        $response = $this->delete(route('empresas.destroy', $empresa));

        // Assert
        $response->assertRedirect(route('empresas.index'))
                ->assertSessionHas('success', 'Empresa eliminada exitosamente.');

        // Verificar que la empresa fue eliminada de la base de datos
        $this->assertDatabaseMissing('empresas', [
            'id' => $empresa->id
        ]);

        $this->assertEquals(0, Empresas::count());
    }

    /**
     * Test que verifica que NO se puede eliminar una empresa activa.
     */
    public function test_no_puede_eliminar_empresa_activa(): void
    {
        // Arrange
        $this->actingAs($this->user);

        $empresa = Empresas::create([
            'nit' => NitHelper::generarNIT(),
            'nombre' => 'Empresa Activa',
            'direccion' => 'Direccion Test',
            'telefono' => '123456789',
            'estado' => 'activo'
        ]);

        // Act
        $response = $this->delete(route('empresas.destroy', $empresa));

        // Assert
        $response->assertRedirect(route('empresas.index'))
                ->assertSessionHas('error', 'No puede Borrar una Empresa Activa.');

        // Verificar que la empresa NO fue eliminada de la base de datos
        $this->assertDatabaseHas('empresas', [
            'id' => $empresa->id,
            'nombre' => 'Empresa Activa',
            'estado' => 'activo'
        ]);

        $this->assertEquals(1, Empresas::count());
    }

    /**
     * Test que verifica eliminación múltiple de empresas inactivas.
     */
    public function test_puede_eliminar_multiples_empresas_inactivas(): void
    {
        // Arrange
        $this->actingAs($this->user);

        // Crear 3 empresas inactivas y 2 activas
        $empresasInactivas = [];
        for ($i = 1; $i <= 3; $i++) {
            $empresasInactivas[] = Empresas::create([
                'nit' => NitHelper::generarNIT(),
                'nombre' => "Empresa Inactiva $i",
                'direccion' => "Direccion $i",
                'telefono' => "12345678$i",
                'estado' => 'inactivo'
            ]);
        }

        $empresasActivas = [];
        for ($i = 1; $i <= 2; $i++) {
            $empresasActivas[] = Empresas::create([
                'nit' => NitHelper::generarNIT(),
                'nombre' => "Empresa Activa $i",
                'direccion' => "Direccion Activa $i",
                'telefono' => "98765432$i",
                'estado' => 'activo'
            ]);
        }

        $this->assertEquals(5, Empresas::count());

        // Act - Eliminar solo las empresas inactivas
        foreach ($empresasInactivas as $empresa) {
            $response = $this->delete(route('empresas.destroy', $empresa));
            $response->assertRedirect(route('empresas.index'))
                    ->assertSessionHas('success', 'Empresa eliminada exitosamente.');
        }

        // Assert
        $this->assertEquals(2, Empresas::count()); // Solo quedan las activas

        // Verificar que las empresas activas siguen existiendo
        foreach ($empresasActivas as $empresa) {
            $this->assertDatabaseHas('empresas', [
                'id' => $empresa->id,
                'estado' => 'activo'
            ]);
        }

        // Verificar que las empresas inactivas fueron eliminadas
        foreach ($empresasInactivas as $empresa) {
            $this->assertDatabaseMissing('empresas', [
                'id' => $empresa->id
            ]);
        }
    }

    /**
     * Test que verifica error 404 cuando la empresa no existe.
     */
    public function test_error_404_cuando_empresa_no_existe(): void
    {
        // Arrange
        $this->actingAs($this->user);

        // Act - Intentar eliminar empresa que no existe
        $response = $this->delete(route('empresas.destroy', 999));

        // Assert
        $response->assertStatus(404);
    }
}
