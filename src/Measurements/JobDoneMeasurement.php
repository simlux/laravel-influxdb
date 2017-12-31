<?php declare(strict_types=1);

namespace Simlux\LaravelInfluxDB\Measurements;

/**
 * Class JobDoneMeasurement
 *
 * @package Simlux\LaravelInfluxDB\Measurements
 */
class JobDoneMeasurement extends AbstractJobMeasurement
{
    /**
     * @var string
     */
    protected $event = 'done';
}