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
                            <b>Category List</b>
                        </div>

                        <?php
                        if (isset($_GET['deleteid'])){
                            $deleteid = $_GET['deleteid'];
                            $delQuery = "DELETE FROM `category` WHERE `id` = '$deleteid'";
                            $delResult = $db->delete($delQuery);
                            if ($delResult){
                                echo "<span class='text-success text-center'>Category Deleted Success!</span>";
                            }else{
                                echo "<span class='text-danger text-center'>Category not Deleted.</span>";
                            }
                        }
                        ?>

                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT `post`.*, category.name FROM post INNER JOIN category ON post.`category` = category.id ORDER BY post.title DESC";
                                $post_result = $db->select($query);
                                if ($post_result){
                                    $i = 0;
                                    while ($result = $post_result->fetch_assoc()){
                                        $i++;
                                        ?>

                                        <tr>
                                            <td><?= $i;?></td>
                                            <td><?= $result['title']; ?></td>
                                            <td><?= $result['name']; ?></td>
                                            <td><img style="height: 50px; width: 60px" src="upload/<?= $result['image']; ?>" alt=""></td>
                                            <td><?= $fm->textShorten($result['body'],100); ?></td>
                                            <td><?= $result['tags']; ?></td>
                                            <td><?= $result['author']; ?></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="editpost.php?editpost=<?= $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete!');" class="btn btn-sm btn-danger" href="?deleteid=<?= $result['id']; ?>">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    } }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include_once 'inc/footer.php'; ?>