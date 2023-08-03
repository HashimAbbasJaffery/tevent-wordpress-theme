
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