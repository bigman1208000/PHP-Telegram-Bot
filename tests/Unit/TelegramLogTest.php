<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Unit;

use Longman\TelegramBot\TelegramLog;

use Longman\TelegramBot\Exception\TelegramLogException;
/**
 * @package         TelegramTest
 * @author          Avtandil Kikabidze <akalongman@gmail.com>
 * @copyright       Avtandil Kikabidze <akalongman@gmail.com>
 * @license         http://opensource.org/licenses/mit-license.php  The MIT License (MIT)
 * @link            http://www.github.com/akalongman/php-telegram-bot
 */
class TelegramLogTest extends TestCase
{

    /**
    * setUp
    */
    protected function setUp()
    {
    }

    /**
     * @test
     * @expectedException \Longman\TelegramBot\Exception\TelegramLogException
     */
    public function newInstanceWithoutErrorPath()
    {
        TelegramLog::initErrorLog('');
    }

    /**
     * @test
     * @expectedException \Longman\TelegramBot\Exception\TelegramLogException
     */
    public function newInstanceWithoutDebugPath()
    {
        TelegramLog::initDebugLog('');
    }

    /**
     * @test
     * @expectedException \Longman\TelegramBot\Exception\TelegramLogException
     */
    public function newInstanceWithoutUpdatePath()
    {
        TelegramLog::initUpdateLog('');
    }

    /**
     * @test
     */
    public function testErrorStream()
    {
        $file = '/tmp/errorlog.log';
        $this->assertFalse(file_exists($file));
        TelegramLog::initErrorLog($file);
        TelegramLog::error('my error');
        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    /**
     * @test
     */
    public function testDebugStream()
    {
        $file = '/tmp/debuglog.log';
        $this->assertFalse(file_exists($file));
        TelegramLog::initDebugLog($file);
        TelegramLog::debug('my debug');
        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    /**
     * @test
     */
    public function testUpdateStream()
    {
        $file = '/tmp/updatelog.log';
        $this->assertFalse(file_exists($file));
        TelegramLog::initUpdateLog($file);
        TelegramLog::update('my update');
        $this->assertTrue(file_exists($file));
        unlink($file);
    }
}
