<?php
include('\xampp\htdocs\intern project(2)\School Pro\config\conn.php');

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <!-- End Bootstrap CSS -->

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Custom Css-->
    <link rel="stylesheet" href="./CSS/style.css">
    <!--End Custom Css-->
</head>

<body>
    <div class="container login-form">
        <div class="row mt-4 justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="offest-md-4">
                            <h1 class="text-center mt-4 mb-4 fw-bolder">Login</h1>
                            <form class="form-login" method="POST">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example1">Email address</label>
                                    <input type="email" name="email" id="form2Example1" class="form-control" value="<?php if(isset($_COOKIE['emailcookie'])){  echo $_COOKIE['emailcookie'];} ?>"  placeholder="E-mail" />
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label " for="form2Example2">Password</label>
                                    <!-- Simple link -->
                                    <a href="#!" class="float-end text-primary">Forgot password?</a>
                                    <input type="password" name="password" id="form2Example2" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE['passwordcookie'])){  echo $_COOKIE['passwordcookie'];} ?>" />
                                </div>
                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" name="rememberme" type="checkbox" value="" id="form2Example31" checked />
                                            <label class="form-check-label"   for="form2Example31"> Remember me </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="col-md-12">
                                    <input type="submit" class="col-12 btn btn-primary btn-block mb-4" value="submit" name="submit">
                                </div>
                                <p class="text-center"> <a href="staff.php" class="text-primary"> Login As Faculty</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php


    if (isset($_POST['submit'])) {
        $EMAIL  = $_POST['email'];
        $PASSWORD = $_POST['password'];

        if (!empty($EMAIL) && !empty($PASSWORD)) {


            $sql = "SELECT * FROM tbl_student WHERE email ='$EMAIL' AND password='$PASSWORD'";

            $qry = mysqli_query($conn, $sql) or die("student sql qry!!!");

            $count = mysqli_num_rows($qry);

            if ($count >= 1) {
                if ($sql) {
                  

                    if(isset($_POST['rememberme'])){
                        setcookie('emailcookie',$EMAIL,time()+8000);
                        setcookie('passwordcookie',$PASSWORD,time()+8000);
                        // header('location:\xampp\htdocs\intern project(2)\School Pro\config\conn.php');
                        echo ("remember me done");
                    }else{
                        echo (" remember me not done");
                    }


                } else {
                    echo ("not matched");
                }
            } else {
                echo ("no result found");
            }
        }
    }

    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>