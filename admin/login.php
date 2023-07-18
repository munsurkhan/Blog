<?php
    include_once '../lib/Session.php';
    Session::init();

    include_once '../lib/config.php';
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Blog</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">

                                        <?php
                                            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                                                $name = $fm->validation($_POST['name']);
                                                $password = $fm->validation(md5($_POST['password']));

                                                $name = mysqli_real_escape_string($db->link, $name);
                                                $password = mysqli_real_escape_string($db->link, $password);

                                                $query = "SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password'";
                                                $result = $db->select($query);
                                                if ($result != false){
                                                    $login_value = mysqli_fetch_array($result);
                                                    $row = mysqli_num_rows($result);
                                                        if ($row > 0){
                                                            Session::set("login", true);
                                                            Session::set("name", $login_value['name']);
                                                            Session::set("userId", $login_value['id']);
                                                            header("Location:index.php");
                                                        }else{
                                                            echo "<span class='text-danger'>No Result Found!!</span>";
                                                        }
                                                }else{
                                                    echo "<span class='text-danger'>Username or Password not Match!!!</span>";
                                                }
                                            }
                                        ?>


                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="userName" type="text" name="name" placeholder="Enter Your Username" />
                                                <label for="userName">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" name="submit" value="Login">
                                            </div>
                                            <a class="small text-center" href="password.html">Forgot Password?</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Munsur Khan 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
