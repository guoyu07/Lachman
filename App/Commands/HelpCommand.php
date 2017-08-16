<?php

namespace App\Commands;
use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'help';
    /**
     * @var array Command Aliases
     */
    protected $aliases = ['listcommands'];
    /**
     * @var string Command Description
     */
    protected $description = '查看所有可用命令';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $commands = $this->telegram->getCommands();
        $text = '';
        foreach ($commands as $name => $handler) {
            $text .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
        }
        $this->replyWithMessage(compact('text'));
    }
}