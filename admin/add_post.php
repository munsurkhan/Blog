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
                            <b>Add New Post</b>
                        </div>
                        <div class="card-body">

                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $title = mysqli_real_escape_string($db->link, $_POST['title']);
                                $category = mysqli_real_escape_string($db->link, $_POST['category']);

                                $Permitted = array('jpg','jpeg','png','gif','pdf');
                                $file_name = $_FILES['image']['name'];
                                $file_size = $_FILES['image']['size'];
                                $file_temp = $_FILES['image']['tmp_name'];
                                $div_img = explode('.',$file_name);
                                $img_ext = strtolower(end($div_img));
                                $image_unique = substr(md5(time()),0,10).'.'.$img_ext;
                                $uploaded_image = "upload/".$image_unique;

                                $body = mysqli_real_escape_string($db->link, $_POST['body']);
                                $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
                                $author = mysqli_real_escape_string($db->link, $_POST['author']);


                                if ($category == "" || $title == "" || $body == "" || $author == "" || $tags == "" || $file_name == ""){
                                    echo "<span class='text-danger text-center'>Field Must not be empty!</span>";
                                }elseif ($file_size > 524288){
                                    echo '<span>Image Size Should be less then 512KB</span>';
                                }elseif (in_array($img_ext, $Permitted) === false){
                                    echo '<span>Can you Upload only:-'.implode(',',$Permitted).'</span>';
                                }else{
                                    move_uploaded_file($file_temp,$uploaded_image);
                                    $query = "INSERT INTO `post`(`title`, `category`, `image`, `body`, `tags`, `author`) VALUES ('$title','$category','$image_unique','$body','$tags','$author')";
                                    $inserted_row = $db->insert($query);
                                    if ($inserted_row){
                                        echo '<span class="text-success">Data Save Success!</span>';
                                    }else{
                                        echo '<span class="text-danger">Data Not Save!</span>';
                                    }
                                }

                                }
                            ?>


                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Post Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Select Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="category" id="">
                                            <option selected>Select Category</option>
                                            <?php
                                                $query = "SELECT * FROM `category`";
                                                $category = $db->select($query);
                                                if ($category){
                                                    while ($result = $category->fetch_assoc()){
                                                        ?>
                                                        <option value="<?=$result['id']?>"><?=$result['name']?></option>
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
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="body" class="col-sm-2 col-form-label">Post Text</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter Post Tags">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="author" name="author" placeholder="Enter Post Author">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <input type="submit" name="save" value="Save Post" class="btn btn-outline-primary"/>
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