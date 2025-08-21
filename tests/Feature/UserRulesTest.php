<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('prevents duplicate car registrations', function () {
    User::factory()->create(['car_registration' => 'ABC123']);
    $u = User::factory()->create();

    $this->actingAs($u)
        ->patch('/profile', [
            'first_name' => 'X',
            'last_name' => 'Y',
            'car_registration' => 'ABC123',
            'email' => $u->email,
        ])
        ->assertSessionHasErrors('car_registration');
});

it('prevents duplicate name pairs', function () {
    User::factory()->create(['first_name'=>'John','last_name'=>'Doe']);
    $u = User::factory()->create();

    $this->actingAs($u)
        ->patch('/profile', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'car_registration' => $u->car_registration,
            'email' => $u->email,
        ])
        ->assertSessionHasErrors('first_name');
});
