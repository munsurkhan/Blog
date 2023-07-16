<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-12">
                            <div class="card-header">
                                <b>Add Category</b>
                            </div>
                            <div class="card-body">

                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $name = $fm->validation($_POST['name']);
                                $name = mysqli_real_escape_string($db->link, $name);
                                if (empty($name)){
                                    echo "<span class='text-danger text-center'>Field Must not be empty!</span>";
                                }else{
                                    $query = "INSERT INTO `category`(`name`) VALUES ('$name')";
                                    $cat_intert = $db->insert($query);
                                    if ($cat_intert){
                                        echo "<span class='text-success text-center'>Category Insert Success!</span>";
                                    }else{
                                        echo "<span class='text-danger text-center'>Category not Inserted.</span>";
                                    }
                                }
                            }
                        ?>


                                <form action="" method="post">
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-2 col-form-label">Add New Category</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="category" name="name" placeholder="Enter New Category">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php include_once 'inc/footer.php'; ?>