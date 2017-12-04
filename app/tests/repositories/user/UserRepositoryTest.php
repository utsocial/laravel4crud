<?php
namespace App\Repositories;
use App\Repositories\UserRepository;
use User;
use Mockery;

class UserRepositoryTest extends \TestCase
{
    /** @var UserRepository */
    private $sut;

    /** @var User | Mock */
    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = Mockery::mock('User');
        $this->sut = new UserRepository(
            $this->user
        );
    }

    public function tearDown()
    {
        unset(
            $this->user, $this->sut
        );
        Mockery::close();
    }

    public function testGetUserById()
    {
        $this->user->shouldReceive('where', 'first')
            ->andReturn($this->user);
        $actual = $this->sut->getUserById($this->getUser()['id']);
        $this->assertInstanceOf('User', $actual);
    }

    public function testGetAllUsers()
    {

        $this->user->shouldReceive('orderBy', 'get')->andReturn($this->user);
        $this->user->shouldReceive('get')->andReturn([]);
        $actual = $this->sut->getAllUsers($this->getUser()['id']);
        $this->assertInstanceOf('User', $actual);
    }

    public function testUpdateUser()
    {
        $this->user->shouldReceive('where', 'first')
            ->andReturn($this->user);
        $this->user->shouldReceive('setAttribute', 'save')
            ->andReturn($this->user);
        $actual = $this->sut->updateUser($this->getUser());
        $this->assertInstanceOf('User', $actual);
    }

    public function testCreateUser()
    {
        $this->user->shouldReceive('setAttribute', 'save')
            ->andReturn($this->user);
        $actual = $this->sut->createUser($this->getUser());
        $this->assertTrue($actual);
    }

    private function getUser()
    {
        $user = Array();
        $user['id'] = 1;
        $user['name'] = "pepe";
        $user['twitter'] = "twitter of pepe";
        return $user;
    }
}
