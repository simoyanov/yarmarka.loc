<?php echo $header; ?>
<!-- Optional header components (ex: slider) -->
    <div class="pg-opt hidden">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Blog</h2>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li class="active">Large grid</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  <?php echo $content_top; ?>
  <!-- MAIN CONTENT -->
  <section class="slice bg-white">
      <div class="wp-section">
          <div class="container">
              <div class="row">
                <!-- CONTENT -->
                <?php if ($column_left) { ?>
                  <div class="col-sm-3">
                    <div class="sidebar">
                      <?php echo $column_left; ?>
                    </div>
                  </div>
                <?php } ?>

                <?php if ($column_left && $column_right) { ?>
                <?php $class = 'col-sm-5'; ?>
                <?php } elseif ($column_left || $column_right) { ?>
                <?php $class = 'col-sm-8'; ?>
                <?php } else { ?>
                <?php $class = 'col-sm-12'; ?>
                <?php } ?>
                <div class="<?php echo $class; ?>">
                  <div class="post-item">
                          <div class="post-meta-top">
                              <div class="post-image">
                                <img src="<?php echo $image; ?>" alt="<?php echo $heading_title; ?>">
                              </div>
                          </div>
                          <div class="post-content">
                              <h2 class="post-title"><a href="#" hidefocus="true" style="outline: none;"><?php echo $heading_title; ?></a></h2>
                              <span class="post-author hidden">WRITTEN BY <a href="#" hidefocus="true" style="outline: none;">James Franco</a></span>
                              <div class="post-tags hidden">Posted in <a href="#" hidefocus="true" style="outline: none;">HOTELS</a>, <a href="#" hidefocus="true" style="outline: none;">SPECIAL PROMOS</a>, <a href="#" hidefocus="true" style="outline: none;">SUMMER</a></div>
                              <div class="clearfix hidden"></div>
                              <div class="post-desc">
                               <?php echo $description; ?>
                              </div>
                          </div>
                          <hr>

                          <!-- Comments list section -->
                          <div class="comment-list clearfix hidden" id="comments">
                            <h2>4 Readers Commented</h2>
                            <a href="#divAddComment" class="link-add-comment anchor" hidefocus="true" style="outline: none;">Join Discussion</a>
                            <!-- Comments list -->
                            <ol>
                                <li class="comment">
                                    <div class="comment-body bb">
                                        <div class="comment-avatar">
                                            <div class="avatar"><img src="images/temp/avatar1.png" alt=""></div>
                                        </div>
                                        <div class="comment-text">
                                            <div class="comment-author clearfix">
                                                <a href="#" class="link-author" hidefocus="true" style="outline: none;">Brad Pit</a>
                                                <span class="comment-meta"><span class="comment-date">June 26, 2013</span> | <a href="#addcomments" class="link-reply anchor" hidefocus="true" style="outline: none;">Reply</a></span>
                                            </div>
                                            <div class="comment-entry">
                                                William Bradley "Brad" Pitt is an American actor and film producer. Pitt has received four Academy Award nominations and five Golden Globe.
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="comment">
                                    <div class="comment-body bb">
                                        <div class="comment-avatar">
                                            <div class="avatar"><img src="images/temp/avatar2.png" alt=""></div>
                                        </div>
                                        <div class="comment-text">
                                            <div class="comment-author clearfix">
                                                <a href="#" class="link-author" hidefocus="true" style="outline: none;">Ari Gold</a>
                                                <span class="comment-meta"><span class="comment-date">June 25, 2013</span> | <a href="#addcomments" class="link-reply anchor" hidefocus="true" style="outline: none;">Reply</a></span>
                                            </div>
                                            <div class="comment-entry">
                                                Ari Gold is Vincent Chase's neurotic movie agent. He was an undergrad at Harvard University before earning his J.D./M.B.A. at the University of Michigan. In addition to reprising the role for the upcoming prequels of
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="children">
                                        <li class="comment">
                                            <div class="comment-body bb">
                                                <div class="comment-avatar">
                                                    <div class="avatar"><img src="images/temp/avatar3.png" alt=""></div>
                                                </div>
                                                <div class="comment-text">
                                                    <div class="comment-author clearfix">
                                                        <a href="#" class="link-author" hidefocus="true" style="outline: none;">Elijah Wood</a>
                                                        <span class="comment-meta"><span class="comment-date">June 24, 2013</span> | <a href="#addcomments" class="link-reply anchor" hidefocus="true" style="outline: none;">Reply</a></span>
                                                    </div>
                                                    <div class="comment-entry">
                                                        Elijah Wood is an American actor best known for Frodo.
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="comment">
                                    <div class="comment-body bb">
                                        <div class="comment-avatar">
                                            <div class="avatar"><img src="images/temp/avatar4.png" alt=""></div>
                                        </div>
                                        <div class="comment-text">
                                            <div class="comment-author clearfix">
                                                <a href="#" class="link-author" hidefocus="true" style="outline: none;">Superman</a>
                                                <span class="comment-meta"><span class="comment-date">June 23, 2013</span> | <a href="#addcomments" class="link-reply anchor" hidefocus="true" style="outline: none;">Reply</a></span>
                                            </div>
                                            <div class="comment-entry">
                                                Superman is a fictional character, a comic book superhero who appears in comic books published by DC Comics.
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ol>
                        </div>

                         <div id="disqus_thread"></div>
                        <script>
                        /**
                        * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                        * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                        */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');

                        s.src = '//casejoke.disqus.com/embed.js';

                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

                      </div>

                  
                  <?php echo $content_bottom; ?>
                </div>

                <?php if ($column_right) { ?>
                  <div class="col-sm-4 ">
                    <!-- SIDEBAR -->
                    <div class="sidebar">
                      <?php echo $column_right; ?>
                    </div>
                  </div>
                <?php } ?>
              </div>
          </div>
      </div>
  </section>
<?php echo $footer; ?>