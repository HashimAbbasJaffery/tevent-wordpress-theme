
<aside class="col-lg-4">
                            <div class="categories">
                                <h1>categories</h1>
                                <nav>
                                    <p><?php echo get_option("blogdescription") ?><p>
                                    <ul style="padding: 0px;">
                                        <?php 
                                            $categories = get_categories();
                                            foreach($categories as $category):
                                        ?>
                                            <li><a href="<?php echo get_category_link($category) ?>"><?php echo $category->name ?><sup><?php echo $category->category_count ?></sup></a></li>
                                        <?php endforeach; ?>
                                        <li><a href="<?php echo home_url( "/blog/" ) ?>">All</a></li>
                                        <!-- <li><a href="#">user experiences<sup>9</sup></a></li>
                                        <li><a href="#">features<sup>7</sup></a></li>
                                        <li><a href="#">development<sup>11</sup></a></li>
                                        <li><a href="#">user interfaces<sup>3</sup></a></li> -->
                                    </ul>
                                </nav>
                            </div>
                            <div class="recent-blogs">
                                <h1>recent blog posts</h1>
                                    <?php 
                                        rewind_posts();
                                        query_posts([
                                            "posts_per_page" => 3,
                                            "post__not_in" => [( !is_home() )? get_the_ID() : ""]
                                        ]);
                                    ?>
                                    <?php while( have_posts() ) : the_post() ?>
                                        <?php get_template_part("template_parts/components/recentBlogs") ?>                    
                                    <?php endwhile; ?>
                            </div>
                        </aside>