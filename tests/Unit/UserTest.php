<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    protected $user;

    protected function test_get_manager(): void
    {
        $this->user = new User();
    }
}
