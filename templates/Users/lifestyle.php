<?php

/**
 * @var\App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category>$categories
 * @var iterable<\App\Model\Entity\SubCategory>$subCategories
 * @var iterable<\App\Model\Entity\Transport>$transports
 * @var string[] $mapboxContents //for content block
 */
echo $this->Html->script('/vendor/bootstrap/js/bootstrap.min.js', ['block' => true]);
echo $this->Html->css('lifestyle.css', ['block' => true]);
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
<div class="container mt-4 lifestyle-main">
    <h1 class = "heading">
        Lifestyle Profile
    </h1>
    <hr>
    <br>
    <p> Select categories that are important to have nearby </p>
    <br>

    <!--Dynamic Form -->
    <?php foreach ($categories as $category): ?>
        <div class="lifestyle-heading">
            <h2>
                <!-- example category_1 = Transport -->
                <input type="radio" class="btn-check" name="maincategory_icon_<?= $category->id ?>" id="category_data_<?= $category->id ?>" autocomplete="off" value="transport">
                <label class="heading-icon bg-<?= $category->id ?>  collapsed" data-toggle="collapse" data-target="#category_<?= $category->id ?>" aria-expanded="false" aria-controls="category_<?= $category->id ?>">
                    <?= $this->Html->image('/img/Gemino/SVG/' . $category->name . '.svg', ['alt' => 'lifestyle logo']); ?>
                </label>
                <?= h($category->name) ?> <!-- output category title here-->
            </h2>
            <br>
        </div>

        <!--example id = category_1 means Transport from Categories entity -->
        <div class="sub_category collapse" id="category_<?= $category->id ?>" >
            <div class="container mt-4">
                <?php foreach ($category->sub_categories as $sub_category): ?>
                    <div class="question-main">
                        <div class="lifestyle-icon">
                            <!-- Example for input id = sub_category_1 means Train look at the database -->
                            <!-- Example for name = category_icon_1 means it belongs in Transport Category -->
                            <input type="radio" class="btn-check radio-category-icon" name="category_icon_<?= $category->id ?>" id="sub_category_data_<?= $sub_category->id ?>" autocomplete="off" value="<?= $sub_category->name ?>">
                            <!-- example for data-target = "#sub_data_1" means sub category 1 which is Train -->
                            <label class="sub-icon-btn bg-<?= $category->id ?>" for="sub_category_<?= $sub_category->id ?>" data-group ="<?= $category->id ?>" data-toggle="collapse" data-target="#sub_data_<?= $sub_category->id ?>">
                                <?= $this->Html->image('/img/Gemino/SVG/' . $sub_category->name . '.svg', ['alt' => 'lifestyle logo']) ?>
                            </label>
                            <p> <?= h($sub_category->name) ?> </p>
                        </div>
                    </div>
                    <!-- Collapsible Content for entering travel time and transportation-->
                    <!-- example for id = "#sub_data_1" means sub category 1 which is Train -->
                    <!--example data-parent = #category_1 means Transport from Categories entity -->
                    <div class="collapse indent" id="sub_data_<?= $sub_category->id ?>" data-parent="#category_<?= $category->id ?>">
                        <div class="travel">
                            <div class="form-inline">
                                <label>Max Travel Time</label>
                                <div class="input-with-unit">

                                    <select class="form-select-sm" type="number" id="sub_category_<?= $sub_category->id ?>_time" name="category_<?= $category->id ?>_time">
                                        <option value = "0" selected disabled > Please Select </option>
                                        <option value = "5" > 5 </option>
                                        <option value = "10" > 10 </option>
                                        <option value = "15" > 15 </option>
                                        <option value = "20" > 20 </option>
                                        <option value = "25" > 25 </option>
                                        <option value = "30" > 30 </option>
                                        <option value = "35" > 35 </option>
                                        <option value = "40" > 40 </option>
                                        <option value = "45" > 45 </option>
                                        <option value = "50" > 50 </option>
                                        <option value = "55" > 55 </option>
                                        <option value = "60" > 60 </option>
                                    </select>
                                </div>
                                <label> min by</label>
                            </div>
                            <div class="container mt-4">
                                <div class="question">
                                    <div class = "icon-container">
                                        <!-- example for input, name = "sub_data_1" means subcategory 1 which is Train -->
                                        <!-- example for input, id = "sub_category_1_car means subcategory 1 for car which is Train -->
                                        <input type="radio" class="btn-check btn-sub-data" name="sub_data_<?= $sub_category->id ?>" id="sub_category_<?= $sub_category->id?>_car" subcategory_api="<?= $sub_category->api_name ?>" transport_id="1" data-travel-field="#sub_category_<?= $sub_category->id ?>_time" autocomplete="off" value="mapbox/driving">
<!--                                        <input type="radio" class="btn-check btn-sub-data" name="sub_data_--><?php //= $sub_category->id ?><!--" id="sub_category_--><?php //= $sub_category->id?><!--_car" data-travel-field="#sub_category_--><?php //= $sub_category->id ?><!--_time" data-subcategory-field="--><?php //= $sub_category->api_name ?><!--" autocomplete="off" value="mapbox/driving">-->
                                        <label class="btn btn-outline-success" for="sub_category_<?= $sub_category->id?>_car">
                                            <?= $this->Html->image('/img/Gemino/SVG/car-selected.svg', ['alt' => "lifestyle logo"])?>
                                        </label>
                                        <p>Car</p>
                                    </div>

                                    <div class="icon-container">
                                        <input type="radio" class="btn-check btn-sub-data" name="sub_data_<?= $sub_category->id ?>" id = "sub_category_<?= $sub_category->id?>_walk" subcategory_api="<?= $sub_category->api_name ?>" transport_id="2" data-travel-field="#sub_category_<?= $sub_category->id ?>_time" autocomplete="off" value="mapbox/walking" >
<!--                                        <input type="radio" class="btn-check btn-sub-data" name="sub_data_--><?php //= $sub_category->id ?><!--" id = "sub_category_--><?php //= $sub_category->id?><!--_walk" data-travel-field="#sub_category_--><?php //= $sub_category->id ?><!--_time"  data-subcategory-field="--><?php //= $sub_category->api_name ?><!--" autocomplete="off" value="mapbox/walking" >-->
                                        <label class="btn btn-outline-success" for="sub_category_<?= $sub_category->id?>_walk">
                                            <?= $this->Html->image('/img/Gemino/SVG/walk-selected.svg', ['alt' => "lifestyle logo"])?>
                                        </label>
                                        <p>Walk</p>
                                    </div>

                                    <div class="icon-container">
                                        <input type="radio" class="btn-check btn-sub-data" name="sub_data_<?= $sub_category->id ?>" id = "sub_category_<?= $sub_category->id?>_bicycle" subcategory_api="<?= $sub_category->api_name ?>" transport_id="3" data-travel-field="#sub_category_<?= $sub_category->id ?>_time" autocomplete="off" value="mapbox/cycling" >
<!--                                        <input type="radio" class="btn-check btn-sub-data" name="sub_data_--><?php //= $sub_category->id ?><!--" id = "sub_category_--><?php //= $sub_category->id?><!--_bicycle" data-travel-field="#sub_category_--><?php //= $sub_category->id ?><!--_time"  data-subcategory-field="--><?php //= $sub_category->api_name ?><!--" autocomplete="off" value="mapbox/cycling" >-->
                                        <label class="btn btn-outline-success" for="sub_category_<?= $sub_category->id?>_bicycle">
                                            <?= $this->Html->image('/img/Gemino/SVG/bicycle-selected.svg', ['alt' => "lifestyle logo"])?>
                                        </label>
                                        <p>Bicycle</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <hr>

    <!--Specific Location-->
    <div class = "lifestyle-heading">
        <h2>
            <label class="heading-icon bg-address collapsed" data-toggle="collapse" data-target="#address" aria-expanded="false" aria-controls="address">
                <?= $this->Html->image('/img/Gemino/SVG/address-active.svg', ['alt' => 'lifestyle logo'],); ?>
            </label>
            Specific Location
        </h2>
        <br>
    </div>
    <div class="collapse address-container" id = "address">
        <div class = "container mt-4 ">

            <!-- this form is hidden from view-->
            <div id="error-location-name" style="color: red;"></div>
            <input class="form-control" style="width: 300px;" id = "location-name" placeholder="Enter name e.g. work"><br>

            <div id="error-address" style="color: red;"></div>
            <div id="geocoder1"></div>
            <pre id="result"></pre>

            <div class="geocoder-container">
                <div id="geocoder2"></div>
            </div>

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
                'url' => ['action' => 'matching'],
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

            <br><br>
            <div id="error-time" style="color: red;"></div>
            <label>
                Max Travel Time
                <select class="form-select-sm" name="travel-time">
                    <option value = "0" selected disabled > Please Select </option>
                    <option value = "300" > 5 </option>
                    <option value = "600" > 10 </option>
                    <option value = "900" > 15 </option>
                    <option value = "1200" > 20 </option>
                    <option value = "1500" > 25 </option>
                    <option value = "1800" > 30 </option>
                    <option value = "2100" > 35 </option>
                    <option value = "2400" > 40 </option>
                    <option value = "2700" > 45 </option>
                    <option value = "3000" > 50 </option>
                    <option value = "3300" > 55 </option>
                    <option value = "3600" > 60 </option>
                </select>
                min by:
            </label>

            <br><br>

            <div id="error-travel" style="color: red;"></div>
            <div class="question">
                <!--New icon -->
                <div class = "icon-container">
                    <input type="radio" class="btn-check" name="question2" id="question2-option1" autocomplete="off"
                           value="mapbox/driving">
                    <label class="btn btn-primary" for="question2-option1">
                        <?= $this->Html->image('/img/Gemino/SVG/car-selected.svg', ['alt' => "lifestyle logo"]) ?>
                    </label>
                    <p>Car</p>
                </div>

                <div class="icon-container">
                    <input type="radio" class="btn-check" name="question2" id="question2-option3" autocomplete="off"
                           value="mapbox/walking">
                    <label class="btn btn-outline-success" for="question2-option3">
                        <?= $this->Html->image('/img/Gemino/SVG/walk-selected.svg', ['alt' => "lifestyle logo"]) ?>
                    </label>
                    <p>Walk</p>
                </div>

                <div class="icon-container">
                    <input type="radio" class="btn-check" name="question2" id="question2-option4" autocomplete="off"
                           value="mapbox/cycling">
                    <label class="btn btn-outline-success" for="question2-option4">
                        <?= $this->Html->image('/img/Gemino/SVG/bicycle-selected.svg', ['alt' => "lifestyle logo"]) ?>
                    </label>
                    <p>Bicycle</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div id="error-message" style="color: red;"></div> <!--error message if specific location is not field -->
    <div class = "confirmation">
        <button class="button" id="calculate-btn">Next</button>
    </div>
</div>

<!--Highlight active color for selected sub-category -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var labels = document.querySelectorAll('.sub-icon-btn');
        labels.forEach(function(label) {
            label.addEventListener('click', function() {
                var group = label.getAttribute('data-group');
                labels.forEach(function(lbl) {
                    if (lbl.getAttribute('data-group') === group) {
                        lbl.classList.remove('active');
                    }
                });
                label.classList.add('active');
            });
        });
    });
</script>

<!--Data validation for specific location -->
<script>
    const matchingForm = document.getElementById('matching-data');
    const addressOriginInput = document.getElementById('address-origin');
    const addressDestinationInput = document.getElementById('address-destination');
    const travelModeInput = document.getElementById('travel-mode');
    // const travelTimeDesiredInput = document.getElementById('travel-time-desired');
    const locationNameInput = document.getElementById('location-name');
    const errorMessageLocationName = document.getElementById('error-location-name');
    const errorMessageAddress = document.getElementById('error-address');
    const errorMessageTravelTime = document.getElementById('error-time');
    const errorMessageTravelMode = document.getElementById('error-travel');
    const errorMessageContainer = document.getElementById('error-message');

    // Add a submit event listener to the form
    function validateField(field, errorMessage, errorMessageContainer) {
        if (!field.value) {
            // Display the error message in the container
            errorMessageContainer.textContent = errorMessage;
            event.preventDefault(); // Prevent the form from being submitted
            return false; // Validation failed
        } else {
            // Clear the error message if the value is valid
            errorMessageContainer.textContent = '';
            return true; // Validation passed
        }
    }

    Data Validation - Specific Location cannot be empty if selected
    matchingForm.addEventListener('submit', (event) => {
        const isLocationNameValid = validateField(locationNameInput, 'Please fill in the name of the Specific Location', errorMessageLocationName);
        const isAddressValid = validateField(addressOriginInput, 'Please fill in the address', errorMessageAddress);
        // const isTravelTimeValid = validateField(travelTimeDesiredInput, 'Please select your desired travel time', errorMessageTravelTime);
        const isTravelModeValid = validateField(travelModeInput, 'Please select your travel mode', errorMessageTravelMode);

        // Check if all fields are valid before submitting the form
        if (!(isLocationNameValid && isAddressValid && isTravelTimeValid && isTravelModeValid )) {
            errorMessageContainer.textContent = 'Please fill in the Specific Location category';
            event.preventDefault(); // Prevent the form from being submitted
        } else {
            errorMessageContainer.textContent = '';
        }
    });
</script>

<!--Mapbox script-->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>

<script>
    mapboxgl.accessToken = <?= json_encode($mapboxContents['token']) ?>;
    //Geocoder 1
    const geocoder1 = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        types: 'address,place',
        placeholder: 'Enter address',
        bbox: [112.9211, -43.7405, 153.6551, -10.9416]
    });

    geocoder1.addTo('#geocoder1');
    const form = document.getElementById('geocoderForm');
    // const specificLocationName = document.getElementsById('name');
    const streetNoInput = document.getElementById('streetNo');
    const streetNameInput = document.getElementById('streetName');
    const citySuburbInput = document.getElementById('citySuburb');
    const postcodeInput = document.getElementById('postcode');
    const latInput = document.getElementById('lat');
    const longInput = document.getElementById('long');
    const results = document.getElementById('result');

    // Add geocoder result to container.
    geocoder1.on('result', (e) => {
        // specificLocationName.value = e.result.name;
        streetNoInput.value = e.result.address;
        streetNameInput.value = e.result.text;
        citySuburbInput.value = e.result.context[1].text;
        postcodeInput.value = e.result.context[0].text;
        latInput.value = e.result.center[0];
        longInput.value = e.result.center[1];
        document.getElementById('address-destination').value = JSON.stringify(e.result);
    });

    //Get save address button
    // const saveButton = document.getElementById('saveButton');
    //
    // //event listener for save address
    // saveButton.addEventListener('click', () => {
    //     const results = geocoder1.getResult(); // Get the geocoder result
    // });

<!--submit search by address via Next (calculate) button-->

    //add new pref to pref_list, replace the old one if it already exists;
    function addToPrefList(pref_list, new_pref) {
        //check whether the new_pref already exist
        const result = pref_list.find(({ sub_category_id }) => sub_category_id === new_pref.sub_category_id);
        if (result === undefined) {
            pref_list.push(new_pref);
        } else {
            result.travel_mode = new_pref.travel_mode;
            result.trave_time = new_pref.trave_time;
        }
        return pref_list;
        //updating is not good,
        //find it, remove it ,add it
    }

    let pref_list = [];
    document.querySelectorAll('.btn-sub-data').forEach((elem) => {

        elem.addEventListener("change", function(event) {
            var item = event.target;
            let sub_category_id = item.getAttribute('name').slice(-1); //sub_data_#id_number, the #id number is saved to database
            let transport_id = item.getAttribute('transport_id');
            let travel_mode_selected = item.value;
            let travel_time = document.querySelector(item.dataset.travelField).value;

            const newPref = {
                sub_category_id: sub_category_id,
                transport_id: transport_id,
                travel_mode: travel_mode_selected,
                travel_time: travel_time
            };

            addToPrefList(pref_list, newPref);
            document.getElementById('preferences').value = JSON.stringify(pref_list);
            console.log("---------------------------");
            console.log(JSON.stringify(pref_list));
            console.log("---------------------------");
        });
    });

    const calculateBtn = document.getElementById('calculate-btn');
    calculateBtn.addEventListener('click', () => {

        const travel_mode = document.querySelector('input[name=question2]:checked').value;
        const travel_time = document.querySelector('select[name=travel-time]').value;

        document.getElementById('travel-mode').value = travel_mode;
        document.getElementById('travel-time-desired').value = travel_time;

        document.getElementById('matching-data').submit();
    });

</script>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
