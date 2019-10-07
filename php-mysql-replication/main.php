<?php
declare(strict_types=1);

error_reporting(E_ALL);
date_default_timezone_set('UTC');

echo "*************************\n";

include __DIR__ . '/vendor/autoload.php';

use MySQLReplication\Config\ConfigBuilder;
use MySQLReplication\Event\DTO\EventDTO;
use MySQLReplication\Event\EventSubscribers;
use MySQLReplication\MySQLReplicationFactory;


use MySQLReplication\Event\DTO\DeleteRowsDTO;
use MySQLReplication\Event\DTO\QueryDTO;
use MySQLReplication\Event\DTO\UpdateRowsDTO;
use MySQLReplication\Event\DTO\WriteRowsDTO;
use MySQLReplication\Definitions\ConstEventType as CET;

/**
 * Your db configuration
 * @see ConfigBuilder
 * @link https://github.com/krowinski/php-mysql-replication/blob/master/README.md
 */
$binLogStream = new MySQLReplicationFactory(
    (new ConfigBuilder())
        ->withUser('root')
        ->withHost('mysql')
        ->withPassword('root')
        ->withPort(3306)
        ->withSlaveId(100)
        ->withEventsOnly([CET::WRITE_ROWS_EVENT_V2, CET::UPDATE_ROWS_EVENT_V2, CET::DELETE_ROWS_EVENT_V2])
        ->withHeartbeatPeriod(10)
        ->build()
);

/**
 * Register your events handler
 * @see EventSubscribers
 */
$binLogStream->registerSubscriber(
    new class() extends EventSubscribers
    {
        public function allEvents(EventDTO $event): void
        {
            echo $event . PHP_EOL;
            #echo json_encode($event, JSON_PRETTY_PRINT).PHP_EOL;
            echo 'Memory usage ' . round(memory_get_usage() / 1048576, 2) . ' MB' . PHP_EOL;
        }
    }
);

// start consuming events
$binLogStream->run();