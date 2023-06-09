<?php

namespace PHPMaker2023\appmessage;

use Slim\Views\PhpRenderer;
use Slim\Csrf\Guard;
use Slim\HttpCache\CacheProvider;
use Slim\Flash\Messages;
use Psr\Container\ContainerInterface;
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Doctrine\DBAL\Logging\LoggerChain;
use Doctrine\DBAL\Logging\DebugStack;

return [
    "cache" => \DI\create(CacheProvider::class),
    "flash" => fn(ContainerInterface $c) => new Messages(),
    "view" => fn(ContainerInterface $c) => new PhpRenderer($GLOBALS["RELATIVE_PATH"] . "views/"),
    "audit" => fn(ContainerInterface $c) => (new Logger("audit"))->pushHandler(new AuditTrailHandler("audit.log")), // For audit trail
    "log" => fn(ContainerInterface $c) => (new Logger("log"))->pushHandler(new RotatingFileHandler($GLOBALS["RELATIVE_PATH"] . "log.log")),
    "sqllogger" => function (ContainerInterface $c) {
        $loggers = [];
        if (Config("DEBUG")) {
            $loggers[] = $c->get("debugstack");
        }
        return (count($loggers) > 0) ? new LoggerChain($loggers) : null;
    },
    "csrf" => fn(ContainerInterface $c) => new Guard($GLOBALS["ResponseFactory"], Config("CSRF_PREFIX")),
    "debugstack" => \DI\create(DebugStack::class),
    "debugsqllogger" => \DI\create(DebugSqlLogger::class),
    "security" => \DI\create(AdvancedSecurity::class),
    "profile" => \DI\create(UserProfile::class),
    "language" => \DI\create(Language::class),
    "timer" => \DI\create(Timer::class),
    "session" => \DI\create(HttpSession::class),

    // Tables
    "message_tbl" => \DI\create(MessageTbl::class),
    "sent_tbl" => \DI\create(SentTbl::class),
    "contact_tbl" => \DI\create(ContactTbl::class),
    "send" => \DI\create(Send::class),
    "twilio_tbl" => \DI\create(TwilioTbl::class),
    "twresponse_tbl" => \DI\create(TwresponseTbl::class),
];
