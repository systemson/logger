<?php

namespace Amber\Logger;

use Amber\Filesystem\Filesystem;
use Amber\Logger\Config\ConfigAwareTrait;
use Amber\Logger\Config\ConfigAwareInterface;
use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger implements ConfigAwareInterface
{
    use ConfigAwareTrait;

    protected $name;
    protected $filesystem;

    public function __construct($config = [])
    {
        $this->setConfig($config);

        $this->name = $this->getConfig('logger_name', 'log') . '-' . date('Y-m-d') . '.log';

        $this->filesystem = Filesystem::getInstance($this->getConfig('filesystem_root', getcwd()));
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function log($level, $message, array $context = [])
    {
        $message .= PHP_EOL . implode(PHP_EOL, $context);

        $this->filesystem->put($this->getConfig('logger_path') . '/' . $this->name, $message);
    }
}
