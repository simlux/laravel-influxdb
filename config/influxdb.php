<?php
return [
    'host'      => env('INFLUXDB_HOST', 'localhost'),
    'port'      => env('INFLUXDB_PORT', '8086'),
    'user'      => env('INFLUXDB_USER', 'user'),
    'password'  => env('INFLUXDB_PASSWORD', 'pass'),
    'protocol'  => env('INFLUXDB_PROTOCOL', 'tcp'), // use precision nanoseconds when using udp
    'precision' => env('INFLUXDB_PRECISION', 's'), // SECONDS => s, NANOSECONDS = n
];