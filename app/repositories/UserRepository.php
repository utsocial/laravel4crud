<?php
namespace App\Repositories;

use User;

use App\Repositories\Contracts\UserRepositoryInterface;

/**
 * To handle the User Model 
 */
class UserRepository implements UserRepositoryInterface
{

    /** @var User */
    private $user;

    /**
     * @param User $user
     */
    public function __construct(
        User $user
        )
    {
        $this->setUser($user);
    }

    /**
     * @inheritdoc
     */
    public function getUserById($userId)
    {
        return $this->getUser()
                ->where('id', $userId)
                ->first();
    }

    /**
     * @inheritdoc
     */
    public function getAllUsers()
    {
        return $this->getUser()
            ->orderBy('id', 'DESC')
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function updateUser(array $data)
    {
        $user = $this->getUserById($data['id']);
        $user->name = $data['name'];
        $user->twitter = $data['twitter'];

        return $user->save();
    }
    
    /**
     * @inheritdoc
     */
    public function deleteUserById($userId)
    {
        $user = $this->getUser()
            ->find($userId);
        return $user->delete();
    }
    
    /**
     * @inheritdoc
     */
    public function createUser(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->twitter = $data['twitter'];

        return $user->save();
    }

    /**
     * @param User $user
     */
    private function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    private function getUser()
    {
        return $this->user;
    }
}
