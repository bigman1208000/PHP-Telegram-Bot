<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Entities\ReplyKeyboardMarkup;

/**
 * User "/hidekeyboard" command
 */
class HidekeyboardCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'hidekeyboard';
    protected $description = 'Hide the custom keyboard';
    protected $usage = '/hidekeyboard';
    protected $version = '0.0.5';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $data = [];
        $data['chat_id'] = $chat_id;
        $data['text'] = 'Keyboard Hided';
        $data['reply_markup'] = new ReplyKeyboardHide([ 'selective' => false]);

        return Request::sendMessage($data);
    }
}
