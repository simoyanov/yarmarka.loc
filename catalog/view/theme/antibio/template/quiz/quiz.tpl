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
                          
                  <div class="post-content">
                      <h2 class="post-title">Тест по теме Инфекции Верхних Дыхательных Путей</h2>
                      <div class="row wizard-text">
                          <div class="col-sm-12 text-center hidden-xs">
                              <ul class="pagination text-center pagination-default">
                                <?php $i = 1; ?> 
                                <?php foreach ($step_questions as $step) { ?>
                                  <li id="pstep_<?php echo $i ?>" class="disabled"><a href="#" data-step="<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php $i++; ?> 
                                <?php } ?>
                              </ul>
                          </div><!-- /.col-md-12 -->
                          <div class="col-sm-12 text-center hidden-sm hidden-md hidden-lg">
                            <p class="mobile-pagination">
                              <span class="active">1</span> из <span id="all_question">20</span>
                            </p>
                          </div><!-- /.col-md-12 -->
                          <div class="col-xs-12 col-sm-12 mt-20">
                            <?php $i = 1; ?> 
                            <?php foreach ($step_questions as $step) { ?>
                              <div class="module-step" id="step_<?php echo $i; ?>" >
                                <div class="module-question">
                                  <h4><?php echo $step['title']; ?></h4>
                                </div>
                                <div class="module-answer">
                                  <div class="col-xs-12 col-sm-12">
                                  <?php $j=1; ?>
                                  <?php foreach ($step['ar_questions'] as $question) {?>
                                    <div class="col-xs-12 col-sm-6 text-center">
                                      <div class="btn btn-block btn-base wizard-btn-answer mb-10" data-step="<?php echo $i; ?>" data-question="<?php echo $step['qitem_id']; ?>"  data-answer="<?php echo $question['question_id']; ?>" data-correct="<?php echo $question['correct']; ?>" data-comment="<?php echo $question['answer_comment']; ?>"><?php echo $question['question_id']; ?>) <?php echo $question['answer_title']; ?></div>
                                    </div>
                                    <?php $j++; ?>
                                  <?php } ?>
                                  </div>
                                </div>
                                <div class="module-comment">
                                  <div class="module-comment__block">
                                    <div class="module-comment__text">
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                            <p></p>
                                          </div>
                                        </div>
                                    </div><!-- /.module-comment__text -->
                                    <div class="module-comment__btn">
                                      <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3 text-center">
                                          <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                            <div class="btn btn-base btn-block wizard-btn-next-step" data-step="<?php echo $i; ?>">Продолжить</div>
                                          </div>
                                        </div>
                                      </div>
                                    </div><!-- /.module-comment__btn -->
                                  </div>
                                </div>
                              </div>
                            <?php $i++; ?> 
                            <?php } ?>
                            
                          </div><!-- /.col-xs-12 -->
                        </div>
                      </div>
                  </div>
                  <form id="poll-form" role="form" action="/#">
                    <input type="hidden" name="quiz_id" value="<?php echo $quiz_id;?>">
                  </form>
                  <script type="text/javascript">
                      var q = <?php echo $quiz_id; ?>;
                      var count_steps_of_wizard = <?php echo count($step_questions); ?>;
                      
                  </script>
                         


                  
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