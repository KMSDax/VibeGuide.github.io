<?php
include_once 'header.php';
?>
<div class="banner-area">
    <h2>VIBE GUIDES</h2>
    </a>
</div>
<div class="content-area">
    <div class="wrapper">
        <h2>Discover Your Vibe</h2>
        <!-- Load the `mapbox-gl-geocoder` plugin. -->

        <div id="newmap" style="height:1000px; width:100%;"></div>


        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiY3lzYXZhZ2UiLCJhIjoiY2xla2NpY2Z4MGpidjN3bnpoc2hub3ZjbyJ9.hO_U__2LAtHISSBt-osFCQ';
            const newmap = new mapboxgl.Map({
                container: 'newmap',
                // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [-73.2412, 40.8820],
                zoom: 10,
                maxBounds: [
                    [-74.390144, 40.427784], // Southwest coordinates
                    [-71.856225, 41.423031]  // Northeast coordinates
                ]
            });

            newmap.on('load', () => {
                navigator.geolocation.getCurrentPosition(position => {
                    const { longitude, latitude } = position.coords;
                    newmap.flyTo({ center: [longitude, latitude], zoom: 15 });

                    new mapboxgl.Marker()
                        .setLngLat([longitude, latitude])
                        .addTo(newmap);


                    // Define a bounding box for Long Island
                    const bbox = [-73.7639, 40.5664, -71.8764, 41.1592];


                    // Add the geocoder control to the map with the bbox option
                    newmap.addControl(
                        new MapboxGeocoder({
                            accessToken: mapboxgl.accessToken,
                            mapboxgl: mapboxgl,
                            bbox: bbox,
                            position: 'top-left' // set geocoder position to top-left
                        }),
                        'top-left' // specify position on the map to add the geocoder control
                    );

                }, error => {
                    console.error(error);
                });
            });
        </script>

    </div>
</div>

</body>


<?php
include_once 'footer.php';
?>