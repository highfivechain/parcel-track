<?php
namespace Tests;

require_once __DIR__ .'/../vendor/autoload.php';

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Xmhafiz\FbFeed\Request;
/**
* RequestTest.php
* to test function in Request class
*/
class RequestTest extends TestCase
{
    function testPostLajuSuccess()
    {
        $result = parcel_track()->postLaju()->setTrackingNumber("ER157080065MY")->fetch();

        $this->assertTrue(true);
        $this->assertEquals(200, $result['code']);
    }

    function testPostLajuEmptySuccess()
    {
        $result = parcel_track()->postLaju()->setTrackingNumber("")->fetch();

        $this->assertTrue(count($result['tracker']) == 0);
        $this->assertEquals(200, $result['code']);
    }

    function testPostLajuFailed()
    {
        $result = parcel_track()->setTrackingNumber("ER157080065MY")->fetch();
        $this->assertTrue($result['error']);
        $this->assertEquals(400, $result['code']);
    }
}