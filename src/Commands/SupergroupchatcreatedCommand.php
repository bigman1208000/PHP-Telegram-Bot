<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands;

use Longman\TelegramBot\Command;
use Longman\TelegramBot\Request;

/**
 * Super group chat created command
 */
class SupergroupchatcreatedCommand extends Command
{
    /**
     * Name
     *
     * @var string
     */
    protected $name = 'Supergroupchatcreated';

    /**
     * Description
     *
     * @var string
     */
    protected $description = 'Super group chat created';

    /**
     * Version
     *
     * @var string
     */
    protected $version = '1.0.0';

    /**
     * Execute command
     *
     * @return boolean
     */
    public function execute()
    {
        $message = $this->getMessage();

        $chat_id = $message->getChat()->getId();
        $text = '';

        if ($message->getSuperGroupChatCreated()) {
            $text = 'Your group has become a Supergroup!' . "\n";
            $text .= 'Chat id has changed from ' . $message->getMigrateFromChatId() . ' to ' . $message->getMigrateToChatId();
        }

        $data = [
            'chat_id' => $chat_id,
            'text'    => $text,
        ];

        return Request::sendMessage($data)->isOk();
    }
}
