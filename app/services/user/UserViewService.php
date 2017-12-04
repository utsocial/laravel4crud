<?php
namespace App\Services\User;

use Session;
use stdClass;
use App\Services\Contracts\UserViewServiceInterface;

/**
 * Service for user view utilities
 */
class UserViewService implements UserViewServiceInterface
{

    /**
     * 
     */
    private $viewProperties;

    public function __construct()
    {
        $this->createViewProperties();
    }

    /**
     * @inheritdoc
     */
    public function getListViewProperties()
    {
        $this->viewProperties->activeListCssClass = 'active';
        return $this->viewProperties;
    }

    /**
     * @inheritdoc
     */
    public function getCreateViewProperties()
    {
        $this->viewProperties->activeCreateCssClass = 'active';
        return $this->viewProperties;
    }

    /**
     * @return stdClass
     */
    public function getCleanViewProperties()
    {
        $this->resetViewProperties();
        return $this->viewProperties;
    }

    /**
     * 
     */
    protected function resetViewProperties()
    {
        $this->viewProperties->activeListCssClass = '';
        $this->viewProperties->activeCreateCssClass = '';
    }

    /**
     * 
     */
    private function createViewProperties()
    {
        $this->viewProperties = new stdClass();
        $this->resetViewProperties();
    }
}
