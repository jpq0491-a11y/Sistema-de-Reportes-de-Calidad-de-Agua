<?php

use App\Models\Reporte;
use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('reporte.create'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the create reporte page', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->get(route('reporte.create'));
    $response->assertOk();
});

test('authenticated users can create a reporte', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->post(route('reporte.store'), [
        'ubicacion' => 'Colonia Centro',
        'descripcion' => 'El agua sale turbia',
        'fecha_inicio' => '2026-10-20',
    ]);

    $response->assertRedirect(route('reporte.index'));

    $this->assertDatabaseHas('reportes', [
        'user_id' => $user->id,
        'ubicacion' => 'Colonia Centro',
        'descripcion' => 'El agua sale turbia',
    ]);
});

test('the reporte listing only shows the reportes of the authenticated user', function () {
    $user = User::factory()->create();
    Reporte::factory()->for($user)->create(['ubicacion' => 'Colonia Centro']);
    Reporte::factory()->create(['ubicacion' => 'Colonia Ajena']);
    $this->actingAs($user);

    $response = $this->get(route('reporte.index'));

    $response->assertOk();
    $response->assertSee('Colonia Centro');
    $response->assertDontSee('Colonia Ajena');
});

test('authenticated users can view a reporte', function () {
    $reporte = Reporte::factory()->create(['fecha_inicio' => '2026-10-20']);
    $this->actingAs($reporte->user);

    $response = $this->get(route('reporte.show', $reporte));

    $response->assertOk();
    $response->assertSee($reporte->ubicacion);
    $response->assertSee('2026-10-20');
});

test('the edit page fills the form with the reporte data', function () {
    $reporte = Reporte::factory()->create(['fecha_inicio' => '2026-10-20']);
    $this->actingAs($reporte->user);

    $response = $this->get(route('reporte.edit', $reporte));

    $response->assertOk();
    $response->assertSee('value="2026-10-20"', false);
});

test('authenticated users can update a reporte', function () {
    $reporte = Reporte::factory()->create();
    $this->actingAs($reporte->user);

    $response = $this->patch(route('reporte.update', $reporte), [
        'ubicacion' => 'Colonia Nueva',
        'descripcion' => 'Ya no sale turbia',
        'fecha_inicio' => '2026-10-21',
    ]);

    $response->assertRedirect(route('reporte.show', $reporte));

    $this->assertDatabaseHas('reportes', [
        'id' => $reporte->id,
        'ubicacion' => 'Colonia Nueva',
        'descripcion' => 'Ya no sale turbia',
    ]);
});

test('authenticated users can delete a reporte', function () {
    $reporte = Reporte::factory()->create();
    $this->actingAs($reporte->user);

    $response = $this->delete(route('reporte.destroy', $reporte));

    $response->assertRedirect(route('reporte.index'));
    $this->assertModelMissing($reporte);
});
