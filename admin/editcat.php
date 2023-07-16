<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php
    if (!isset($_GET['catid']) || $_GET['catid'] == NULL){
        header("Location:category_list.php");
    }else{
        $id = $_GET['catid'];
    }
?>

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
                                    $query = "UPDATE `category` SET `name`='$name' WHERE `id` = '$id'";
                                    $cat_update = $db->update($query);
                                    if ($cat_update){
                                        echo "<span class='text-success text-center'>Category Update Success!</span>";
                                    }else{
                                        echo "<span class='text-danger text-center'>Category not Updated.</span>";
                                    }
                                }
                            }
                            ?>

<?php
    $query = "SELECT * FROM `category` WHERE `id` = '$id'";
    $category = $db->select($query);
    while ($result = $category->fetch_assoc()){
        ?>

                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="category" class="col-sm-2 col-form-label">Add New Category</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="category" name="name" value="<?= $result['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                                    </div>
                                </div>
                            </form>
    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include_once 'inc/footer.php'; ?>