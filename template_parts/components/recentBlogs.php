<div class="recent-blog">
    <div class="recent-blog-thumbnail">
        <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail("large") ?>
        <?php else: ?>
            <img class="blog-thumbnail" src="https://placehold.co/282x250" style="width: 100%;" alt="">
        <?php endif; ?>
    </div>
    <div class="recent-blog-info">
        <?php blog_posted_on("d M, Y") ?>
        <h2>
            <?php the_title(); ?>
        </h2>
        <p>
            <?php echo substr(get_the_excerpt(), 30) ?>&nbsp;
        </p>
    </div>
</div>