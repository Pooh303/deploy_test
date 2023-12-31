<?php
ob_start();
session_start();
require_once('connect.php');
$no = 1;
$mname = "";
$mlo = "";
$mthea = "";
$mstart = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Font Kanit -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit&display=swap">

</head>
<body>

<?php
if (isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
    include "header.php";
} else {
    include "Guest_header.php";
}
?>

<?php
if (isset($_SESSION['name'])) {
    include "Manager_sidebar.php";
} elseif (isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
    include "sidebar.php";
} else {
    include "Guest_sidebar.php";
}
?>
<br><br>
<div class="container">
    <form action="booking_action.php" method="post" novalidate>
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4"></div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Booking Ticket</h5>
                                </div>
                                <br>
                                <!-- Movie -->
                                <form class="row g-3 needs-validation">
                                    <div class="col-12">
                                        <label for="Movie">Choose a Movie:</label>
                                        <?php
                                        //หนัง
                                        $sql = "SELECT * FROM Movie";	
                                        $result = mysqli_query($conn, $sql);
                                        $mlo;
                                        $mthea;
                                        $mstart;
                                        
                                        if (mysqli_num_rows($result) > 0) {
                                            
                                            echo "<select name ='Movie' class='dropdown-item'>";

                                            while($row = mysqli_fetch_assoc($result)) {	
                                                echo "<option>".$row["Movie_Name"]."</option>"; 
                                            }
                                            echo "</select>";
                                            $mname= "</select>";
                                          }
                                        ?>
                                    </div>
                                    <br>

                                    <!-- Location -->
                                    <div class="col-12">
                                        <label for="Location">Choose Location:</label>
                                        <br>
                                        <?php   
                                          $sql = "SELECT location_name FROM Location";	
                                          $result = mysqli_query($conn, $sql);

                                          if (mysqli_num_rows($result) > 0) {
                                              
                                              echo "<select name ='Location' class='dropdown-item'>";

                                              while($row = mysqli_fetch_assoc($result)) {	
                                                  echo "<option>".$row["location_name"]."</option>";                                          
                                              }
                                              echo "</select>";
                                          }
                                        ?>
                                    </div>
                                    <br>

                                    <!-- Theater -->
                                    <div class="col-12">
                                        <label for="Theater">Choose Theater:</label>
                                        <br>
                                        <?php   
                                          $sql = "SELECT DISTINCT Theater_ID FROM Theaters";	
                                          $result = mysqli_query($conn, $sql);

                                          if (mysqli_num_rows($result) > 0) {
                                              
                                            echo "<select name='Theater' class='dropdown-item'>";

                                            while($row = mysqli_fetch_assoc($result)) {	
                                                echo "<option>".$row["Theater_ID"]."</option>";                                          
                                            }
                                            echo "</select>";
                                        }
                                      ?>
                                    </div>
                                    <br>

                                    <!-- Start Time -->
                                    <div class="col-12">
                                        <label for="StartTime">Choose Start Time:</label>
                                        <br>
                                        <?php   
                                            $sql = "SELECT DISTINCT Start_Time FROM Showtime";	
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                
                                              echo "<select name='Theater' class='dropdown-item'>";

                                              while($row = mysqli_fetch_assoc($result)) {	
                                                  echo "<option>".$row["Start_Time"]."</option>";                                          
                                              }
                                              echo "</select>";
                                          }
                                        ?>
                                    </div>
                                    
                                    <br><br>

                                    <div class="col-12">
                                        <br>
                                        <button class="btn btn-primary w-100" type="submit">Book</button>
                                        <!-- <script>
                                            const openNewTabBtn = document.getElementById("btn");
                                            openNewTabBtn.addEventListener("click", function() {
                                                // สร้าง URL ที่คุณต้องการให้หน้าเว็บใหม่เปิด
                                                const variableToSend = "ข้อมูลที่คุณต้องการส่ง";
                                                const url = "ticket.php?mname=''";

                                                // เปิดหน้าเว็บใหม่ใน Tab ใหม่
                                                window.open(url, '_blank');
                                            });
                                        </script> -->
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    </div>
</body>
</html>
