<?php

$firstkwh = ""; //string 
$error = ""; //string
$showBill = false; //boolean

// $_POST tarik data direct dari form
if (isset($_POST['calculate'])) {
    // . (titik or dot) untuk gabungan string, dengan php dan HTML
    // echo (print output / display data)
    //  echo "<p>The input for the first kwh is " . $_POST['first'] . "</p>";

    $firstkwh = $_POST['first'];
    $secondkwh = $_POST['second'];
    $thirdkwh = $_POST['third'];
    $fourthkwh = $_POST['fourth'];
    $fifthkwh = $_POST['fifth'];

    //first validation
//will check if user did not enter any value, then charge will be 0 
    if ($firstkwh == "") {
        $firstkwh = 0;
    }
    if ($secondkwh == "") {
        $secondkwh = 0;
    }
    if ($thirdkwh == "") {
        $thirdkwh = 0;
    }
    if ($fourthkwh == "") {
        $fourthkwh = 0;
    }
    if ($fifthkwh == "") {
        $fifthkwh = 0;
    }

    //second validation
//will check if user enter negative value, then charge will be 0
    // // if ($firstkwh < 0) {
    //     $firstkwh = 0;
    // }
    // if ($secondkwh < 0) {
    //     $secondkwh = 0;
    // }
    // if ($thirdkwh < 0) {
    //     $thirdkwh = 0;
    // }
    // if ($fourthkwh < 0) {
    //     $fourthkwh = 0;
    // }
    // if ($fifthkwh < 0) {
    //     $fifthkwh = 0;
    // }


    // if user enter invalid value, then error message will be displayed
    if ($firstkwh < 0 || $secondkwh < 0 || $thirdkwh < 0 || $fourthkwh < 0 || $fifthkwh < 0) {
        $error = "Please enter a valid value";
    }

    //third validation
   else if ($firstkwh > 200) {
        $error = "Please enter a valid value (1-200 kWh) per month";
    }
   else if ($secondkwh > 100) {
        $error = "Please enter a valid value (201-300 kWh) per month";
    }
    else if ($thirdkwh > 300) {
        $error = "Please enter a valid value (301-600 kWh) per month";
    }
    else if ($fourthkwh > 300) {
        $error = "Please enter a valid value (601-900 kWh) per month";
    }

    // fourth validation
    else if ($firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh == 0) {
        $error = "Please enter a valid value (0 or more) for atleast one of the kWh per month";
    } else {

    //$charge1 = $_POST['first'] * 0.218;
    $charge1 = $firstkwh * 0.218;
    $charge2 = $secondkwh * 0.344;
    $charge3 = $thirdkwh * 0.516;
    $charge4 = $fourthkwh * 0.546;
    $charge5 = $fifthkwh * 0.571;

    //total kwh
    $totalkwh = $firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh;
    //total charge for all kwh
    $totalcharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;

    if ($totalcharge < 3) {
        $totalcharge = 3;
    }

    if ($totalkwh > 600) {
      //  $totalSST = $totalcharge * 0.06;
      // $totalcharge = $totalcharge * 0.06;
        //6% = 0.06
        $totalcharge = $totalcharge * 1.06;
    } 

    $showBill = true;


    // echo "<p>The charge for the first kwh is " . $charge1 . "</p>";
    // echo "<p>The charge for the second kwh is " . $charge2 . "</p>";
    // echo "<p>The charge for the third kwh is " . $charge3 . "</p>";
    // echo "<p>The charge for the fourth kwh is " . $charge4 . "</p>";
    // echo "<p>The charge for the fifth kwh is " . $charge5 . "</p>";

    // echo "<br>The total charge for the first kwh is " . $charge1 . "<br>";

} 
}
?>