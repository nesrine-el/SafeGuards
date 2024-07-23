import ApexCharts from 'apexcharts';

function haversineDistance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Rayon de la Terre en kilomètres
    const dLat = (lat2 - lat1) * (Math.PI / 180);
    const dLon = (lon2 - lon1) * (Math.PI / 180);
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
              Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
              Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
}

async function fetchAndDisplayEarthquakes() {
    document.addEventListener('DOMContentLoaded', async function () {
        let idE = document.getElementById('idEarthquake');
        console.log(idE.value);
        const response = await fetch("http://127.0.0.1:8000/api/earthquakes");
        const earthquakes = await response.json();

        // Séisme central récupéré dynamiquement
        const centralSeismic = earthquakes.find(seismic => seismic.id === parseInt(idE.value, 10));

        if (!centralSeismic) {
            console.error('Séisme central non trouvé');
            return;
        }

        // Rayon en kilomètres
        const radius = 50;

        // Filtrer les séismes dans le rayon spécifié
        const filteredEarthquakes = earthquakes.filter(seismic => {
            const distance = haversineDistance(
                centralSeismic.latitude,
                centralSeismic.longitude,
                parseFloat(seismic.latitude),
                parseFloat(seismic.longitude)
            );
            return distance <= radius;
        });

        // Trier les séismes filtrés par date (du plus récent au plus ancien)
        const sortedByDateEarthquakes = filteredEarthquakes.sort((a, b) => new Date(b.time) - new Date(a.time));

        // Sélectionner les 10 séismes les plus récents
        const top10RecentEarthquakes = sortedByDateEarthquakes.slice(0, 10);

        // Préparer les données pour le graphique
        const series = top10RecentEarthquakes.map(seismic => ({
            name: `Séisme ${seismic.id}`,
            data: [{
                x: `Séisme ${seismic.id}`,
                y: parseFloat(seismic.mag),
                date: new Date(seismic.time).toLocaleString() // Ajout de la date ici
            }]
        }));

        // Créer le graphique
        const options = {
            chart: {
                type: 'bar',
                height: "500px",
                width: "1000px"
            },
            series: series.map(seismic => ({
                name: seismic.name,
                data: seismic.data.map(point => ({
                    x: point.x,
                    y: point.y,
                    date: point.date // Inclure la date dans les données du point
                }))
            })),
            xaxis: {
                type: 'numeric',
                labels: {
                    rotate: -45,
                    style: {
                        colors: '#FFFFFF',  // Couleur des étiquettes de l'axe x
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 600,
                    },
                },
                title: {
                    text: 'Séisme',
                    style: {
                        color: '#FFFFFF'  // Couleur du titre de l'axe x
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Magnitude',
                    style: {
                        color: '#FFFFFF'  // Couleur du titre de l'axe y
                    }
                },
                labels: {
                    style: {
                        colors: '#FFFFFF',  // Couleur des étiquettes de l'axe y
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 600,
                    },
                }
            },
            title: {
                text: 'Top 10 des séismes les plus récents à moins de 50 km',
                style: {
                    color: '#FFFFFF',  // Couleur du titre du graphique
                    fontSize: '16px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                    fontWeight: 600,
                }
            }
        };

        // Render le graphique dans un élément avec l'ID 'chart'
        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
}

fetchAndDisplayEarthquakes();
