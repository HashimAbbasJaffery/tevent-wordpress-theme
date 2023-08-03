<div class="col-lg-6 row regular-blogs col-md-12 gap-5">
    <div class="blog-wrapper regular-blog-wrapper">
        <div class="blog regular-blog blog-list-container col-lg-12">
            <div class="blog-header blog-list-header">
                <div class="posted-on">
                    <!-- <time datetime="2003-03-17">17/03/2003</time> -->
                    <?php blog_posted_on(); ?>
                </div>
                <div class="blog-image" style="width: 282px; height: 250px; background: yellow; overflow: hidden;">    
                    <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail("large") ?>
                    <?php else: ?>
                        <img class="blog-thumbnail" src="https://placehold.co/282x250" alt="">
                    <?php endif; ?>
                </div>    
            </div>
            <div class="blog-content blog-list-content">
                <div class="meta-blog">
                    <div class="category meta">
                        <i class="fa-regular fa-folder"></i>
                        <p>business</p>
                    </div>
                    <div class="user meta">
                        <i class="fa-regular fa-user"></i>
                        <p class="descriptive-name">by <a href="#"><?php the_author(); ?></a></p>
                        <p class="short-name" style="display: none;"><?php the_author() ?></p>
                    </div>
                </div>
                <div class="blog-detail">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
                <div class="blog-footer">
                    <button>read more</button>
                </div>
            </div>
        </div>
    </div>

</div>