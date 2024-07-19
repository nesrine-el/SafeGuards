/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */



import './styles/app.scss';

// leaflet
import  'leaflet';


// pour le js de bootstrap, importer les composants utilisés !
import { Dropdown } from 'bootstrap';

// leaflet map
// ATTENTION QUENTIN PROD CHANGER 
if (document.location.href == "http://127.0.0.1:8000/" || document.location.href.includes("http://127.0.0.1:8000/?")  ) {
    var map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 10,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map); 

    // recuperer donnees de la page api/earthquakes
    async function fetchandDisplayEarthquakes() {
        const reponse = await fetch("http://127.0.0.1:8000/api/earthquakes");
        const earthquakes = await reponse.json();
        earthquakes.forEach(earthquake => {
            var circle = L.circle([earthquake["latitude"], earthquake["longitude"]], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 10000
            }).addTo(map);
        });
      }

      fetchandDisplayEarthquakes();

    //creer des cercles sur la map avec ce jason



}

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
