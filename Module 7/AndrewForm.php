<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <title>AndrewForm</title>

    </head>

    <body>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <?php

    if(isset($_POST['submit'])){

        $firstName = $_POST['firstNameTxt'];

        $lastName = $_POST['lastNameTxt'];

        $leaveDate = $_POST['leaveDate'];

        $returnDate = $_POST['returnDate'];

        $numOfGuests = $_POST['guestsDropDown'];

        $sBoarding = "";

        $email = $_POST['emailTxt'];

        $newLeaveDate = explode('-', $leaveDate);
        $newReturnDate = explode('-', $returnDate);

        $leaveYear = $newLeaveDate[0];
        $returnYear = $newReturnDate[0];

        $leaveMonth = $newLeaveDate[1];
        $returnMonth = $newReturnDate[1];

        $leaveDay = $newLeaveDate[2];
        $returnDay = $newReturnDate[2];

        $formStatus = "false";

        $errorCode = "";


        if(is_string($firstName) && is_string($lastName)){

            if(checkdate($leaveMonth, $leaveDay, $leaveYear)){

                if(checkdate($returnMonth, $returnDay, $returnYear) && $leaveDate < $returnDate){

                    if($numOfGuests > 0){

                        if(isset($_POST['specialBoardingRadio'])){

                            if($_POST['specialBoardingRadio'] == false){

                                $sBoarding = "Yes";

                            }else{

                                $sBoarding = "No";

                            }

                            if(is_string($email)){

                                $formStatus = "true";

                            }else{

                                $errorCode = "There is an issue with you email";

                            }

                        }else{

                            $errorCode = "Please select yes or no for special boarding";

                        }

                    }else{

                        $errorCode = "Please select one of the options for number of guests";

                    }

                }else{

                    $errorCode = "There was an issue with your return date";

                }

            }else{

                $errorCode = "There was an issue with your leave date";

            }

        }else{

            // If the first name or last name is not good
            $errorCode = "There was an issue with your first or last name";

        }

        displayResults($firstName, $lastName, $leaveDate, $returnDate, $numOfGuests, $sBoarding, $email, $formStatus, $errorCode);

    }

?>

        <div class="container">

            <?php
            
                function displayResults($fName, $lName, $lDate, $rDate, $guestNum, $specBoarding, $emailAddress, $status, $error){

                    if($status == "true"){

                        ?>

                            <div class="mt-3 mx-5 text-center" style="border: 1px solid black; background-color: lightgreen">

                                <div class="row">

                                    <div class="col-md-12">

                                        <h1>Booking Successful!</h1>

                                        <h2><?php echo "Name: {$fName} {$lName}"; ?></h2>

                                        <h2><?php echo "Leave Date: {$lDate}" ?></h2>

                                        <h2><?php echo "Return Date: {$rDate}" ?></h2>

                                        <h2><?php echo "Number of Guests: {$guestNum}" ?></h2>

                                        <h2><?php echo "Special Boarding? {$specBoarding}" ?></h2>

                                        <h2><?php echo "An confirmation email has been sent to <u>{$emailAddress}</u>" ?></h2>

                                    </div>

                                </div>

                            </div>

                        <?php

                    }else{

                        ?>

                            <div class="mt-3 mx-5 text-center" style="border: 1px solid black">

                                <div class="row">

                                    <div class="col-md-12" style="background-color: red">

                                        <h1>An error has occurred!</h1>

                                        <h2><?php echo $error; ?></h2>

                                    </div>

                                </div>

                            </div>

                        <?php

                    }

                }
            
            ?>

            <form class="form text-center" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        
                <div class="form-outline mb-4">

                    <label class="form-label" for="firstNameTxt">First Name</label>

                    <input class="form-control" type="text" name="firstNameTxt" placeholder="First Name...">

                </div>

                <div class="form-outline mb-4">

                    <label class="form-label" for="lastNameTxt">Last Name</label>

                    <input class="form-control" type="text" name="lastNameTxt" placeholder="Last Name...">

                </div>

                <div class="form-outline mb-4">

                    <label class="form-label" for="leaveDate">Leave</label>

                    <input class="form-control" type="date" name="leaveDate">

                </div>

                <div class="form-outline mb-4">

                    <label class="form-label" for="returnDate">Return</label>

                    <input class="form-control" type="date" name="returnDate">

                </div>

                <div class="form-outline mb-4">

                    <label class="form-label" for="guestsDropDown">How many guests?</label>

                    <select class="form-control" name="guestsDropDown" id="guestsDropDown" required>

                        <option value=""disabled selected>-- Select number of guests --</option>

                        <option value="1">1</option>

                        <option value="2">2</option>

                        <option value="3">3</option>

                        <option value="fourOrMore">4 or more</option>


                    </select>

                </div>

                <div class="form-check mb-4">

                    <label class="form-label" for="specialBoardingRadio">Do you need special boarding?</label>

                    <br>

                    <input type="radio" value="true" name="specialBoardingRadio">

                    <label class="form-check-label" for="specialBoardingRadio">Yes</label>

                    <input type="radio" value="false" name="specialBoardingRadio">

                    <label class="form-check-label" for="specialBoardingRadio">No</label>

                </div>

                <div class="form-outline mb-4">

                    <label class="form-label" for="emailTxt">Email</label>

                    <input class="form-control" type="text" name="emailTxt">

                </div>

                <div class="form-outline mb-4">

                    <button class="btn btn-primary" type="submit" name="submit">Book Now</button>

                </div>
        
            </form>

        </div>

    </body>

</html>
