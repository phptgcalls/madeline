<?php

$botToken = getenv('BOT_TOKEN') ?: ($_ENV['BOT_TOKEN'] ?? null);

if (!$botToken) {
    throw new RuntimeException('BOT_TOKEN not set in environment');
}

if (!file_exists("madeline.php")) {
   copy("https://phar.madelineproto.xyz/madeline.php", "madeline.php");
}

include "madeline.php";

use danog\MadelineProto\API;
use danog\MadelineProto\EventHandler\Message;
use danog\MadelineProto\LocalFile;
use Webmozart\Assert\Assert;

$settings = new \danog\MadelineProto\Settings;
$settings->getLogger()->setLevel(\danog\MadelineProto\Logger::LEVEL_ULTRA_VERBOSE);

$settings->getConnection()->setMaxMediaSocketCount(50);
$settings->getFiles()->setUploadParallelChunks(50);
$settings->getFiles()->setDownloadParallelChunks(50);

$settings->getFiles()->setAllowAutomaticUpload(true);

$settings->getAppInfo()
->setApiId(29784714)
->setApiHash('143dfc3c92049c32fbc553de2e5fb8e4');

$api = new \danog\MadelineProto\API('session.madeline', $settings);

$MadelineProto->botLogin($botToken);

$api->start();

var_dump($api->fullGetSelf());
