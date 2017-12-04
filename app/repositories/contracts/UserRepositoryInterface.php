<?php
namespace App\Repositories\Contracts;

use Store;

/**
 * Contract for UserRepository class
 */
interface UserRepositoryInterface
{
    /**
     * @param int $userId
     * @return User
     */
    public function getUserById($userId);
    
    /**
     * @param int $userId
     * @return User
     */
    public function deleteUserById($userId);

    /**
     * @param int $userId
     * @return User
     */
    public function getAllUsers();
    
    /**
     * @param array $data
     * @return bool
     */
    public function createUser(array $data);
     
    /**
     * @param array $data
     * @return bool
     */
    public function updateUser(array $data);
}
