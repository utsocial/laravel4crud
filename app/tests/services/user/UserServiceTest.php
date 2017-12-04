<?php
namespace App\Test\User\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\User\UserService;
use Mockery;
use Session;

class UserServiceTest extends \TestCase
{
    /** @var UserService */
    private $sut;
    
    /** @var UserRepositoryInterface | Mock */
    private $userRepository;
    
    /** @var Market | Mock */
    private $user;
    
    public function setUp()
    {
        parent::setUp();
        $this->userRepository = Mockery::mock('App\Repositories\Contracts\UserRepositoryInterface');
        $this->sut = new UserService($this->userRepository);
    }

    public function tearDown()
    {
        parent::tearDown();

        unset(
            $this->userRepository,
            $this->sut
        );
        Mockery::close();
    }

    public function testGetAllUsers() {
        $this->userRepository->shouldReceive('getAllUsers')
            ->andReturn([]);
        $actual = $this->sut->getAllUsers();
        $this->assertInternalType('array', $actual);
    }
    
    public function testGetUserById() {
        $this->userRepository->shouldReceive('getUserById')
            ->andReturn([]);
        $actual = $this->sut->getUserById($this->getUser()['id']);
        $this->assertInternalType('array', $actual);
    }    
    
    public function testDeleteUserById() {
        $this->userRepository->shouldReceive('deleteUserById')
            ->andReturn($this->userRepository);
        $actual = $this->sut->deleteUserById($this->getUser()['id']);
                $this->assertNotEmpty($actual);
        $this->assertEquals(Session::get('class'), 'success');
        $this->assertEquals(Session::get('message'), 'Deleted successfuly!');
    }    
    
    public function testDeleteUserByIdWithProblemsInTheRepository() {
        $this->userRepository->shouldReceive('deleteUserById')
            ->andReturnNull();
        $actual = $this->sut->deleteUserById($this->getUser()['id']);
        $this->assertEquals(Session::get('class'), 'danger');
        $this->assertEquals(Session::get('message'), 'There is a Error Deleting!');
        $this->assertEmpty($actual);
    }    
    
        public function testUpdateUser()
    {
        $this->userRepository->shouldReceive('updateUser')
            ->andReturn($this->userRepository);
        $actual = $this->sut->updateUser(
            $this->getUser()['id'],
            $this->getUser()
            );
        $this->assertNotEmpty($actual);
        $this->assertEquals(Session::get('class'), 'success');
        $this->assertEquals(Session::get('message'), 'Updated successfuly!');
        }
    
    public function testUpdateUserWithProblemsInTheRepotitory()
    {
        $this->userRepository->shouldReceive('updateUser')
            ->andReturnNull();
        $actual = $this->sut->updateUser(
                $this->getUser()['id'], 
                $this->getUser()
            );
        $this->assertEquals(Session::get('class'), 'danger');
        $this->assertEquals(Session::get('message'), 'There is a Error Updating!');
        $this->assertEmpty($actual);
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
