<?php

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

    $response = $this->from(route('reporte.create'))->post(route('reporte.store'), [
        'ubicacion' => 'Colonia Centro',
        'descripcion' => 'El agua sale turbia',
        'fecha_inicio' => '2026-10-20',
    ]);

    $response->assertRedirect(route('reporte.create'));

    $this->assertDatabaseHas('reportes', [
        'user_id' => $user->id,
        'ubicacion' => 'Colonia Centro',
        'descripcion' => 'El agua sale turbia',
    ]);
});
