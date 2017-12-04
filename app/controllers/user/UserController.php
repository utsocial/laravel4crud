<?php

namespace App\Controllers\User;

use App\Services\Contracts\UserServiceInterface;
use App\Services\Contracts\UserViewServiceInterface;

use View;
use Illuminate\Support\Facades\Redirect;
use Request;

class UserController extends \BaseController
{
    /**
     *
     * @var UserServiceInterface
     */
    private $userService;
    
    /**
     *
     * @var UserViewServiceInterface
     */
    private $userViewService;
     
    /**
     * 
     * @param UserServiceInterface $userService
     * @param UserViewServiceInterface $userViewService
     */
    public function __construct(
        UserServiceInterface $userService,
        UserViewServiceInterface $userViewService
        )
    {
        $this->setUserService($userService);
        $this->setUserViewService($userViewService);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        try {
            $viewProperties = $this->getUserViewService()->getListViewProperties();
            $users = $this->getUserService()->getAllUsers();
            return View::make(
                    'users.index', compact('viewProperties', 'users')
            );
        } catch (Exception $e) {
            $this->manageException($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        try {
            $viewProperties = $this->getUserViewService()->getCreateViewProperties();
            return View::make(
                    'users.create', compact('viewProperties', 'users')
            );
        } catch (Exception $e) {
            $this->manageException($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try {
            $user = $this->getUserService()->createUser(Request::all());
            return Redirect::to('users/create');
        } catch (Exception $e) {
            $this->manageException($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id = null)
    {
         try {
            $user = $this->getUserService()->getUserById($id);
            $viewProperties = $this->getUserViewService()->getCleanViewProperties();
            return View::make(
                'users.show',
                compact('viewProperties','user')
              );
        } catch (Exception $e) {
            $this->manageException($e);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id = null)
    {
        try {
            $user = $this->getUserService()->getUserById($id);
            $viewProperties = $this->getUserViewService()->getCleanViewProperties();
            return View::make(
                'users.edit',
                compact('viewProperties','user')
              );
        } catch (Exception $e) {
            $this->manageException($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        try {
            $users = $this->getUserService()->updateUser($id, Request::all());
        } catch (Exception $e) {
            $this->manageException($e);
        }
        return Redirect::to('users/edit/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $user = $this->getUserService()->deleteUserById($id);
        } catch (Exception $e) {
            $this->manageException($e);
        }
        return Redirect::to('users');
    }
    
    /**
     * 
     * @param UserServiceInterface $userService
     */
    private function setUserService(UserServiceInterface $userService) {
        $this->userService = $userService;
    }
    
    /**
     * 
     * @return UserServiceInterface
     */
    private function getUserService() {
        return $this->userService;
    }
    
    /**
     * 
     * @param UserViewServiceInterface $userViewService
     */
    private function setUserViewService(UserViewServiceInterface $userViewService) {
        $this->userViewService = $userViewService;
    }
    
    /**
     * 
     * @return UserViewServiceInterface
     */
    private function getUserViewService() {
        return $this->userViewService;
    }
    
}
