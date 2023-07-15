<?php
$db = new Database();
?>
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <form action="search.php" method="get">
        <div class="card-body">
            <div class="input-group">

                    <input class="form-control" type="text" name="search" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                    <input class="btn btn-primary" id="button-search" name="submit" type="submit"/>

            </div>
        </div>
        </form>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-unstyled cat-list mb-0">
                        <?php
                            $query = "SELECT * FROM `category`";
                            $category = $db->select($query);
                            if ($category){
                                while ($cat_result = $category->fetch_assoc()){
                             ?>
                          <li class="d-inline cat-badge"><a href="cat_post.php?category=<?= $cat_result['id'];?>"><?= $cat_result['name'];?></a></li>
                        <?php
                                }
                                ?>
                        <?php
                            }else{
                                ?>
                        <li>Category not Found!</li>
                        <?php
                            }

                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header h3">Latest articles</div>
        <div class="card-body">
            <?php
            $query = "SELECT * FROM `post` ORDER BY `id` DESC LIMIT 6";
            $post_data = $db->select($query);
            if ($post_data){
            while ($post_result = $post_data->fetch_assoc())
            {
            ?>

            <div class="article-right">
                <div class="card-body">
                    <h2 class="card-title h3" style="border-bottom: 1px dashed #000; padding-bottom: 5px;"><a href="post_page.php?id=<?= $post_result['id'];?>"><?= $post_result['title'];?></a></h2>
                    <a href="post_page.php?id=<?= $post_result['id'];?>"><img class="article_post" src="admin/upload/<?= $post_result['image'];?>" alt="..." /></a>
                    <p class="card-text"><?= $fm->textShorten($post_result['body'],150);?></p>
                </div>
            </div>
                <?php
            }//end while loop
            }else{
                echo "<span class='bg-danger p-5'>Post Not Available</span>";
            }
            ?>

        </div>
    </div>
</div>