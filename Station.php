<?php
class Station implements JsonSerializable  {
    private $stationId;
    private $stationName;
    private $stationCode;

    function __construct($stationId, $stationName, $stationCode) {
        $this->stationId = $stationId;
        $this->stationName = $stationName;
        $this->stationCode = $stationCode;
    }
    public function getStationId() {
        return $this->stationId;
    }
    public function getStationName() {
        return $this->stationName;
    }
    public function getStationCode() {
        return $this->stationCode;
    }
    public function __toString() {
        return " ID:$this->stationId,Name:$this->stationName,Code:$this->stationCode";
    }
    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
}