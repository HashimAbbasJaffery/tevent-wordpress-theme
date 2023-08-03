<?php get_template_part("template_parts/header") ?>
<main id="content">
    <section id="blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 blog-container row gap-4">

                    <?php get_template_part("template_parts/components/blog") ?>                    
                    <?php get_template_part("template_parts/components/blog") ?>                    
                    <?php get_template_part("template_parts/components/blog") ?>                    
                    <?php get_template_part("template_parts/components/blog") ?>                    
                    <?php get_template_part("template_parts/components/blog") ?>                    

                </div>
                <aside class="col-lg-4">
                    <div class="categories">
                        <h1>categories</h1>
                        <nav>
                            <ul style="padding: 0px;">
                                <li><a href="#">news<sup>6</sup></a></li>
                                <li><a href="#">user experiences<sup>9</sup></a></li>
                                <li><a href="#">features<sup>7</sup></a></li>
                                <li><a href="#">development<sup>11</sup></a></li>
                                <li><a href="#">user interfaces<sup>3</sup></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="recent-blogs">
                        <h1>recent blog posts</h1>
                        <div class="recent-blog">
                            <div class="recent-blog-thumbnail">&nbsp;</div>
                            <div class="recent-blog-info">
                                <time datetime="2003-03-17">17 March, 2003</time>
                                <h2>Lorem, ipsum dolor.</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, placeat.</p>
                            </div>
                        </div>
                        <div class="recent-blog">
                            <div class="recent-blog-thumbnail">&nbsp;</div>
                            <div class="recent-blog-info">
                                <time datetime="2003-03-17">17 March, 2003</time>
                                <h2>Lorem, ipsum dolor.</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, placeat.</p>
                            </div>
                        </div>
                        <div class="recent-blog">
                            <div class="recent-blog-thumbnail">&nbsp;</div>
                            <div class="recent-blog-info">
                                <time datetime="2003-03-17">17 March, 2003</time>
                                <h2>Lorem, ipsum dolor.</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, placeat.</p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>
<?php get_template_part("template_parts/footer") ?>