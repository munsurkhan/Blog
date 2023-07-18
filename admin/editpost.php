<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php
if (!isset($_GET['editpost']) || $_GET['editpost'] == NULL){
    header("Location:post_list.php");
}else{
    $postid = $_GET['editpost'];
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
                            $query = "SELECT * FROM `post` WHERE `id` = '$postid' ORDER BY id DESC";
                            $category = $db->select($query);
                            while ($result = $category->fetch_assoc()){
                                $cat_id = $result['category'];
                                ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Post Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="title" name="title" value="<?=$result['title']?>">
                                        </div>
                                    </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Select Category</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="category" id="">
                            <?php
                            $query = "SELECT * FROM `category` WHERE id = '$cat_id'";
                            $cat_select = $db->select($query);
                            if ($cat_select){
                                while ($cat_result = $cat_select->fetch_assoc()){
                                    ?>
                            <option selected><?=$cat_result['name'];?></option>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            $query = "SELECT * FROM `category`";
                            $category = $db->select($query);
                            if ($category){
                                while ($c_result = $category->fetch_assoc()){
                                    ?>
                                    <option value="<?=$c_result['id']?>"><?=$c_result['name']?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Post Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="image" name="image">
                                            <img style="height: 60px; width: 100px" src="upload/<?=$result['image']?>" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="body" class="col-sm-2 col-form-label">Post Text</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="body" id="body" rows="3"><?=$result['body']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tags" name="tags" value="<?=$result['tags']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="author" name="author" value="<?=$result['author']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="submit" name="save" value="Save Post" class="btn btn-outline-primary"/>
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