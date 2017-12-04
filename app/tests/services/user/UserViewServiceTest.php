<?php
namespace App\Test\User\Services;

use App\Services\User\UserViewService;
use stdClass;

class UserViewServiceTest extends \TestCase
{

    /** @var UserViewService */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = new UserViewService();
    }

    public function tearDown()
    {
        parent::tearDown();

        unset(
            $this->sut
        );
    }

    public function testGetListViewProperties()
    {
        $actual = $this->sut->getListViewProperties();
        $this->assertEquals(get_class($actual), 'stdClass');
        $this->assertEquals($actual->activeListCssClass, 'active');
    }

    public function testGetCreateViewProperties()
    {
        $actual = $this->sut->getCreateViewProperties();
        $this->assertEquals(get_class($actual), 'stdClass');
        $this->assertEquals($actual->activeCreateCssClass, 'active');
    }

    public function testGetCleanViewProperties()
    {
        $actual = $this->sut->getCleanViewProperties();
        $this->assertEquals(get_class($actual), 'stdClass');
        $this->assertEquals($actual->activeListCssClass, '');
        $this->assertEquals($actual->activeCreateCssClass, '');
    }
}
