<?php
include('Station.php');
function getConnection() {
    $user = "root";
    $password = "";
    $dbName = "railway";
    $connection = mysqli_connect('localhost',$user,$password,$dbName);
    if(!$connection) {
        die('could not connect to database');
    }
    return $connection;
}
function getStations() {
    $connection = getConnection();
    $query = "select * from station order by station_name";
    if($resultSet = mysqli_query($connection, $query)) {
        mysqli_close($connection);
        return $resultSet;
    }
    else {
        die('could not connect to database');
    }
    
}
/*function getStationsArray() {
    $stations = [];
    $resultSet = getStations();
    while($resultArray = $resultSet->fetch_assoc()) {
       $stations += [$resultArray['station_id']=>$resultArray['station_name']];
    }
    return $stations;
}*/
function getStationsArray() {
    $stations = [];
    $resultSet = getStations();
    while($resultArray = $resultSet->fetch_assoc()) {
       $station = new Station($resultArray['station_id'],
                                $resultArray['station_name'],
                                $resultArray['station_code']);
        //echo($station);
        array_push($stations,$station);                               
    }
    /*foreach($stations as $station) {
        echo($station);
    }*/
    return $stations;
}

echo(json_encode(getStationsArray()));
?>