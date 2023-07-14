// Adding a Map
window.onload = (e) => {


let mapOptions = {
    center: [49.815273, 6.129583],
    zoom: 8
}
let map = new L.map('map', mapOptions);
let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
map.addLayer(layer);
let customIcon = {
    iconUrl: "/assets/marker-64.png",
    iconSize: [30, 30]
}
let myIcon = L.icon(customIcon);


// Find markers on click

const streetnumValue = document.getElementsByClassName("houseno-des")[0].getAttribute('data-houseno')
const streetValue = document.getElementsByClassName("street-des")[0].getAttribute('data-street')
const postcodeValue = document.getElementsByClassName("postcode-des")[0].getAttribute('data-postcode')
const localityValue = document.getElementsByClassName("locality-des")[0].getAttribute('data-locality')

    fetch("https://apiv3.geoportail.lu/geocode/search?num=" + streetnumValue + "&street=" + streetValue +
        "&zip=" + postcodeValue + "&locality=" + localityValue).then((response) => {
        return response.json();
    }).then((data) => {
        let Latitude = data.results[0].geomlonlat.coordinates[0]
        let Longitude = data.results[0].geomlonlat.coordinates[1]
        let iconOptions1 = {
            title: "atEvent",
            draggable: false,
            icon: myIcon
        }
// Show marker on the map
        let marker1 = new L.Marker([Longitude, Latitude], iconOptions1);
        marker1.addTo(map)
    });

}