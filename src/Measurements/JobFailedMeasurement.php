<?php declare(strict_types=1);

namespace Simlux\LaravelInfluxDB\Measurements;

/**
 * Class JobFailedMeasurement
 *
 * @package Simlux\LaravelInfluxDB\Measurements
 */
class JobFailedMeasurement extends AbstractJobMeasurement
{
    /**
     * @var string
     */
    protected $event = 'failed';
}
