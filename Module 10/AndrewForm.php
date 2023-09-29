<!--

Andrew McCloud

September 29, 2023

Professor Voelcker

Module 10 Coding Assignment

-->

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

        <div class="container">

            <h1 class="text-center my-5"><b><u>Book Your Flight!</u></b></h1>

            <!-- Create a form to hold all user input options -->
            <form class="text-center" method="post">
            
                <div class="row my-3">

                    <!-- Get user first name -->
                    <div class="col-md-6">

                        <label class="form-label" for="firstNameTxt"><b>First Name</b></label>

                        <input class="form-control text-center" type="text" name="firstNameTxt" placeholder="First Name...">

                    </div>

                    <!-- Get user last name -->
                    <div class="col-md-6">

                        <label class="form-label" for="lastNameTxt"><b>Last Name</b></label>

                        <input class="form-control text-center" type="text" name="lastNameTxt" placeholder="Last Name...">

                    </div>

                </div>

                <div class="row my-3">

                    <!-- Get the date that the user will leave -->
                    <div class="col-md-6">

                        <label class="form-label" for="leaveDate"><b>Leave Date</b></label>

                        <input class="form-control text-center" type="date" name="leaveDate">

                    </div>

                    <!-- Get the date that the user will return -->
                    <div class="col-md-6">

                        <label class="form-label" for="returnDate"><b>Return Date</b></label>

                        <input class="form-control text-center" type="date" name="returnDate">

                    </div>

                </div>

                <div class="row my-3">

                    <!-- Use a dropdown to get the number of guests there will be on the trip -->
                    <div class="col-md-6 offset-md-3">

                        <label class="form-label" for="guestsDropDown"><b>How many guests?</b></label>

                        <select class="form-control text-center" name="guestsDropDown" id="guestsDropDown" required>

                            <option disabled selected>-- Select number of guests --</option>

                            <option value="1">1</option>

                            <option value="2">2</option>

                            <option value="3">3</option>

                            <option value="fourOrMore">4+</option>


                        </select>

                    </div>

                </div>

                <!-- Use radio buttons to determine if anyone will need special boarding -->
                <div class="form-check mb-4">

                    <label class="form-label" for="specialBoardingRadio"><b>Do you need special boarding?</b></label>

                    <br>

                    <input type="radio" value="yes" name="specialBoardingRadio">

                    <label class="form-check-label" for="specialBoardingRadio">Yes</label>

                    <input type="radio" value="no" name="specialBoardingRadio">

                    <label class="form-check-label" for="specialBoardingRadio">No</label>

                </div>

                <!-- Get an email from the user -->
                <div class="form-outline mb-4">

                    <label class="form-label" for="emailTxt"><b>Email</b></label>

                    <input class="form-control text-center" type="text" name="emailTxt" placeholder="Email...">

                </div>

                <div class="row mt-3 mb-5">

                    <!-- Use a dropdown to get the number of guests there will be on the trip -->
                    <div class="col-md-6 offset-md-3">

                        <label class="form-label" for="seatChoice"><b>Seat Choice</b></label>

                        <select class="form-control text-center" name="seatChoice" id="seatChoice" required>

                            <option value=""disabled selected> -- Select Seat --</option>

                            <option value="window">Window</option>

                            <option value="middle">Middle</option>

                            <option value="isle">Isle</option>

                        </select>

                    </div>

                </div>

                <!-- Create a submit button to submit the results -->
                <div class="form-outline mb-4">

                    <button class="btn btn-primary" type="submit" name="bookTripBtn">Book Now</button>

                </div>
        
            </form>

                <?php
                
                include 'AndrewJSON.php';
                
                ?>

        </div>

    </body>

</html>