<?php

/**
 * @var\App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category>$categories
 * @var iterable<\App\Model\Entity\SubCategory>$subCategories
 * @var string[] $mapboxContents //for content block
 */

echo $this->Html->script('/vendor/bootstrap/function/bootstrap.min.js', ['block' => true]);
echo $this->Html->css('score.css', ['block' => true]);
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Collapsible Example</title>
<body>
<!--Mapbox Directions API-->
<head>
    <meta charset='utf-8' />
    <title>Getting started with the Mapbox Directions API</title>
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        #map {
            position: relative;
            top: 0;
            bottom: 0;
            width: 100%;
        }
        .marker {
            background-image: url('/img/Gemino/logo/g-pin.png');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .mapboxgl-popup {
            max-width: 200px;
        }
        .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<div>
<div id = 'mapContainer'>
    <div id='map'></div>
</div>

<div class = "pin-container">
    <?= $this->Html->image('/img/Gemino/logo/g-pin.png') ?>
</div>

<?php
// Storing Origin and Destination Addresses from Lifestyle.php & Matching.php as JSON to pass into Mapbox API script
$addressOrigin = json_decode($this->request->getData('address-origin'))->center;                                            // Stores the retrieved Origin Address coordinates from JSON request
$addressOriginJson = json_encode($addressOrigin);                                                                           // Encodes Origin Address coordinates for Mapbox API script
if (json_decode($this->request->getData('address-destination')) != null) {                                                  // Checks if a Specific Location was filled in
    $addressDestination = json_decode($this->request->getData('address-destination'))->center;                              // Stores the retrieved Destination Address coordinates from JSON request
    $addressDestinationJson = json_encode($addressDestination);                                                             // Encodes Destination Address coordinates for Mapbox API script
    $addressCenter = [($addressOrigin[0] + $addressDestination[0]) / 2, ($addressOrigin[1] + $addressDestination[1]) / 2];  // Stores the middle coordinates between Origin & Destination Address as the Center of the map
} else {                                                                                                                    // No Specific Location was filled in
    $addressDestinationJson = 'null';                                                                                       // Mapbox API script reads no destination value
    $addressCenter = [$addressOrigin[0], $addressOrigin[1]];                                                                // Stores the Origin Address coordinates as the Center of the map if no second address was provided
}
// Mapbox boundary box requires a set of 2 coordinates to map the size of the box
$addressCenterJson = json_encode($addressCenter);
$addressBounds1 = [$addressCenter[0]-1, $addressCenter[1]-1];                                                               // minBoundaryCoordinates
$addressBounds2 = [$addressCenter[1]+1, $addressCenter[1]+1];                                                               // maxBoundaryCoordinates
$addressBounds1Json = json_encode($addressBounds1);                                                                         // Encodes minBoundaryCoordinates for Mapbox API script
$addressBounds2Json = json_encode($addressBounds2);                                                                         // Encodes maxBoundaryCoordinates for Mapbox API script
$travelMode = json_encode($this->request->getData('travel-mode'));                                                          // Retrieves the travel mode between the two addresses for map rendering

// Preferences
$preferences = json_decode($this->request->getData('preferences'));
if (json_decode($this->viewVars['preferenceCoordJson']) != null) {
    $prefCoord = json_decode($this->viewVars['preferenceCoordJson'])[0];
}
$preferenceCoordJson = json_encode($this->viewVars['preferenceCoordJson']);
?>

<script>
    mapboxgl.accessToken = <?= json_encode($mapboxContents['token']) ?>;
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v12',
        center: <?= $addressCenterJson ?>,
        zoom: 12                                // Change Zoom render based on Travel time (e.g. 5 min = zoom 15, 30 min = zoom 10)
    });

    // set the bounds of the map
    const bounds = [
        <?= $addressBounds1Json ?>,
        <?= $addressBounds2Json ?>
    ];
    map.setMaxBounds(bounds);
    // an arbitrary start will always be the same
    // only the end or destination will change
    const start = <?= $addressOriginJson ?>;                         // Dynamic Property address set by the User's input in matching.php
    const end = <?= $addressDestinationJson ?>;                      // Dynamic Specific Location address set by the User's input in lifestyle.php
    const travelMode = <?= $travelMode ?>;                           // Dynamic Travel mode set by the User's input in lifestyle.php
    // create a function to make a directions request
    async function getRoute() {
        // make a directions request using cycling profile
        // an arbitrary start will always be the same
        // only the end or destination will change
        const query = await fetch(
            `https://api.mapbox.com/directions/v5/${travelMode}/${start[0]},${start[1]};${end[0]},${end[1]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`,
            { method: 'GET' }
        );
        const json = await query.json();
        const data = json.routes[0];
        const route = data.geometry.coordinates;
        const geojson = {
            type: 'Feature',
            properties: {},
            geometry: {
                type: 'LineString',
                coordinates: route
            }
        };
        // if the route already exists on the map, we'll reset it using setData
        if (map.getSource('route')) {
            map.getSource('route').setData(geojson);
        }
        // otherwise, we'll make a new request
        else {
            map.addLayer({
                id: 'route',
                type: 'line',
                source: {
                    type: 'geojson',
                    data: geojson
                },
                layout: {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                paint: {
                    'line-color': '#3887be',
                    'line-width': 5,
                    'line-opacity': 0.75
                }
            });
        }
        // add turn instructions here at the end
    }

    const preferenceCoords = <?= $preferenceCoordJson ?>;

    // Configuring the Map
    map.on('load', () => {
        // Render route between Start and End coordinates
        getRoute();

        //map.loadImage(
        //    <?php //= $this->Html->image('/img/Gemino/logo/g-pin.png', ['alt'=> "logo", 'class' => 'pin']) ?>
        //)
        // Add the image to the map layer
        //map.addImage('pin', image);

        // Add Property pin to the map
        map.addLayer({
            id: 'point',
            // type: 'symbol',
            type: 'circle',
            source: {
                type: 'geojson',
                data: {
                    type: 'FeatureCollection',
                    features: [
                        {
                            type: 'Feature',
                            properties: {},
                            geometry: {
                                type: 'Point',
                                coordinates: start
                            }
                        }
                    ]
                }
            },
            paint: {
                'circle-radius': 10,
                'circle-color': '#3887be'
            }
            // layout: {
                // 'icon-image': 'pin',
                // 'icon-size': 0.25
            // }
        });

        // Add Specific Location pin to the map
        map.addLayer({
            id: 'end',
            type: 'circle',
            source: {
                type: 'geojson',
                data: {
                    type: 'FeatureCollection',
                    features: [
                        {
                            type: 'Feature',
                            properties: {},
                            geometry: {
                                type: 'Point',
                                coordinates: end
                            }
                        }
                    ]
                }
            },
            paint: {
                'circle-radius': 10,
                'circle-color': '#f30'
            }
        });
    });

    // add Gemino markers to map
    for (const coordinates of preferenceCoords) {
        // create a HTML element for each feature
        console.log(coordinates);
        map.addLayer({
            id: 'end',
            type: 'circle',
            source: {
                type: 'geojson',
                data: {
                    type: 'FeatureCollection',
                    features: [
                        {
                            type: 'Feature',
                            properties: {},
                            geometry: {
                                type: 'Point',
                                coordinates: coordinates
                            }
                        }
                    ]
                }
            },
            paint: {
                'circle-radius': 10,
                'circle-color': '#f30'
            }
        });
    }
</script>
</body>

<div class="skipsection">
    <form action="">
        <hr>
        <div class="overall">

            <h1>Overall Score:</h1>

            <div class="score-card">
                <?php if (isset($avgScore)) : ?>
                    <h2><?= $avgScore ?>%</h2>
                <?php else : ?>
                    <h2>N/A</h2>
                <?php endif; ?>

            </div>

        </div>

        <hr>

        <h1 style="padding: 15px">Detail Scores</h1>

        <!--Detail Score Loop -->
        <?php foreach ($categories as $category): ?>
            <?php $index = $category->id - 1; ?>

            <div class="category-score">

                <div class="icon-heading">
                    <label class="score-img bg-<?= $category->id ?>">
                        <?= $this->Html->image('/img/Gemino/SVG/' . $category->name . '.svg', ['alt' => 'lifestyle logo']); ?>
                    </label>
                    <h2><?= h($category->name) ?>:</h2>

                </div>


                <div class="detail-score-card">
                    <?php if (isset($totalMatchScore[$index])) : ?>
                        <p class="output-result"><?= $totalMatchScore[$index] ?>%</p>
                    <?php else : ?>
                        <p>N/A</p>
                    <?php endif; ?>
                </div>

            </div>


        <?php endforeach; ?>

        <!--Specific Address -->

        <div class="category-score">

            <div class="icon-heading">
                <label class="score-img bg-address">
                    <?= $this->Html->image('/img/Gemino/SVG/address-active.svg', ['alt' => 'lifestyle logo']); ?>
                </label>
                <h2>Specific Location: </h2>

            </div>


            <div class="detail-score-card">
                <?php if (isset($matchScoreSpecific)) : ?>
                    <p class="output-result"><?= $matchScoreSpecific ?>%</p>
                <?php else : ?>
                    <p>N/A</p>
                <?php endif; ?>
            </div>

        </div>

        <hr>


        <style>
            .input[readonly] {
                font-weight: bold;
                font-size: 21px;
            }
        </style>


    </form>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
