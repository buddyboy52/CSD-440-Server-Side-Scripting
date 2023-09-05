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

        $specialBoarding = $_POST['specialBoardingRadio'];

        $email = $_POST['emailTxt'];

        echo $firstName;
        echo $lastName;
        echo $email;

    }

?>

        <div class="container">

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
