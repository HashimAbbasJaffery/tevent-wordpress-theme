<?php get_template_part("template_parts/header") ?>
<main id="content">
    <section id="blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 blog-container row gap-2">

                    <?php while (have_posts()):
                        the_post() ?>
                        <?php get_template_part("template_parts/components/blog") ?>
                    <?php endwhile; ?>
                </div>
                <?php get_sidebar(); ?>
            </div>

            <div id="pagination">
                
                <!-- <nav class="pagination">
                    <span><a href="#">&lt; Previous</a></span>
                    <span class="number-pages current"><a href="#">1</a></span>
                    <span class="number-pages"><a href="#">2</a></span>
                    <span class="number-pages"><a href="#">3</a></span>
                    <span class="number-pages"><a href="#">4</a></span>
                    <span class="number-pages"><a href="#">5</a></span>
                    <span class="number-pages"><a href="#">6</a></span>
                    <span><a href="#">Next &gt;</a></span>
                </nav> -->
                <?php tevent_pagination() ?>
            </div>
        </div>
    </section>
</main>
<?php get_template_part("template_parts/footer") ?>