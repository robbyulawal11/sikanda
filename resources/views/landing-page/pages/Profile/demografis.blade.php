@extends('landing-page.layouts.app')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<style>
    #map {
        height: 500px;
    }

    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }

    .legend {
        text-align: left;
        line-height: 18px;
        color: #555;
    }

    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }
</style>

@section('content')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 800px;">
                <h6 class="text-primary text-uppercase">Profil Dekranasda</h6>
                <h2 class="display-5 text-uppercase mb-0">Demografis <br> Kota Sukabumi</h2>
            </div>
        </div>
    </div>


    <div class="container">
        <div id="map" style="height: 400px;"></div>
        {{-- <div id="population-info"
            style="position: absolute; top: 10px; right: 10px; background: white; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div> --}}

        <script>
            const map = L.map('map').setView([-6.9370139, 106.9173099], 12);
            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            }).addTo(map);

            const info = L.control();

            info.onAdd = function(map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function(props) {
                const contents = props ? `<b>Kecamatan ${props.district}</b><br />${props.padat} penduduk / ha` :
                    'Arahkan Kursor di Kecamatan yang Dipilih';
                this._div.innerHTML = `<h4>Peta Kepadatan Penduduk</h4>${contents}`;
            };

            info.addTo(map);

            // Function to get color based on population density value
            function getColor(d) {
                return d > 130 ? '#800026' :
                    d > 100 ? '#BD0026' :
                    d > 80 ? '#E31A1C' :
                    d > 50 ? '#FC4E2A' :
                    '#FD8D3C';
            }

            function style(feature) {
                return {
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7,
                    fillColor: getColor(feature.properties.padat)
                };
            }

            function highlightFeature(e) {
                const layer = e.target;

                layer.setStyle({
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0.7
                });

                layer.bringToFront();
                info.update(layer.feature.properties);
            }

            function resetHighlight(e) {
                geojson.resetStyle(e.target);
                info.update();
            }

            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }

            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }

            fetch('https://raw.githubusercontent.com/hudiyaresa/sukabumi-geojson/main/sukabumikec.geojson')
                .then(response => response.json())
                .then(data => {
                    geojson = L.geoJson(data, {
                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                });

            const legend = L.control({
                position: 'bottomright'
            });

            legend.onAdd = function(map) {
                const div = L.DomUtil.create('div', 'info legend');
                const grades = [0, 50, 80, 100, 130];
                const labels = ['Penduduk / HA'];
                let from, to;

                for (let i = 0; i < grades.length; i++) {
                    from = grades[i];
                    to = grades[i + 1];

                    labels.push(
                        `<i style="background:${getColor(from + 1)}"></i> ${from}${to ? `&ndash;${to}` : '+'}`
                    );
                }

                div.innerHTML = labels.join('<br>');
                return div;
            };

            legend.addTo(map);
        </script>


        @foreach ($profile as $profil)
            <p>{!! $profil->demografi !!}</p>
        @endforeach

    </div>
@endsection
