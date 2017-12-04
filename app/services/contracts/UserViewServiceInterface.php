<?php
namespace App\Services\Contracts;

/**
 * Used to establish the abstractions for UserViewService class
 */
interface UserViewServiceInterface
{
    /**
     * @return stdClass
     */
    public function getListViewProperties();
    
    /**
     * @return stdClass
     */
    public function getCreateViewProperties();
    
    /**
     * @return stdClass
     */
    public function getCleanViewProperties();
    
}
