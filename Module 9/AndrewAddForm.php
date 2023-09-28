<!--

Andrew McCloud

September 20, 2023

Professor Voelcker

Module 9 Coding Assignment

-->

<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <title>AndrewAddForm</title>

    </head>

    <body>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>
        
        <div class="container text-center">

            <!-- Give the form a header title -->
            <h1>Add a Golfer</h1>

            <!-- Create a form for the input boxes -->
            <form method="post">

                <!-- Create a text box for the first name -->
                <div class="offset-md-3 my-5">

                    <div class="form-group row my-5">

                        <label class="col-md-2 col-form-label" style="text-align: right"><b>First Name:</b></label>

                        <div class="col-md-4">

                            <input type="text" class="form-control" name="fNameTxt">
                        
                        </div>

                    </div>

                    <!-- Create a text box for the last name -->
                    <div class="form-group row my-5">

                        <label class="col-md-2 col-form-label" style="text-align: right"><b>Last Name:</b></label>

                        <div class="col-md-4">

                            <input type="text" class="form-control" name="lNameTxt">
                        
                        </div>

                    </div>

                    <!-- Create a text box for the age -->
                    <div class="form-group row my-5">

                        <label class="col-md-2 col-form-label" style="text-align: right"><b>Age</b></label>

                        <div class="col-md-4">

                            <input type="number" class="form-control" name="ageTxt">
                        
                        </div>

                    </div>

                    <!-- Create a text box for the birth country -->
                    <div class="form-group row my-5">

                        <label class="col-md-2 col-form-label" style="text-align: right"><b>Birth Country</b></label>

                        <div class="col-md-4">

                            <input type="text" class="form-control" name="birthCountryTxt">
                        
                        </div>

                    </div>

                    <!-- Create a text box for the date of birth -->
                    <div class="form-group row my-5">

                        <label class="col-md-2 col-form-label" style="text-align: right"><b>Date of Birth</b></label>

                        <div class="col-md-4">

                            <input type="date" class="form-control" name="dateOfBirthTxt">
                        
                        </div>

                    </div>

                </div>

                <!-- Create a submit button -->
                <button type="submit" class="btn btn-primary mb-5" name="addGolferBtn">Add Golfer</button>

                <?php
                // Include the addRecord actions
                include 'AndrewAddRecord.php';
                
                ?>

                <!-- Create a link to return to the index -->
                <div class="my-5">

                    <a class="btn btn-warning mb-5" href="AndrewIndex.php">Return Home</a>

                </div>

            </form>

        </div>

    </body>

</html>