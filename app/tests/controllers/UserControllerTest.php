<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserControllerTest
 *
 * @author ivan
 */
class UserControllerTest extends TestCase
{
    // https://laravel.com/docs/4.2/testing
    // https://code.tutsplus.com/tutorials/testing-laravel-controllers--net-31456
    
    public function testHomePage()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
    }

    public function testStore()
    {
        $this->call('GET', '/users/store');
        $this->assertResponseOk();
    }


}
