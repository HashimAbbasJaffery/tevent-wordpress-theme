<?php get_template_part("template_parts/header") ?>
<main id="content">
    <section id="blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 blog-container row gap-4">

                <?php while( have_posts() ) : the_post() ?>
                    <?php get_template_part("template_parts/components/blog") ?>                    
                <?php endwhile; ?>
                </div>
                
                <?php get_template_part("template_parts/components/sidebar") ?>
            </div>
        </div>
    </section>
</main>
<?php get_template_part("template_parts/footer") ?>