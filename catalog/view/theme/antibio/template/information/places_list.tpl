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
                  <div class="section-title-wr">
                      <h3 class="section-title left"><span><?php echo $heading_title; ?></span></h3>
                  </div>

                 <div class="row multi-columns-row">
                   <form action="" class="sky-form">
                  <div id="filter_date_in"></div>
                  </form>
                   <?php if(!empty($places)) { ?>
                    <?php foreach ($places as $place) { ?>
                      <div class="col-md-6">
                          <div class="wp-block article grid">
                              <div class="article-image">
                                  <a href="<?php echo $place['place_href']; ?>">
                                    <img src="<?php echo $place['image']; ?>" alt="<?php echo $place['place_title']; ?>">
                                  </a>
                              </div>
                              <h3 class="title">
                                  <a href="<?php echo $place['place_href']; ?>"><?php echo $place['place_title']; ?></a>
                              </h3>
                              <p><?php echo $place['description']; ?></p>
                          </div>
                      </div>

                      <?php } ?>
                  <?php } ?>
                </div>
                <!-- PAGINATION -->
                  <div class="row">
                    <div class="col-sm-12 text-center m-t-60">
                      <?php echo $pagination; ?>
                    </div>
                  </div>
                <!-- /PAGINATION -->

                  
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
