<?php 
	//@session_start();
	ob_start();
	session_start();		
	require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Manage Movie</title>
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
      if (isset($_SESSION['first_name']) && ! empty($_SESSION['first_name'])){
          include "header.php";  }
      else
          include "Guest_header.php";
        
  ?>


  <?php 
      if(isset($_SESSION['name']) ){
        include "Manager_sidebar.php";
    }
    else if (isset($_SESSION['first_name']) && ! empty($_SESSION['first_name'])){
        include "sidebar.php";   }
    else
        include "Guest_sidebar.php";
  ?>


  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">

              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Manage Movie [Edit]</h5>
                  </div>
                  <br><br>

                  <?php
                    // if(isset($_POST['submit'])){
                    //     $_SESSION['movie'] = $_POST['Movie'];
                    //     $_SESSION['location'] = $_POST['Location'];
                    //     $_SESSION['theater'] = $_POST['Theater'];
                    // }               
                  ?>


                  <!--Movie-->
                  <form class="row g-3 needs-validation" action="manageMovie_Edit_action.php" method="post" novalidate>
                    
                    <div class="col-12">
                        <label for="Movie">Choose a Movie to edit</label>
                        <br><br>
                        <?php
                            //หนัง
                            $sql = "SELECT * FROM Movie";	
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                
                                echo "<select name ='Movie' class='dropdown-item'>";

                                while($row = mysqli_fetch_assoc($result)) {	
                                    echo "<option>".$row["Movie_Name"]."</option>";                                          
                                }
                                echo "</select>";
                            }
                            ?>

                        </div>
                        
                        <!--ชื่อหนัง-->
                        <div class="col-12">
                      <label for="mov" class="form-label">New Movie Name</label>
                      <input type="text" name="movie" class="form-control" id="mov" required>
                      <div class="invalid-feedback">Please enter Movie!</div>
                    </div>
                        <!--คำธิบายหนัง-->
                        <div class="col-12">
                      <label for="des" class="form-label">Description</label>
                      <textarea name="description" cols="40" rows="5" class="form-control" id = "des" required></textarea>
                      <div class="invalid-feedback">Please enter Description!</div>
                    </div>

                        <!--ประเภท-->
                        <div class="col-12">
                      <label for="Date" class="form-label">New Genre</label>
                      <input type="text" name="genre" class="form-control" id="Date" required>
                      <div class="invalid-feedback">Please enter Genre!</div>
                    </div>


                        <!--ระยะเวลาฉาย-->
                        <div class="col-12">
                      <label for="dura" class="form-label">New Duration</label>
                      <input type="text" name="duration" class="form-control" id="dura" required>
                      <div class="invalid-feedback">Please enter Duration!</div>
                    </div>


                        <!--วันเริ่มฉาย -->
                    <div class="col-12">
                      <label for="RDate" class="form-label">New Release Date [Format = YYYY:MM:DD]</label>
                      <input type="text" name="releasedate" class="form-control" id="RDate" required>
                      <div class="invalid-feedback">Please enter Release Date!</div>
                    </div>

                        <!--วันออกโรง -->
                    <div class="col-12">
                      <label for="LDate" class="form-label">New Last Show Date [Format = YYYY:MM:DD]</label>
                      <input type="text" name="lastdate" class="form-control" id="LDate" required>
                      <div class="invalid-feedback">Please enter Last_Show_Date!</div>
                    </div>
                
                        <!--โปสเตอร์ -->
                    <div class="col-12">
                      <label for="LDate" class="form-label">New Poster</label>
                      <input type="text" name="poster" class="form-control" id="LDate" required>
                      <div class="invalid-feedback">Please enter Poster!</div>
                    </div>

                        <!--ตัวอย่าง -->
                      <div class="col-12">
                      <label for="LDate" class="form-label">New Trailer</label>
                      <input type="text" name="trailer" class="form-control" id="LDate" required>
                      <div class="invalid-feedback">Please enter Trailer!</div>
                    </div>

                    <br>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Edit Movie</button>
                    </div>





                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


