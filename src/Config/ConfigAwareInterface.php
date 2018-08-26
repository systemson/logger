<?php

namespace Amber\Logger\Config;

use Amber\Config\ConfigAwareInterface as BaseInterface;

interface ConfigAwareInterface extends BaseInterface
{
    const LOGGER_PATH = '/tmp/log';
}
