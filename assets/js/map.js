

if (document.location.href == "http://127.0.0.1:8000/" || document.location.href.includes("http://127.0.0.1:8000/?")  ) {
    
    var map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 10,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map); 

    // recuperer donnees de la page api/earthquakes
    async function fetchAndDisplayEarthquakes() {
        const reponse = await fetch("http://127.0.0.1:8000/api/earthquakes");
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
            
            var circle = L.circle([earthquake["latitude"], earthquake["longitude"]], {
                color: color,
                fillColor: color,
                fillOpacity: 0.4,
                radius: earthquake["mag"] * 10000 * coeff
            }).addTo(map).on("click", circleClick);

            function circleClick(e) {
                var clickedCircle = e.target;
                console.log(img_path);
              clickedCircle.bindPopup(`
              <h3>Tremblement de terre</h3>
              <div class='d-flex justify-content-center'> 
                <img src=  ${document.getElementById("img_path").value} />
              </div> 
              <p>La magnétude de ce tremblement de terre est de ${earthquake["mag"]} sur l'échelle de Reichter. </p>
              <a class='btn btn-primary' style='color:white' href="http://127.0.0.1:8000/earthquake/${earthquake["id"]}">Voir en détail</a>
              `)
              .openPopup();
            }
        });
        
      }

    // va chercher les 1000 derniers earthquakes
    fetchAndDisplayEarthquakes();

    // recuperer la prediction de la page api/earthquakes/prediction/lat/$lat/long/$long
    async function fetchAndDisplayPredictions(lat ,long, e) {
        const reponse = await fetch(`http://127.0.0.1:8000/api/earthquakes/prediction/lat/${lat}/long/${long}`);
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