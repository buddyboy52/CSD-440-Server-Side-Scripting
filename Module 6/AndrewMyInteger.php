<!--

Andrew McCloud

September 3, 2023

Professor Voelcker

Module 6 Coding Assignment

-->

<?php

class AndrewMyInteger{

    private $integer;

    public function __construct($integer){

        $this->integer = $integer;
    }

    public function setInt($integer){

        $this->integer = $integer;

    }

    public function getInt(){

        return $this->integer;

    }

    public function isEven($num){

        $result = "False";

        if(($num % 2) == 0){

            $result = "True";

        }

        return $result;

    }

    public function isOdd($num){

        $result = "False";

        if(!(($num % 2) == 0)){

            $result = "True";

        }

        return $result;

    }

    public function isPrime($num){

        $primeResult = "True";

        for($x = 0; $x < $num; $x++){

            if($x > 1 && ($num % $x) == 0){

                $primeResult = "False";

                $x = $num;

            }

        }

        return $primeResult;

    }

}

$intOneObj = new AndrewMyInteger(11);

$intTwoObj = new AndrewMyInteger(8);

$testArray = array($intOneObj, $intTwoObj);

?>
<!DOCTYPE html>

<html lang='en'>

    <head>

        <meta charset='UTF-8'>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js' integrity='sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS' crossorigin='anonymous'></script>

        <title>AndrewMyInteger</title>

    </head>

    <body>

        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>

        <table class="table table-bordered table-striped text-center">

            <tr style="border-bottom: 4px solid black">

                <th>Integer</th>
                <th>Even?</th>
                <th>Odd?</th>
                <th>Prime?</th>

            </tr>

            <?php

            foreach($testArray as $test){

                $testInt = $test->getInt();

                $testEven = $test->isEven($testInt);

                $testOdd = $test->isOdd($testInt);

                $testPrime = $test->isPrime($testInt);

            ?>

            <tr>
                
                <td><?php echo $testInt; ?></td>
                <td><?php echo $testEven; ?></td>
                <td><?php echo $testOdd; ?></td>
                <td><?php echo $testPrime; ?></td>


            </tr>

            <?php
            }
            ?>

        </table>

    </body>

</html>
