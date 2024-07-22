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

        // Séisme central (pour l'exemple, tu devrais le récupérer dynamiquement)
        const centralSeismic = earthquakes[parseInt(idE.value - 1)];
        

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

        // Trier les séismes filtrés par magnitude (du plus grand au plus petit)
        const sortedEarthquakes = filteredEarthquakes.sort((a, b) => b.mag - a.mag);

        // Sélectionner les 10 séismes les plus forts
        const top10Earthquakes = sortedEarthquakes.slice(0, 10);

        // Préparer les données pour le graphique
        const series = top10Earthquakes.map(seismic => ({
            name: `Séisme ${seismic.id}`,
            data: [{ x: `Séisme ${seismic.id}`, y: parseFloat(seismic.mag) }]
        }));

        // Créer le graphique
        const options = {
            chart: {
                type: 'bar'
            },
            series: series,
            xaxis: {
                type: 'category'
            },
            yaxis: {
                title: {
                    text: 'Magnitude'
                }
            },
            title: {
                text: 'Top 10 des séismes les plus forts à moins de 50 km'
            }
        };

        // Render le graphique dans un élément avec l'ID 'chart'
        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
}

fetchAndDisplayEarthquakes();
