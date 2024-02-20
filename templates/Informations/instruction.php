<?php
 /**
  * @var string[] $instructionContentImages //for content Images
  */

echo $this->Html->script('/vendor/bootstrap/function/bootstrap.min.js', ['block' => true]);
echo $this->Html->script('/vendor/bootstrap/function/popper.min.js', ['block' => true]);
echo $this->Html->css('matching.css', ['block' => true]);
?>

<!DOCTYPE html>
<html lang="en">


<body>
<div class="container mt-4">

    <br>
    <h1>
        Instructions
    </h1>

    <br><br>


    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingregister">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#register" aria-expanded="true" aria-controls="register">
                        Register New Account
                    </button>
                </h5>
            </div>




            <div id="register" class="collapse show" aria-labelledby="headingregister" data-parent="#accordion">
                <div class="card-body">
                    <?= $this->Html->image($instructionContentImages['register-image'], ['alt' => "Responsive image", 'class' => "img-fluid"])?>
                    <br><br>
                    <p>
                        1. Click on the Login button on the top right of the homepage. <br>
                        2. Click on the “Register here”, below the login button. <br>
                        3. Fill in your credentials and make sure everything is correct prior to signing up.<br>
                        4. Password should be longer than 5 characters.<br>
                        5. Review the terms and condition and the privacy policy by clicking the hyperlink text below the form<br>
                        6. Once you are satisfied, click the "Register button"<br>
                    </p>
                </div>
            </div>
        </div>




        <div class="card">
            <div class="card-header" id="headingforgetPass">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#forgetPass" aria-expanded="false" aria-controls="forgetPass">
                        Account Recovery / Forget Password
                    </button>
                </h5>
            </div>
            <div id="forgetPass" class="collapse" aria-labelledby="headingforgerPass" data-parent="#accordion">
                <div class="card-body">
                    <?= $this->Html->image($instructionContentImages['forgetPassword-image'], ['alt' => "Responsive image", 'class' => "img-fluid"])?>
                    <br><br>
                    <p>
                        1. Click on the "Sign in" button on the top right of the page <br>
                        2. Click the "Forget Password" link at the bottom of the form<br>
                        3. Fill in the email used to create your account, make sure the email is correct. <br>
                        4. A link to change your password will be send to your email if the email is registered to an existing account. <br>
                        5. Follow the link and create a new password <br>
                    </p>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="headingeditLifestyle">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#editLifestyle" aria-expanded="false" aria-controls="editLifestyle">
                        Match by Lifestyle Preferences
                    </button>
                </h5>
            </div>
            <div id="editLifestyle" class="collapse" aria-labelledby="headingeditLifestyle" data-parent="#accordion">
                <div class="card-body">
                    <?= $this->Html->image($instructionContentImages['matchCategory-image'], ['alt' => "Responsive image", 'class' => "img-fluid"])?>
                    <br><br>
                    <p>
                        1. Go to the "Lifestyle Profile" page through the navigation bar. <br>
                        2. Select the facilities or places you wish to have near you property. <br>
                        3. If you would like to evaluate the property based on another address, click on the “Address” Category and input the second address <br>
                    </p>
                    <?= $this->Html->image($instructionContentImages['matchLocation-image'], ['alt' => "Responsive image", 'class' => "img-fluid"])?>
                    <br><br>
                    <p>
                        4. Select the maximum travel time and the mode of transportation via the drop down button. <br>
                        5. Click the "Next" button below the list. <br>
                    </p>
                    <?= $this->Html->image($instructionContentImages['matchTraveltime-image'], ['alt' => "Responsive image", 'class' => "img-fluid"])?>
                    <br><br>
                    <p>
                        6. On the next page, Input your property address. <br>
                        7. Click on the “Calculate” button <br>
                    </p>
                    <?= $this->Html->image($instructionContentImages['matchAddress-image'], ['alt' => "Responsive image", 'class' => "img-fluid"])?>
                    <br><br>


                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="headingscore">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#score" aria-expanded="false" aria-controls="score">
                        Score Meaning
                    </button>
                </h5>
            </div>
            <div id="score" class="collapse" aria-labelledby="headingscore" data-parent="#accordion">
                <div class="card-body">
                    <?= $this->Html->image($instructionContentImages['score-image'], ['alt' => "Responsive image", 'class' => "img-fluid"])?>
                    <br><br>
                    <p>
                        1. The overall score will be shown in percentage out of 100%, the higher the percentage is the closer is the property to your lifestyle profile <br>
                        2. The detailed score wil be shown next to the lifestyle category you have chosen for your lifestyle profile, <br>
                        This score is generated by using your lifestyle profile for a specific category <br>
                        3. The map will display the visualisation of the property address and to the places you want based on your lfestyle <br>
                    </p>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="headinghistory">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#history" aria-expanded="false" aria-controls="history">
                        Search History
                    </button>
                </h5>
            </div>
            <div id="history" class="collapse" aria-labelledby="headinghistory" data-parent="#accordion">
                <div class="card-body">
                    <?= $this->Html->image($instructionContentImages['search-history'], ['alt' => "Responsive image", 'class' => "img-fluid"])?>
                    <br><br>
                    <p>
                        1. Click on the user icon on the top right of the page. <br>
                        2. Click on the "Search Records" under your account name. <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>








    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</body>




</html>









