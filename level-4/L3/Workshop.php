<?php

class Workshop
{
    private $paint_job_station;
    private $engine_repair_station;
    private $body_repair_station;

    public function __construct(
        $paint_job_station,
        $engine_repair_station,
        $body_repair_station
    )
    {
        $this->paint_job_station = $paint_job_station;
        $this->engine_repair_station = $engine_repair_station;
        $this->body_repair_station = $body_repair_station;
    }

    public function getPaintJobStation()
    {
        return $this->paint_job_station;
    }

    public function getEngineRepairStation()
    {
        return $this->engine_repair_station;
    }

    public function getBodyRepairStation()
    {
        return $this->body_repair_station;
    }
}