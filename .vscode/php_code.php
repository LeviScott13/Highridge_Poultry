<?php 
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'semis');

    // initialize variables
    $id = 0;
    $truckNo = 0;
    $dryServicedMileage = 0;
    $fullServicedMileage = 0;
    $mileage = 0;
    $dryService = date('m/d/Y');
    $fullService = date('m/d/Y');
    $dot = date('m/d/Y');
    $update = false;

    if(isset($_POST['submit']))
    {
        $truckNo = $_POST['TruckNo'];
        $dryServicedMileage = $_POST['dryServicedMileage'];
        $fullServicedMileage = $_POST['fullServicedMileage'];
        $mileage = $_POST['mileage'];
        $dryService = $_POST['dryService'];
        $fullService = $_POST['fullService'];
        $dot = $_POST['dot'];

        $SQL = "INSERT INTO trucks (TruckNo, dryServicedMileage, fullServicedMileage, mileage, dryService, fullService, dot) VALUES ($truckNo, $dryServicedMileage, $fullServicedMileage, $mileage, $dryService, $fullService, $dot)";
        $result = mysqli_query($conn, $SQL);
        $_SESSION['message'] = "Truck added succesfully!"; 
		header('location: index.php');
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $truckNo = $_POST['TruckNo'];
        $dryServicedMileage = $_POST['dryServicedMileage'];
        $fullServicedMileage = $_POST['fullServicedMileage'];
        $mileage = $_POST['mileage'];
        $dryService = $_POST['dryService'];
        $fullService = $_POST['fullService'];
        $dot = $_POST['dot'];
    
        mysqli_query($conn, "UPDATE trucks SET TruckNo='$truckNo', dryServicedMileage='$dryServicedMileage', fullServicedMileage='$fullServicedMileage', mileage='$mileage', dryService='$dryService', fullService='$fullService', dot='$dot' WHERE id=$id");
        $_SESSION['message'] = "Truck updated succesfully!"; 
        header('location: index.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM trucks WHERE id=$id");
        $_SESSION['message'] = "Truck deleted succesfully!"; 
        header('location: index.php');
    }
?>