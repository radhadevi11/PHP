function getStations(onStationsReady) {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var stations = [];
        var stationsJsonArray = JSON.parse(this.responseText);
        for(let i=0; i<stationsJsonArray.length;i++){
           stations.push(new Station(stationsJsonArray[i].stationName));
        }
        console.log("stations array from getStations"+stations);
        onStationsReady(stations);
    }};
    xmlhttp.open("GET", "getStations.php", true);
    xmlhttp.send();
}