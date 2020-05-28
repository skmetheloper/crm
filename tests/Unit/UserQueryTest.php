<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;

class UserQueryTest extends TestCase
{
  public function testGetAll()
  {
    $users = DB::select('SELECT * FROM user');
    
    echo json_encode($users, JSON_PRETTY_PRINT);
    
    $this->assertTrue(true);
  }
}
