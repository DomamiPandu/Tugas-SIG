<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map { height: 600px; }
    </style>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
    <body>
        <div id="map"></div>
        <script>
            var map = L.map('map').setView([-0.3155398750904368, 117.1371634207888], 5);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ maxZoom: 5,
              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);


            let data = {!! file_get_contents("https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.json")!!};
            console.log(data);

            let gempa = data.Infogempa.gempa;

            gempa.forEach(gempa =>{
                let koordinat = gempa.Coordinates.split(",");
                let lat = koordinat[0];
                let long = koordinat[1];
                let number = 1;

                let marker = L.marker([lat, long]).addTo(map);

                marker.bindPopup(number + ") " +
                    "Tanggal: " + gempa.Tanggal + "<br>" +
                    "Jam: " + gempa.Jam + "<br>" +
                    "Magnitudo: " + gempa.Magnitude + "<SR>" + "<br>" +
                    "Wilayah: " + gempa.Wilayah + "<br>" +
                    "Potensi: " + gempa.Potensi + "<br>" );
                number++;
            })
        </script>
    </body>
</html>