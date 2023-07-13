<?php
$db = new Database();
?>
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
        </div>
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
                          <li class="d-inline cat-badge"><a href="#"><?= $cat_result['name'];?></a></li>
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

            <div class="article-right">
                <div class="card-body">
                    <h2 class="card-title h3" style="border-bottom: 1px dashed #000; padding-bottom: 5px;">Post Title</h2>
                    <img class="article_post" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." />
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                </div>
            </div>

            <div class="article-right">
                <div class="card-body">
                    <h2 class="card-title h3" style="border-bottom: 1px dashed #000; padding-bottom: 5px;">Post Title</h2>
                    <img class="article_post" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." />
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                </div>
            </div>

        </div>
    </div>
</div>