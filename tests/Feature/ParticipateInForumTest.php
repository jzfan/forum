<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForumTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
		$this->thread = factory('App\Thread')->create();
		$this->withoutExceptionHandling();
	}
	/** @test */
	public function unauthenticated_user_may_not_add_a_reply()
	{
		$this->expectException('Illuminate\Auth\AuthenticationException');
		$this->post($this->thread->path() . '/replies', []);
	}

	/** @test */
	public function an_authenticated_user_may_participate_in_forum_threads()
	{
		$this->be(factory('App\User')->create());
		$this->post($this->thread->path() . '/replies', ['body' => 'some words'])
			 ->assertStatus(302);
		// $this->get($this->thread->path())
		// 	 ->assertSee('some words'); 
	}
}
