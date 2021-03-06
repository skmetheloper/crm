<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class UserQueryTest extends TestCase
{
  public function testGetAll()
  {
    $app = $this->createApplication();
    $users = DB::table('users')->get();
    $result = json_encode($users, JSON_PRETTY_PRINT);  
    register_shutdown_function(function () use ($result) {
        echo PHP_EOL, $result, PHP_EOL;
    });
    $this->assertTrue(true);
  }
}
