<?php get_template_part("template_parts/header") ?>
<?php if( have_posts() ) {
    the_post();
} ?>
<main id="content">
            <?php wp_body_open(); ?>
            <section id="blog-list">
                <div class="container">
                    <div class="row gap-3">
                        <div class="col-lg-8 blog-container single-blog row ">
                            <div class="single-blog-header">
                                <div class="single-blog-picture">
                                    <?php if(has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail("large") ?>
                                    <?php else: ?>
                                        <img class="blog-thumbnail" src="https://placehold.co/282x250" style="width: 100%;" alt="">
                                    <?php endif; ?>
                                </div>
                                <p>By: <a href="#"><?php the_author() ?></a> | <?php blog_posted_on("d M, Y") ?> </p>
                            </div>
                            <div class="single-blog-content">
                                <h1><?php the_title(); ?></h1>
                                <div class="content">
                                    <?php the_content() ?>
                                </div>
                            </div>
                            <div class="single-blog-footer">&nbsp;</div>
                        </div>
                        <?php get_sidebar() ?>
                    </div>
                </div>
            </section>
            <div id="comments">
                <div class="container">
                    <h1>9 comments</h1>
                    <div class="comments">
                        <div class="recent-blog comment">
                            <div class="recent-blog-thumbnail user-pic">&nbsp;</div>
                            <div class="recent-blog-info comment-info">
                                <h2>hashim abbas</h2>
                                <time datetime="2003-03-17">17 March, 2003</time>
                                <p>How much time it took to complete this website? I wanna learn web development and i wanna build website like this in no time</p>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                        <div class="recent-blog comment reply">
                            <div class="recent-blog-thumbnail user-pic">&nbsp;</div>
                            <div class="recent-blog-info comment-info">
                                <h2>hashim abbas</h2>
                                <time datetime="2003-03-17">17 March, 2003</time>
                                <p>How much time it took to complete this website? I wanna learn web development and i wanna build website like this in no time</p>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                        <div class="recent-blog comment">
                            <div class="recent-blog-thumbnail user-pic">&nbsp;</div>
                            <div class="recent-blog-info comment-info">
                                <h2>hashim abbas</h2>
                                <time datetime="2003-03-17">17 March, 2003</time>
                                <p>How much time it took to complete this website? I wanna learn web development and i wanna build website like this in no time</p>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="leave-comment">
                    <div class="container">
                        <h3>leave a comment</h3>
                        <textarea name="message" id="message-comment" placeholder="Type comment here..."></textarea>
                        <br>
                        <input type="submit" class="leave-comment-btn">
                    </div>
                </div>
            </div>
        </main>
        <?php get_template_part("template_parts/footer") ?>