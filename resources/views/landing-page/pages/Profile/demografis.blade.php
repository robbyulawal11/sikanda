@extends('landing-page.layouts.app')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>


@section('content')

<div class="container">
    <p class="py-5"><h1>Demografis Kota Sukabumi</h1></p>
    <div id="map" style="width: 600px; height: 400px;"></div>
    {{-- <div id="population-info" style="position: absolute; top: 10px; right: 10px; background: white; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></div> --}}
  
    <script>
      const map = L.map('map').setView([-6.9370139, 106.9173099], 12);
      const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
      }).addTo(map);
  
      // Fetch GeoJSON data from raw.githubusercontent.com
      fetch('https://raw.githubusercontent.com/JfrAziz/indonesia-district/master/id32_jawa_barat/id3202_sukabumi/id3202180_sukabumi.geojson')
        .then(response => response.json())
        .then(data => {
  
          // Assuming 'population' property exists in GeoJSON features
          const populationData = {};
          for (const feature of data.features) {
            populationData[feature.properties.KECAMATAN] = feature.properties.population; // Replace 'population' with actual property name
          }
  
          // Function to get color based on population value
          const getColor = (d) => {
            return d > 100000
              ? '#800026'
              : d > 50000
                ? '#BD0026'
                : d > 20000
                  ? '#E31A1C'
                  : d > 10000
                    ? '#FC4E2A'
                    : '#FD8D3C';
          };
  
          // Function to style the GeoJSON features
          const style = (feature) => ({
            fillColor: getColor(populationData[feature.properties.KECAMATAN]),
            fillOpacity: 0.7,
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillPattern: null, // Disable pattern for better visibility
          });
  
          // GeoJSON layer with hover event to display population info
          const geojson = L.geoJson(data, { style }).addTo(map);
          geojson.on('eachFeature', (feature, layer) => {
            layer.on({
              mouseover: (e) => {
                const population = populationData[feature.properties.KECAMATAN];
                document.getElementById('population-info').innerHTML = `<b>Kecamatan: ${feature.properties.KECAMATAN}</b><br><b>Population: ${population}</b>`;
              },
              mouseout: () => {
                document.getElementById('population-info').innerHTML = '';
              },
            });
          });
  
          // Add legend (optional)
          // ... (code to add legend using D3)
        });
    </script>
    

    @foreach($profile as $profil)
    <p>{!! $profil->demografi !!}</p>
    @endforeach
</div>
@endsection