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
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="post-item">
                          <div class="post-content">
                              <h1 class="post-title"><?php echo $heading_title; ?></h1>
                              <div class="post-desc">
                               <?php echo $description; ?>
                              </div>
                          </div>
                        </div>
                          <hr>
                      </div>
                  </div>
                  <?php if(!empty($informations)){ ?> 
                  <div class="row">
                      <?php foreach ($informations as $infoval) { ?>
                        <div class="col-md-6">
                          <!-- Standard image post example -->
                          <div class="post-item style2 no-padding">
                            <div class="post-content-wr">
                                <div class="post-meta-top">
                                    <div class="post-image">
                                      <a href="<?php echo $infoval['information_href']; ?>">
                                        <img src="<?php echo $infoval['image']; ?>" alt="<?php echo $infoval['title']; ?>">
                                      </a>
                                    </div>
                                    <h2 class="post-title">
                                      <a href="<?php echo $infoval['information_href']; ?>"><?php echo $infoval['title']; ?></a>
                                    </h2>
                                </div>
                                <div class="post-content clearfix">
                                    <div class="post-tags hidden">Posted in <a href="#">HOTELS</a>, <a href="#">SPECIAL PROMOS</a>, <a href="#">SUMMER</a></div>
                                    <div class="post-comments"><strong>0</strong>комментариев</div>
                                    <div class="post-desc">
                                        <p><?php echo $infoval['sub_description']; ?></p>
                                    </div>
                                </div>
                                <div class="post-meta-bot clearfix hidden">
                                    <span class="post-author">WRITTEN BY <a href="#">MARC JACOBS</a></span>
                                    <a href="#" class="btn btn-sm btn-base">Read more</a>
                                </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    
                  </div>
                  <div class="pagination-delimiter">
                    <?php echo $pagination; ?>
                  </div>
                  <?php } ?>       

                  
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