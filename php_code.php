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

    // Add Truck
    if(isset($_POST['submit']))
    {
        $truckNo = $_POST['TruckNo2'];
        $dryServicedMileage = $_POST['dryServicedMileage2'];
        $fullServicedMileage = $_POST['fullServicedMileage2'];
        $mileage = $_POST['mileage2'];
        $dryService = $_POST['dryService2'];
        $fullService = $_POST['fullService2'];
        $dot = $_POST['dot2'];

        $SQL = "INSERT INTO trucks (TruckNo, dryServicedMileage, fullServicedMileage, mileage, dryService, fullService, dot) VALUES ($truckNo, $dryServicedMileage, $fullServicedMileage, $mileage, $dryService, $fullService, $dot)";
        $result = mysqli_query($conn, $SQL);
        $_SESSION['message'] = "Truck Added Succesfully!"; 
		header('location: index.php');
    }

    // Update Truck Info
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
        $_SESSION['message'] = "Update Succesful!"; 
        header('location: index.php');
    }

    // Update Dry Service
    if (isset($_POST['updateDryService'])) {
        $id = $_POST['id'];
        $truckNo = $_POST['TruckNo'];
        $dryServicedMileage = $_POST['mileage'];
        $fullServicedMileage = $_POST['fullServicedMileage'];
        $mileage = $_POST['mileage'];
        $dryService = $_POST['dryService'];
        $fullService = $_POST['fullService'];
        $dot = $_POST['dot'];
    
        mysqli_query($conn, "UPDATE trucks SET TruckNo='$truckNo', dryServicedMileage='$dryServicedMileage', fullServicedMileage='$fullServicedMileage', mileage='$mileage', dryService='$dryService', fullService='$fullService', dot='$dot' WHERE id=$id");
        $_SESSION['message'] = "Dry Service Received Succesfully!"; 
        header('location: index.php');
    }

    // Update Full Service
    if (isset($_POST['updateFullService'])) {
        $id = $_POST['id'];
        $truckNo = $_POST['TruckNo'];
        $dryServicedMileage = $_POST['dryServicedMileage'];
        $fullServicedMileage = $_POST['mileage'];
        $mileage = $_POST['mileage'];
        $dryService = $_POST['dryService'];
        $fullService = $_POST['fullService'];
        $dot = $_POST['dot'];
    
        mysqli_query($conn, "UPDATE trucks SET TruckNo='$truckNo', dryServicedMileage='$dryServicedMileage', fullServicedMileage='$fullServicedMileage', mileage='$mileage', dryService='$dryService', fullService='$fullService', dot='$dot' WHERE id=$id");
        $_SESSION['message'] = "Full Service Received Succesfully!"; 
        header('location: index.php');
    }

    // Update DOT Service
    if (isset($_POST['updateDOTService'])) {
        $id = $_POST['id'];
        $truckNo = $_POST['TruckNo'];
        $dryServicedMileage = $_POST['dryServicedMileage'];
        $fullServicedMileage = $_POST['fullServicedMileage'];
        $mileage = $_POST['mileage'];
        $dryService = $_POST['dryService'];
        $fullService = $_POST['fullService'];
        $dot = $_POST['dot'];
    
        mysqli_query($conn, "UPDATE trucks SET TruckNo='$truckNo', dryServicedMileage='$dryServicedMileage', fullServicedMileage='$fullServicedMileage', mileage='$mileage', dryService='$dryService', fullService='$fullService', dot='$dot' WHERE id=$id");
        $_SESSION['message'] = "DOT Service Received Succesfully!"; 
        header('location: index.php');
    }

    // Delete Truck
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM trucks WHERE id=$id");
        $_SESSION['message'] = "Truck deleted succesfully!"; 
        header('location: index.php');
    }
?>