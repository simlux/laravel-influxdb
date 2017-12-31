<?php declare(strict_types=1);

namespace Simlux\LaravelInfluxDB\Measurements;

/**
 * Class JobRejectedMeasurement
 *
 * @package Simlux\LaravelInfluxDB\Measurements
 */
class JobRejectedMeasurement extends AbstractJobMeasurement
{
    /**
     * @var string
     */
    protected $event = 'rejected';
}
