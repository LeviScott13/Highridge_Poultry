<?php  include('php_code.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM trucks WHERE id=$id");

        $n = mysqli_fetch_array($record);
        $truckNo = $n['TruckNo'];
        $dryServicedMileage = $n['dryServicedMileage'];
        $fullServicedMileage = $n['fullServicedMileage'];
        $mileage = $n['mileage'];
        $dryService = $n['dryService'];
        $fullService = $n['fullService'];
        $dot = $n['dot'];
    }
    if (isset($_GET['editDryService'])) {
		$id = $_GET['editDryService'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM trucks WHERE id=$id");

        $n = mysqli_fetch_array($record);
        $truckNo = $n['TruckNo'];
        $dryServicedMileage = $n['dryServicedMileage'];
        $fullServicedMileage = $n['fullServicedMileage'];
        $mileage = $n['mileage'];
        $dryService = $n['dryService'];
        $fullService = $n['fullService'];
        $dot = $n['dot'];
    }
    if (isset($_GET['editFullService'])) {
		$id = $_GET['editFullService'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM trucks WHERE id=$id");

        $n = mysqli_fetch_array($record);
        $truckNo = $n['TruckNo'];
        $dryServicedMileage = $n['dryServicedMileage'];
        $fullServicedMileage = $n['fullServicedMileage'];
        $mileage = $n['mileage'];
        $dryService = $n['dryService'];
        $fullService = $n['fullService'];
        $dot = $n['dot'];
    }
    if (isset($_GET['editDOTService'])) {
		$id = $_GET['editDOTService'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM trucks WHERE id=$id");

        $n = mysqli_fetch_array($record);
        $truckNo = $n['TruckNo'];
        $dryServicedMileage = $n['dryServicedMileage'];
        $fullServicedMileage = $n['fullServicedMileage'];
        $mileage = $n['mileage'];
        $dryService = $n['dryService'];
        $fullService = $n['fullService'];
        $dot = $n['dot'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highridge Poultry</title>
    <link rel="icon" href="img/chicken.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
     <!-- Navbar -->
        <!-- <div class="container-fluid p-0"> -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-black" style="margin: 0px; border-bottom: 2px solid orange">
            <div>
                <a class="navbar-brand" href="#" style="width: 18%; float: left;">
                    <img id=logo src="img/chicken2.jpeg" alt="" style="width: 100%;">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mr-auto"></div>
                <ul class="navbar-nav">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" id=nav-links>Dashboard<span class="sr-only">(current)</span></a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" id=nav-links>Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id=nav-links>Messages</a>
                    </li> -->
                </ul>
            </div>
        </nav>
        <!-- </div> -->
        <!-- End of Navbar -->
    <?php

        $sglQuery = 'SELECT * FROM trucks';
        $result = mysqli_query($conn, $sglQuery);

        if(!$result){
            die('error' .  mysqli_error($conn));
        }
        echo "
            <table class='table' style='background: whitesmoke'>
                <tr>
                    <th style='text-align: center;'>Truck No.</th>
                    <th style='text-align: center'>Dry Serviced Mileage</th>
                    <th style='text-align: center'>Full Serviced Mileage</th>
                    <th style='text-align: center'>Mileage</th>
                    <th style='text-align: center'>Dry Service Received</th>
                    <th style='text-align: center'>Full Service Received</th>
                    <th style='text-align: center'>DOT Service Received</th>
                </tr>
            ";
        
        while($row = mysqli_fetch_array($result)){?>
                <tr>
                    <td style="text-align: center"> <span style="color: blue; font-weight: bold"> <?php echo $row['TruckNo']; ?> </span></td>
                    <td style="text-align: center">
                    <?php
                        if($row['mileage'] - $row['dryServicedMileage'] >= 12500){
                            echo '<span style="color: red; font-weight: bold">';
                            echo $row['dryServicedMileage'];
                            echo '</span>';
                        }
                        else if($row['mileage'] - $row['dryServicedMileage'] >= 8000 && $row['mileage'] - $row['dryServicedMileage'] < 12499){
                            echo '<span style="color: orange; font-weight: bold">';
                            echo $row['dryServicedMileage'];
                            echo '</span>';
                        }
                        else{
                            echo '<span style="color: green; font-weight: bold">';
                            echo $row['dryServicedMileage'];
                            echo '</span>';
                        }
                    ?>
                    </td>
                    <td style="text-align: center">
                        <?php
                            if($row['mileage'] - $row['fullServicedMileage'] >= 25000){
                                echo '<span style="color: red; font-weight: bold">';
                                echo $row['fullServicedMileage'];
                                echo '</span>';
                            }
                            else if($row['mileage'] - $row['fullServicedMileage'] >= 20000 && $row['mileage'] - $row['fullServicedMileage'] < 24999){
                                echo '<span style="color: orange; font-weight: bold">';
                                echo $row['fullServicedMileage'];
                                echo '</span>';
                            }
                            else{
                                echo '<span style="color: green; font-weight: bold">';
                                echo $row['fullServicedMileage'];
                                echo '</span>';
                            }
                        ?>
                    </td>
                    <td style="text-align: center"> <span style="color: gray; font-weight: bold"> <?php echo $row['mileage']; ?> </span></td>

                    <td style="text-align: center"> <span style="color: gray; font-weight: bold"> <?php echo $row['dryService']; ?> </span>

                    <!-- Edit Dry Service -->
                    <a href="index.php?editDryService=<?php echo $row['id']; ?> #truckForm"><i class="fa fa-pencil"></i></a>

                    </td>
                    <td style="text-align: center"> <span style="color: gray; font-weight: bold"> <?php echo $row['fullService']; ?> </span>

                    <!-- Edit Full Service -->
                    <a href="index.php?editFullService=<?php echo $row['id']; ?> #truckForm"><i class="fa fa-pencil"></i></a>

                    <td style="text-align: center">
                        <?php
                            if(substr($row['dot'], 5, 2) == date("m") && substr($row['dot'], 0, 4) != date("Y")){
                                echo '<span style="color: red; font-weight: bold">';
                                echo substr($row['dot'], 0, 7);
                                echo '</span>';
                            }else{
                                echo '<span style="color: #2E8B57; font-weight: bold">';
                                echo substr($row['dot'], 0, 7);
                                echo '</span>';
                            }
                        ?>
                    <!-- Edit DOT Service -->
                    <a href="index.php?editDOTService=<?php echo $row['id']; ?> #truckForm"><i class="fa fa-pencil"></i></a>
                    </td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?> #truckForm" class="edit_btn">Edit</a>
			        </td>
			        <td>
				        <a name="del" href="php_code.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			        </td>
                </tr>
        <?php } 
    ?>
    </table>
    <br><br>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <?php if (isset($_GET['edit'])): ?> 
        <div>
            <form method='post' action='php_code.php' id=truckForm>
                <input type='hidden' name='id' value="<?php echo $id; ?>">
                <div class='input-groups'>
                    <label>Truck No.</label>
                    <input type='text' name='TruckNo' value="<?php echo $truckNo; ?>">
                </div>
                <div class='input-groups'>
                    <label>Dry Serviced Mileage</label>
                    <input type='text' name='dryServicedMileage' value="<?php echo $dryServicedMileage; ?>">
                </div>
                <div class='input-groups'>
                    <label>Full Serviced Mileage</label>
                    <input type='text' name='fullServicedMileage' value="<?php echo $fullServicedMileage; ?>">
                </div>
                <div class='input-groups'>
                    <label>Mileage</label>
                    <input type='text' name='mileage' value="<?php echo $mileage; ?>">
                </div>
                <div class='input-groups'>
                    <label>Dry Service Received</label>
                    <input type='date' name='dryService' value="<?php echo $dryService; ?>">
                </div>
                <div class='input-groups'>
                    <label>Full Service Received</label>
                    <input type='date' name='fullService' value="<?php echo $fullService; ?>">
                </div>
                <div class='input-groups'>
                    <label>DOT Service Received</label>
                    <input type='date' name='dot' value="<?php echo $dot; ?>">
                </div>
                <div class='input-groups'>
                    <?php if ($update == true): ?>
                        <br>
                        <button class='btn' type='submit' name='update' style='background: orange; border: 2px solid gray'>Update</button>
                    <?php endif ?>
                </div>	
            </form> 
        </div>
        <?php elseif (isset($_GET['editDryService'])): ?> 
        <div>
            <form method="post" action="php_code.php" id=truckForm>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-groups">
                    <label>Truck No.</label>
                    <input type='text' name='TruckNo' value="<?php echo $truckNo; ?>">
                </div>
                <div class="input-groups">
                    <label>Dry Service Received</label>
                    <input type="date" name="dryService" value="<?php echo $dryService; ?>">
                </div>
                <div class="input-groups">
                    <?php if ($update == true): ?>
                        <br>
                        <button class='btn' type='submit' name='updateDryService' style='background: orange; border: 2px solid gray'>Update</button>
                    <?php endif ?>
                </div>	
                <div class="input-groups" style="visibility: hidden">
                    <label>Dry Serviced Mileage</label>
                    <input type="text" name="dryServicedMileage" value="<?php echo $dryServicedMileage; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Full Serviced Mileage</label>
                    <input type="text" name="fullServicedMileage" value="<?php echo $fullServicedMileage; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Mileage</label>
                    <input type="text" name="mileage" value="<?php echo $mileage; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Full Service Received</label>
                    <input type="date" name="fullService" value="<?php echo $fullService; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>DOT Service Received</label>
                    <input type="date" name="dot" value="<?php echo $dot; ?>">
                </div>
            </form> 
        </div>
        <?php elseif (isset($_GET['editFullService'])): ?> 
        <div>
            <form method="post" action="php_code.php" id=truckForm>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-groups">
                    <label>Truck No.</label>
                    <input type='text' name='TruckNo' value="<?php echo $truckNo; ?>">
                </div>
                <div class="input-groups">
                    <label>Full Service Received</label>
                    <input type="date" name="fullService" value="<?php echo $fullService; ?>">
                </div>
                <div class="input-groups">
                    <?php if ($update == true): ?>
                        <br>
                        <button class='btn' type='submit' name='updateFullService' style='background: orange; border: 2px solid gray'>Update</button>
                    <?php endif ?>
                </div>	
                <div class="input-groups" style="visibility: hidden">
                    <label>Dry Serviced Mileage</label>
                    <input type="text" name="dryServicedMileage" value="<?php echo $dryServicedMileage; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Full Serviced Mileage</label>
                    <input type="text" name="fullServicedMileage" value="<?php echo $fullServicedMileage; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Mileage</label>
                    <input type="text" name="mileage" value="<?php echo $mileage; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Dry Service Received</label>
                    <input type="date" name="dryService" value="<?php echo $dryService; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>DOT Service Received</label>
                    <input type="date" name="dot" value="<?php echo $dot; ?>">
                </div>
            </form> 
        </div>
        <?php elseif (isset($_GET['editDOTService'])): ?> 
        <div>
            <form method="post" action="php_code.php" id=truckForm>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-groups">
                    <label>Truck No.</label>
                    <input type='text' name='TruckNo' value="<?php echo $truckNo; ?>">
                </div>
                <div class="input-groups">
                    <label>DOT Service Received</label>
                    <input type="date" name="dot" value="<?php echo $dot; ?>">
                </div>
                <div class="input-groups">
                    <?php if ($update == true): ?>
                        <br>
                        <button class='btn' type='submit' name='updateDOTService' style='background: orange; border: 2px solid gray'>Update</button>
                    <?php endif ?>
                </div>	
                <div class="input-groups" style="visibility: hidden">
                    <label>Dry Serviced Mileage</label>
                    <input type="text" name="dryServicedMileage" value="<?php echo $dryServicedMileage; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Full Serviced Mileage</label>
                    <input type="text" name="fullServicedMileage" value="<?php echo $fullServicedMileage; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Mileage</label>
                    <input type="text" name="mileage" value="<?php echo $mileage; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Dry Service Received</label>
                    <input type="date" name="dryService" value="<?php echo $dryService; ?>">
                </div>
                <div class="input-groups" style="visibility: hidden">
                    <label>Full Service Received</label>
                    <input type="date" name="fullService" value="<?php echo $fullService; ?>">
                </div>
            </form> 
        </div>
        <?php else: ?>
        <div>
            <form method="post" action="php_code.php" id=truckForm>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-groups">
                    <label>Truck No.</label>
                    <input type="text" name="TruckNo" value="<?php echo $truckNo; ?>">
                </div>
                <div class="input-groups">
                    <label>Dry Serviced Mileage</label>
                    <input type="text" name="dryServicedMileage" value="<?php echo $dryServicedMileage; ?>">
                </div>
                <div class="input-groups">
                    <label>Full Serviced Mileage</label>
                    <input type="text" name="fullServicedMileage" value="<?php echo $fullServicedMileage; ?>">
                </div>
                <div class="input-groups">
                    <label>Mileage</label>
                    <input type="text" name="mileage" value="<?php echo $mileage; ?>">
                </div>
                <div class="input-groups">
                    <label>Dry Service Received</label>
                    <input type="date" name="dryService" value="<?php echo $dryService; ?>">
                </div>
                <div class="input-groups">
                    <label>Full Service Received</label>
                    <input type="date" name="fullService" value="<?php echo $fullService; ?>">
                </div>
                <div class="input-groups">
                    <label>DOT Service Received</label>
                    <input type="date" name="dot" value="<?php echo $dot; ?>">
                </div>
                <div class="input-groups">
                    <br>
                    <button class="btn" style="background: orange; border: 2px solid gray" type="submit" name="submit">Add Truck</button>
                </div>	
            </form> 
        </div>
    <?php endif ?>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <!-- Fade AOS plugin -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>
</html>