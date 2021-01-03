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
?>
<html>
    <head>
            <script>
                function getStations() {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        console.log(myobj);
                    }};
                    xmlhttp.open("GET", "getTrainDetails.php", true);
                    xmlhttp.send();
                }
                
            </script>
    </head>
    <body>
        <form action="getTrainsDetails.php" method="GET">
            Select Source Station 
            <select name="sourceStationId">
            <?php
            $resultSet = getStations();
            while($resultArray = $resultSet->fetch_assoc()) {
                echo("<option value=\"$resultArray[station_id]\">$resultArray[station_name]</option>");
            }
            ?>
            </select><br>
            Select Destination Station 
            <select name="destinationStationId">
            <?php
            $resultSet = getStations();
            while($resultArray = $resultSet->fetch_assoc()) {
                echo("<option value=\"$resultArray[station_id]\">$resultArray[station_name]</option>");
            }
            ?>
            </select><br>
            <button>Submit</button>
        </form>
    </body>
</html>