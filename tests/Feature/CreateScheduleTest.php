<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateScheduleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function loginAsAdmin($user){
        // Create a Admin role
        $adminRole = Role::factory()->create([
            'name' => "Admin",
            'slug' => "admin",
        ]);

        // Assigne user a admin role
        $userAdminRole = UserRole::factory()->create([
            'user_id' => $user->id,
            'role_id' => $adminRole->id,
        ]);
        
        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => "password",
        ]);
    }
    public function loginAsUser($user){
        // Create a Admin role
        $adminRole = Role::factory()->create([
            'name' => "User",
            'slug' => "user",
        ]);

        // Assigne user a admin role
        $userAdminRole = UserRole::factory()->create([
            'user_id' => $user->id,
            'role_id' => $adminRole->id,
        ]);
        
        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => "password",
        ]);
    }

    public function test_admin_create_schedule(): void
    {
        $user = User::factory()->create();

        $this->loginAsAdmin($user);

        $attributes = [
            'topics'=>'web developments, graphics design, email marketing',
            'language'=>'en-US',
            'length'=>200,
            'creativity'=>0.75,
            'voice_tone'=>'Proffessional',
            'interval'=>10,
            'status'=>0,
        ];

        $response = $this->post('/admin/create-schedules',$attributes);

        $this->assertAuthenticated();
        $response->assertStatus(200);
    }

    public function test_user_create_schedule(): void
    {
        $user = User::factory()->create();

        $this->loginAsUser($user);

        $attributes = [
            'topics'=>'web developments, graphics design, email marketing',
            'language'=>'en-US',
            'max_length'=>200,
            'creativity'=>0.75,
            'voice_tone'=>'Proffessional',
            'interval'=>5,
            'status'=>0,
        ];

        $response = $this->post('/admin/create-schedules',$attributes);

        $this->assertAuthenticated();
        $response->assertStatus(302);
    }
}
