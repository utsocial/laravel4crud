<?php
namespace App\Services\Contracts;

/**
 * Used to establish the abstractions for UserService class
 */
interface UserServiceInterface
{

    /**
     * @param array $data
     * @return User|bool
     */
    public function createUser(array $data);

    /**
     * 
     * @param int $userId
     * @param array $data
     * @return User|bool
     */
    public function updateUser($userId, array $data);
    
    /**
     * @param int $userId
     * @return User|bool
     */
    public function getUserById($userId);
    
    /**
     * 
     * @param type $userId
     * @return User|bool
     */
    public function deleteUserById($userId);
    
    /**
     * 
     * @return array $data
     */
    public function getAllUsers();
}
