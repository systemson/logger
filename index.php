<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

use Amber\Logger\Logger;

$log = new Logger();

$log->info('lol', [1, 2, 3, 4, 5]);
$log->info('lol', [1, 2, 3, 4, 5]);
