<?php
include_once 'inc/header.php';

if (!isset($_GET['search']) || $_GET['search'] == NULL){
    header("Location: 404.php");
}else{
    $search = $_GET['search'];
}
$db = new Database();
$fm = new Format();
?>
    <!-- Page content-->
    <div class="container mt-5">
    <div class="row">

    <div class="col-lg-8">
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            <?php
            $query_non_feature_post = "SELECT * FROM `post` WHERE `title`LIKE '%$search%' OR `body` LIKE '%$search%'";
            $post_data_non_feature_post = $db->select($query_non_feature_post);
            if ($post_data_non_feature_post){
                while ($non_feature_post_result = $post_data_non_feature_post->fetch_assoc())
                {
                    ?>
                    <!-- Blog post-->
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <a href="post_page.php?id=<?= $non_feature_post_result['id'];?>"><img class="card-img-top" src="admin/upload/<?=$non_feature_post_result['image'];?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?= $fm->formatDate($non_feature_post_result['posttime']);?> <span style="font-weight: bold">by <?= $non_feature_post_result['author'];?></span></div>
                                <h2 class="card-title h4"><a href="post_page.php?id=<?= $non_feature_post_result['id'];?>"><?=$non_feature_post_result['title']; ?></a></h2>
                                <p class="card-text"><?= $fm->textShorten($non_feature_post_result['body'], 300);?></p>
                                <a class="btn btn-primary" href="post_page.php?id=<?= $non_feature_post_result['id'];?>">Read more →</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }//end while loop
                ?>

                <?php
            }else{
                echo "<p class='text-danger'>Your Search Result not Found!!</p>";
            }
            ?>
            <!-- Blog post end-->

        </div>


    </div>



    <!-- Side widgets-->
<?php include_once 'inc/sidebar.php'; ?>

<?php include_once 'inc/footer.php'; ?>