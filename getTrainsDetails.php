<?php
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
function getTrains($sourceStationId,$destinationStationId) {
    $connection = getConnection();
    $query = "select train.train_name,train.train_number,train.train_id from train_stop 
    as sourceStationTrainStop INNER join train_stop as destinationeStationTrainStop 
    ON sourceStationTrainStop.train_id = destinationeStationTrainStop.train_id 
    AND sourceStationTrainStop.sequence < destinationeStationTrainStop.sequence INNER JOIN train
    on sourceStationTrainStop.train_id = train.train_id
    WHERE sourceStationTrainStop.station_id = $sourceStationId and destinationeStationTrainStop.station_id = $destinationStationId";
    if($resultSet = mysqli_query($connection, $query)) {
        mysqli_close($connection);
       return $resultSet;
    }
    else {
        die('could not connect to database');
    }
    
}
?>
<html>
    <body>
        <table>
            <tr>
            <th>Train Name</th>
            <th>Train Number</th>
            </tr>
<?php
$sourceStationId = $_REQUEST['sourceStationId'];
$destinationStationId = $_REQUEST['destinationStationId'];
$resultSet = getTrains($sourceStationId, $destinationStationId);
while($resultArray = $resultSet->fetch_assoc()) {
    echo("<tr><td>$resultArray[train_name]</td>");
    echo("<td>$resultArray[train_number]</td></tr>");
}
$resultSet->free();
?>
</table>
    </body>
</html>