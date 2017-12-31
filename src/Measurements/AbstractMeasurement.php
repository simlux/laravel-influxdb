<?php declare(strict_types=1);

namespace Simlux\LaravelInfluxDB\Measurements;

use InfluxDB\Point;

abstract class AbstractMeasurement
{
    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var array
     */
    protected $tags = [];

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @return Point
     */
    abstract public function getPoint(): Point;

    /**
     * AbstractMeasurement constructor.
     *
     * @param string $identifier
     * @param array  $tags
     * @param array  $data
     */
    public function __construct($identifier, array $tags = [], array $data = [])
    {
        $this->identifier = $identifier;
        $this->tags       = $tags;
        $this->data       = $data;
    }

    protected function getTime()
    {
        switch (\Config::get('influxdb.precision')) {
            case 's':
                return time();
            case 'n':
                return exec('date +%s%N');
        }
    }

}