
<!--

Andrew McCloud

October 5, 2023

Professor Voelcker

Module 11 Coding Assignment

-->

<?php

// Include the database connection file
include 'AndrewDatabaseConnection.php'; 
    
ob_end_clean(); 

// Require the fpdf file
require('AndrewLibraries/fpdf.php'); 

class PDF extends FPDF{

    function Header(){

        // Set the left margin to the outcome of the following equation
        // (total page size (210) - Sum of each column width) / 2
        // 210 - 130.38 (Total of each column width added together) divided by 2
        $this->SetLeftMargin(29);

        // Set the right margin to 39
        $this->SetRightMargin(39);

        $this->SetFont('Arial', 'B', 24);

        $this->Cell(150, 28, "Golfers", 1, 1, 'C');

    }

    function Footer(){

         // Set the footer at 1.5 cm from the bottom
         $this->SetY(-15);

         // Select Arial italic 8
         $this->SetFont('Arial','I',8);

         // Add a left footer text
         $this->Cell(0, 10, "McCloud - Footer", 0, 0, "L");

         // Print a right aligned page number
         $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');

    }

}
  
// Instantiate and use the PDF class that overwrites the FPDF class  
$pdf = new PDF();

// Create an array to hold the column names
$columnNames = array();

// Create an array to hold the widths for each column
$col_widths = array();

// Create an SQL statement to get column names
$sqlColumnNames = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'baseball_01' AND TABLE_NAME = 'golfers'";

// Create an sql statement to get table data
$sqlTableDate = "SELECT * FROM golfers";

// Run the column names SQL statement on the database
$columnHeaders = $conn->query($sqlColumnNames);

// Run the sql command for table data on the database
$golfers = $conn->query($sqlTableDate);

// Create a variable for the text for our table
$text = "This is a table named 'Golfers' that holds the firstname, lastname, age, birth country and date of birth of my favorite golfers. I also added myself into it because I love to golf.";
  
//Add a new page 
$pdf->AddPage();

// Set the left margin to the outcome of the following equation
// (total page size (210) - Sum of each column width) / 2
// 210 - 130.38 (Total of each column width added together) divided by 2
$pdf->SetLeftMargin(39);

// Set the font for the text above the table
$pdf->SetFont('Arial', '', 13);

// Create a multicell for multiple lines 
$pdf->MultiCell(130, 22, $text, 0, 'C');
  
// Set the font for the text 
$pdf->SetFont('Arial', 'B', 14);

// Set the fill color for the headers of the table
$pdf->SetFillColor(255, 87, 109);

// If there is atleast one piece of data when the sql is queried
if($columnHeaders->num_rows > 0){

    // Use a while loop to loop through the information
    while($row = mysqli_fetch_array($columnHeaders)){

        // Get the cell width of the header text
        $cell_width = $pdf->GetStringWidth($row[0]) + 4;

        // Add the column name to an array
        array_push($columnNames, $row[0]);

        // Add the column width to an array
        array_push($col_widths, $cell_width);

    }

}

// Use a for loop to loop through the column names and add them to PDF cells
for($x = 0; $x < count($columnNames); $x++){

    // If the column name is the last in the table, start a new line for 
    // the table data
    if($x == (count($columnNames)-1)){

        $pdf->Cell($col_widths[$x], 18, $columnNames[$x], 1, 1, 'C', true);

    // Else, if the column name is not the last, do not start a new line
    }else{

        $pdf->Cell($col_widths[$x], 18, $columnNames[$x], 1, 0, 'C', true);

    }

}

// Set the font for the body of the table
$pdf->SetFont('Arial', '', 10);

// Set the fill color to white
$pdf->SetFillColor(255, 192, 191);

// Create a fill variable to highlight alternate rows in the table
$fill = false;

// If there is data pulled from the database
if($golfers->num_rows > 0){

    // Use a while loop to run through the pulled data
    while($row = mysqli_fetch_assoc($golfers)){

        // Create cells for each piece of information from the database
        $pdf->Cell($col_widths[0], 14, $row['firstName'], 1, 0, "C", $fill);
        $pdf->Cell($col_widths[1], 14, $row['lastName'], 1, 0, "C", $fill);
        $pdf->Cell($col_widths[2], 14, $row['age'], 1, 0, "C", $fill);
        $pdf->Cell($col_widths[3], 14, $row['birthCountry'], 1, 0, "C", $fill);
        $pdf->Cell($col_widths[4], 14, $row['dateOfBirth'], 1, 1, "C", $fill);

        // After the row is added, change the fill to none
        $fill = !$fill;

    }

}
  
// return the generated output 
$pdf->Output(); 
  


?>