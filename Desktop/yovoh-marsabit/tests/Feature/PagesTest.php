<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_home_page_loads(): void
    {
        $this->get(route('home'))->assertOk()->assertSee('Young Voices of Hope');
    }

    public function test_about_page_loads(): void
    {
        $this->get(route('about'))->assertOk();
    }

    public function test_programs_page_loads(): void
    {
        $this->get(route('programs'))->assertOk()->assertSee('Digital Literacy');
    }

    public function test_impact_page_loads(): void
    {
        $this->get(route('impact'))->assertOk();
    }

    public function test_partners_page_loads(): void
    {
        $this->get(route('partners'))->assertOk();
    }

    public function test_contact_form_validates(): void
    {
        $this->post(route('contact.submit'), [])
            ->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }

    public function test_contact_form_submits_successfully(): void
    {
        $this->post(route('contact.submit'), [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'subject' => 'Partnership inquiry',
            'message' => 'I would like to learn more about the WASH pillar.',
        ])->assertRedirect(route('contact'));

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'jane@example.com',
        ]);
    }

    public function test_guest_is_redirected_from_admin(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
    }
}
