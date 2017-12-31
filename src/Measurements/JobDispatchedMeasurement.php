<?php declare(strict_types=1);

namespace Simlux\LaravelInfluxDB\Measurements;

/**
 * Class JobDispatchedMeasurement
 *
 * @package Simlux\LaravelInfluxDB\Measurements
 */
class JobDispatchedMeasurement extends AbstractJobMeasurement
{
    /**
     * @var string
     */
    protected $event = 'dispatched';
}