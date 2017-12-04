<?php
namespace App\Services\User;

use Session;
use App\Services\Contracts\UserServiceInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

/**
 * Service for user utilities
 */
class UserService implements UserServiceInterface
{
    
    /** @var UserRepository */
    private $userRepository;
    
    /**
     * 
     * View viewProperties (stdClass)
     */
    private $viewProperties;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->setUserRepository($userRepository);
    }
    
    /**
     * @inheritdoc
     */
    public function getAllUsers()
    {
         return $this->getUserRepository()->getAllUsers();
    }

    /**
     * @inheritdoc
     */
    public function getUserById($userId)
    {
        /** @var User $userService */
        return $this->getUserRepository()->getUserById($userId);
    }
    
    /**
     * @inheritdoc
     */
    public function deleteUserById($userId)
    {
        $user = $this->getUserRepository()->deleteUserById($userId);
        if ($user) {
            Session::flash('message', 'Deleted successfuly!');
            Session::flash('class', 'success');
        } else {
            Session::flash('message', 'There is a Error Deleting!');
            Session::flash('class', 'danger');
        }
        return $user;
    }

    /**
     * @inheritdoc
     */
    public function updateUser($id, array $data)
    {
        $data['id'] = $id;
        $user = $this->getUserRepository()->updateUser($data);
        if ($user) {
            Session::flash('message', 'Updated successfuly!');
            Session::flash('class', 'success');
        } else {
            Session::flash('message', 'There is a Error Updating!');
            Session::flash('class', 'danger');
        }
        return $user;
    }

    /**
     * @inheritdoc
     */
    public function createUser(array $data)
    {
        $user = $this->getUserRepository()->createUser($data);
        if ($user) {
            Session::flash('message', 'Record created successfuly!');
            Session::flash('class', 'success');
        } else {
            Session::flash('message', 'There is a Error Creating!');
            Session::flash('class', 'danger');
        }
        return $user;
    }
    
    /**
     * @return UserRepository
     */
    private function getUserRepository()
    {
        return $this->userRepository;
    }

    /**
     * @param UserRepository $userRepository
     */
    private function setUserRepository(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
