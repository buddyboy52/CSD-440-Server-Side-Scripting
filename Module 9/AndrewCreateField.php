<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <title>Document</title>

    </head>

    <body>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>
        
        <div class="container">

            <form class="offset-md-3 my-5">

                <div class="form-group row my-5">

                    <label class="col-md-2 col-form-label" style="text-align: right"><b>First Name:</b></label>

                    <div class="col-md-4">

                        <input type="text" class="form-control" name="fNameTxt">
                    
                    </div>

                </div>

                <div class="form-group row my-5">

                    <label class="col-md-2 col-form-label" style="text-align: right"><b>Last Name:</b></label>

                    <div class="col-md-4">

                        <input type="text" class="form-control" name="lNameTxt">
                    
                    </div>

                </div>

                <div class="form-group row my-5">

                    <label class="col-md-2 col-form-label" style="text-align: right"><b>Age</b></label>

                    <div class="col-md-4">

                        <input type="number" class="form-control" name="ageTxt">
                    
                    </div>

                </div>

                <div class="form-group row my-5">

                    <label class="col-md-2 col-form-label" style="text-align: right"><b>Birth Country</b></label>

                    <div class="col-md-4">

                        <input type="text" class="form-control" name="birthCountryTxt">
                    
                    </div>

                </div>

                <div class="form-group row my-5">

                    <label class="col-md-2 col-form-label" style="text-align: right"><b>Date of Birth</b></label>

                    <div class="col-md-4">

                        <input type="date" class="form-control" name="dateOfBirthTxt">
                    
                    </div>

                </div>

                <button type="submit" class="btn btn-primary offset-md-3" name="addGolferBtn">Add Golfer</button>

            </form>

        </div>

    </body>

</html>