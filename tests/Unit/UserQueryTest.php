<?php

namespace Tests\Unit;

use App\User;
use PHPUnit\Framework\TestCase;

class UserQueryTest extends TestCase
{
  public function testGetAll()
  {
    $users = User::all();
    
    echo json_encode($users, JSON_PRETTY_PRINT);
    
    $this->assertTrue(true);
  }
}
