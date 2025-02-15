let path;
if (document.location.href.includes("http://127.0.0.1:8000")) {
    path = 'http://127.0.0.1:8000';
} else {
    path = 'http://www.safeguards.aah.ovh';
}



if (document.location.href == `${path}/` || document.location.href.includes(`${path}/?`) || document.location.href.includes(`${path}/map`) || document.location.href.includes(`${path}/earthquake`) ) {
    
    let lat = document.getElementById('map').dataset.lat ? parseFloat(document.getElementById('map').dataset.lat) : 0
    let long = document.getElementById('map').dataset.long ? parseFloat(document.getElementById('map').dataset.long) : 0

    let map = L.map('map').setView([lat, long],200);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 5,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map); 
    
    let legend = L.control({position: 'topright'});
    legend.onAdd = function (map) {

    let div = L.DomUtil.create('div', 'map-legend');
    let labels = ['<strong>Magnétude</strong>'];
    let titleMagnetude = ['< 2','> 2','> 4','> 6'];
    let titleColor = ['yellow','orange','red','purple'];

    for (let i = 0; i < titleMagnetude.length; i++) {

            div.innerHTML += 
            labels.push(
                `<i style="color: ${titleColor[i]} "> ${titleMagnetude[i]} </i>` 
            );

        }
        div.innerHTML = labels.join('<br>');
    return div;
    };
    legend.addTo(map);

    // recuperer donnees de la page api/earthquakes
    async function fetchAndDisplayEarthquakes() {
        const reponse = await fetch(`${path}/api/earthquakes`);
        const earthquakes = await reponse.json();
        earthquakes.forEach(earthquake => {
            
            let color = 'yellow';
            let coeff = 2;
            if (parseFloat(earthquake["mag"]) > 2 ) {
                color = 'orange';
                coeff = 4;
            }
            if (parseFloat(earthquake["mag"])  > 4) {
                color = 'red';
                coeff = 6;
            }
            if (parseFloat(earthquake["mag"])  > 6) {
                color = 'purple';
                coeff = 12;
            }
            
            let circle = L.circle([earthquake["latitude"], earthquake["longitude"]], {
                color: color,
                fillColor: color,
                fillOpacity: 0.4,
                radius: earthquake["mag"] * 10000 * coeff
            }).addTo(map).on("click", circleClick);

            function circleClick(e) {

                let clickedCircle = e.target;

              clickedCircle.bindPopup(`
              <h3>Tremblement de terre</h3>
              <div class='d-flex justify-content-center'> 
               <img src=  ${document.getElementById("img_path").value} />
              </div> 
              <p>La magnétude de ce tremblement de terre est de ${earthquake["mag"]} sur l'échelle de Reichter. </p>
              <a class='btn btn-primary' style='color:white' href="${path}/earthquake/${earthquake["id"]}">Voir en détail</a>
              `)
              .openPopup();
            }
        });
        
      }

    // va chercher les 1000 derniers earthquakes
    fetchAndDisplayEarthquakes();

    // recuperer la prediction de la page api/earthquakes/prediction/lat/$lat/long/$long
    async function fetchAndDisplayPredictions(lat ,long, e) {
        const reponse = await fetch(`${path}/api/earthquakes/prediction/lat/${lat}/long/${long}`);
        const prediction = await reponse.json();
        popup
        .setLatLng(e.latlng)
        .setContent("Le prochain tremblement de terre ici sera " + prediction + " sur l'échelle de Reichter")
        .openOn(map);


      }

    // click sur la map , lance un pop-up de la prédiction
      let popup = L.popup();
      function onMapClick(e) {
          let lat = e.latlng.lat;
          let long = e.latlng.lng;
          fetchAndDisplayPredictions(lat ,long, e);
        
           
    }

    // click sur la map
    map.on('click', onMapClick);
    

}