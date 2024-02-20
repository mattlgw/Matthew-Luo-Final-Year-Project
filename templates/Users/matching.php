<?php

/**
 * @var string[] $mapboxContents //for content block
 */
echo $this->Html->script('/vendor/bootstrap/function/bootstrap.min.js', ['block' => true]);
echo $this->Html->script('/vendor/bootstrap/function/popper.min.js', ['block' => true]);
echo $this->Html->css('matching.css', ['block' => true]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collapsible Example</title>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
</head>
<body>
<div class="container mt-4">
    <h1 class = "heading">
        Property Address
    </h1>
    <hr>
    <br>
    <p> Input a property address below to get a score based on your lifestyle! </p>
    <br>

    <style>
        /*#geocoderForm {*/
        /*    display: none;*/
        /*}*/
    </style>
    <script
        src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"
          href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
          type="text/css">
    <script
        src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>

    <div id="geocoder1"></div>
    <div id="error-message" style="color: red;"></div> <!--data validation message -->
    <pre id="result"></pre>

    <form id="geocoderForm" style = "display: none">
        <label for="streetNo">Street No:</label>
        <input type="text" id="streetNo" name="streetNo"><br>

        <label for="streetName">Street Name:</label>
        <input type="text" id="streetName" name="streetName"><br>

        <label for="citySuburb">City/Suburb:</label>
        <input type="text" id="citySuburb" name="citySuburb"><br>

        <label for="postcode">Postcode:</label>
        <input type="text" id="postcode" name="postcode"><br>

        <label for="lat">Latitude:</label>
        <input type="text" id="lat" name="lat"><br>

        <label for="long">Longitude:</label>
        <input type="text" id="long" name="long"><br>

        <input type="submit" value="Submit">

    </form>

    <?php echo $this->Form->create(null, [
        'type' => 'post',
        'url' => ['action' => 'score'],
        'id' => 'matching-data'
    ]);
    // Addresses
    echo $this->Form->hidden('address-origin', ['id' => 'address-origin']);
    echo $this->Form->hidden('address-destination', ['id' => 'address-destination']);

    // Specific Address
    echo $this->Form->hidden('travel-mode', ['id' => 'travel-mode']);
    echo $this->Form->hidden('travel-time-desired', ['id' => 'travel-time-desired']);

    // Preferences
    echo $this->Form->hidden('preferences', ['id' => 'preferences']);
    ?>


    <div id="geocoder2"></div>

    <script>
        mapboxgl.accessToken = <?= json_encode($mapboxContents['token']) ?>;
        //Geocoder 2 - Property Address - Origin Address
        const geocoder2 = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            types: 'address,place',
            placeholder: 'Enter property address',
            bbox: [112.9211, -43.7405, 153.6551, -10.9416]
        });

        geocoder2.addTo('#geocoder2');
        geocoder2.on('result', (e) => {
            document.getElementById('address-origin').value = JSON.stringify(e.result);
        });
    </script>
    <!--   Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        //console.log(document.getElementById('address-origin').value);
        const calculateBtn = document.getElementById('calculate-btn');
        calculateBtn.addEventListener('click', () => {


            const travel_mode = document.querySelector('input[name=question2]:checked').value;
            const travel_time = document.querySelector('select[name=travel-time]').value;

            document.getElementById('travel-mode').value = travel_mode;
            document.getElementById('travel-time-desired').value = travel_time;

            document.getElementById('matching-data').submit();

            // const directions = new MapBoxDirections({
            //     accessToken: mapboxgl.accessToken,
            //     unit: 'metric',
            //     profile: travel_mode
            // });
            // directions.setOrigin(addr_origin.center);
            // directions.setDestination(addr_dest.center);
            //
            // directions.on('route', (e) => {
            //     console.log(e);
            // });
        });

    </script>
    <div class = "confirmation">
        <button class="button" id="calculate-btn">Calculate</button>
    </div>
</body>

</html>

<!--Data validation for matching page-->
<script>
    // const matchingForm = document.getElementById('matching-data');
    // const addressOriginInput = document.getElementById('address-origin');
    // //const addressDestinationInput = document.getElementById('address-destination');
    // const errorMessageContainer = document.getElementById('error-message');
    //
    // // Add a submit event listener to the form
    // matchingForm.addEventListener('submit', (event) => {
    //     // Validate the hidden input values
    //     if (!addressOriginInput.value) {
    //     //if (!addressOriginInput.value || !addressDestinationInput.value) {
    //         // Display the error message in the container
    //         errorMessageContainer.textContent = 'Please fill in the property address.';
    //         event.preventDefault(); // Prevent the form from being submitted
    //         return;
    //     } else {
    //         // Clear the error message if values are valid
    //         errorMessageContainer.textContent = '';
    //         // Values are valid, continue with form submission
    //         // Optionally, you can perform additional validation here
    //     }
    // });
</script>
