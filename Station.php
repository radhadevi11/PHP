<?php
class Station {
    private $stationId;
    private $stationName;
    private $stationCode;

    function __construct($stationId, $stationName, $stationCode) {
        $this->stationId = $stationId;
        $this->staionName = $stationName;
        $this->stationCode = $stationCode;
    }
    function getStationId() {
        return $this->stationId;
    }
    function getStationName() {
        return $this->stationName;
    }
    function getStationCode() {
        return $this->stationCode;
    }
    public function __toString() {
        return " ID:$this->stationId,Name:$this->stationName,Code:$this->stationCode";
    }
}