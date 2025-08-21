<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows admin to export excel', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin)
        ->get('/admin/users-export')
        ->assertOk(); // Excel will return a streamed response
});

it('forbids non-admin export', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin/users-export')
        ->assertForbidden();
});
