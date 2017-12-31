<?php declare(strict_types=1);

namespace Simlux\LaravelInfluxDB\Measurements;

use InfluxDB\Point;

/**
 * Class AbstractJobMeasurement
 *
 * @package Simlux\LaravelInfluxDB\Measurements
 */
abstract class AbstractJobMeasurement extends AbstractMeasurement
{
    /**
     * @var
     */
    protected $event;

    /**
     * @return Point
     */
    public function getPoint(): Point
    {
	$this->tags['identifier'] = $this->identifier;

        return new Point(
            'job',
            1,
            array_merge($this->tags, ['event' => $this->event]),
            $this->data,
            $this->getTime()
        );
    }
}
