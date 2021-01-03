function getStations() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var stationsJsonArray = JSON.parse(this.responseText);
        var stations = [];
        for(let i=0; i<stationsJsonArray.length;i++){
           stations.push(new Station(stationsJsonArray[i].stationName));
        }
        console.log("stations array from getStations"+stations);
        return stations;
    }};
    xmlhttp.open("GET", "getStations.php", true);
    xmlhttp.send();
}