    <?php
        include_once 'lib/config.php';
        include_once 'lib/Database.php';
        include_once 'helpers/Format.php';

        $db = new Database();
        $fm = new Format();
    ?>

<div class="col-lg-8">

    <?php
        $query = "SELECT * FROM `post` ORDER BY `id` DESC LIMIT 1";
        $post_data = $db->select($query);
        if ($post_data){
            while ($post_result = $post_data->fetch_assoc())
            {
    ?>
    <!-- Featured blog post-->
    <div class="card mb-4">
        <a href="post_page.php?id=<?= $post_result['id'];?>"><img class="card-img-top" src="admin/upload/<?= $post_result['image'];?>" alt="..." /></a>
        <div class="card-body">
            <div class="small text-muted"><?= $fm->formatDate($post_result['posttime']);?> <span style="font-weight: bold">by <?= $post_result['author'];?></span></div>
            <h2 class="card-title"><a href="post_page.php?id=<?= $post_result['id'];?>"><?= $post_result['title'];?></a></h2>
            <p class="card-text"><?= $fm->textShorten($post_result['body'],300);?></p>
            <a class="btn btn-primary" href="post_page.php?id=<?= $post_result['id'];?>">Read more →</a>
        </div>
    </div>
    <?php
            }//end while loop
        }else{
            echo "<span class='bg-danger p-5'>Post Not Available</span>";
        }
    ?>
    <!-- Nested row for non-featured blog posts-->
    <div class="row">
        <?php
            $query_non_feature_post = "SELECT * FROM `post` ORDER BY `id` DESC LIMIT 10 OFFSET 1;";
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
                }else{
                    echo "<span class='bg-danger p-5'>Post Not Available</span>";
                }
                ?>
        <!-- Blog post end-->

    </div>
    <!-- Pagination-->
    <nav aria-label="Pagination">
        <hr class="my-0" />
        <ul class="pagination justify-content-center my-4">
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
            <li class="page-item"><a class="page-link" href="#!">2</a></li>
            <li class="page-item"><a class="page-link" href="#!">3</a></li>
            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
            <li class="page-item"><a class="page-link" href="#!">15</a></li>
            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
        </ul>
    </nav>
</div>