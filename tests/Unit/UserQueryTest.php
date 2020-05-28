<?php

namespace Tests\Unit;

use Illuminate\Support\Facade\DB;
use PHPUnit\Framework\TestCase;

class UserQueryTest extends TestCase
{
  public function testGetAll()
  {
    $users = DB::select('SELECT * FROM user');
    
    echo json_encode($users, JSON_PRETTY_PRINT);
    
    $this->assertTrue(true);
  }
}
