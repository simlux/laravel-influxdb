<?php declare(strict_types=1);

namespace Simlux\LaravelInfluxDB\Measurements;

use InfluxDB\Point;

/**
 * Class MemoryPeakMeasurement
 *
 * @package Simlux\LaravelInfluxDB\Measurements
 */
class MemoryPeakMeasurement extends AbstractMeasurement
{
    /**
     * @return Point
     */
    public function getPoint():Point
    {
        return new Point(
            'memory_peak',
            memory_get_peak_usage(true),
            array_merge($this->tags, ['identifier' => $this->identifier]),
            $this->data,
            $this->getTime()
        );
    }
}