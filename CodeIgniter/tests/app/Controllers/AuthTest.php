<?php

namespace CodeIgniter;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class AuthTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    //To run this test, navigate to Codeigniter directory, 
    //and run sudo phpunit tests/app/Controllers/AuthTest.php 
    public function testIndex()
    {
        $result = $this->withURI('http://10.12.116.140/auth')
            ->controller(\App\Controllers\Auth::class)
            ->execute('index');
        $this->assertTrue($result->isOK());
    }
    public function testRegister()
    {
        $result = $this->withURI('http://10.12.116.140/auth/register')
            ->controller(\App\Controllers\Auth::class)
            ->execute('register');
        $this->assertTrue($result->isOK());
    }
}