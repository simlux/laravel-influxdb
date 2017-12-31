<?php declare(strict_types=1);

namespace Simlux\LaravelInfluxDB;

use Config;
use Log;
use InfluxDB\Client;
use InfluxDB\Point;
use Simlux\LaravelInfluxdb\Measurements\AbstractMeasurement;

class MetricCollector
{
    /**
     * @var Client
     */
    protected $database;

    /**
     * @var Point[]
     */
    protected $points = [];

    /**
     * Gauger constructor.
     */
    public function __construct()
    {
        $this->database = Client::fromDSN(
            sprintf('%s+influxdb://user:pass@%s:%s/%s',
                Config::get('influxdb.protocol'),
                Config::get('influxdb.host'),
                Config::get('influxdb.port'),
                'inspectyourweb'
            )
        );
    }

    /**
     * @param AbstractMeasurement $measurement
     */
    public function addMeasurement(AbstractMeasurement $measurement)
    {
        $this->points[] = $measurement->getPoint();
    }

    /**
     * @param AbstractMeasurement[] $measurements
     */
    public function addMeasurements(array $measurements)
    {
        collect($measurements)->map(function ($measurement) {
            $this->addMeasurement($measurement);
        });
    }

    /**
     * @return bool
     */
    public function fire(): bool
    {
        try {
            return $this->database->writePoints($this->points, Config::get('influxdb.precision'));
        } catch (\Exception $e) {
            Log::error($e->getMessage(), [$e->getFile(), $e->getLine(), $e->getTraceAsString()]);

            return false;
        }
    }
}