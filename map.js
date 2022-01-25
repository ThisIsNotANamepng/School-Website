mapboxgl.accessToken = 'pk.eyJ1IjoidGhpc2lzYW1hcHJpZ2h0IiwiYSI6ImNreXN4MGpnYjE4MGsyd3BlZG93bzNhbTIifQ.mKGIEzdNo700Y6Gq0Z_DeA';
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11'
});

map.scrollZoom.disable();
