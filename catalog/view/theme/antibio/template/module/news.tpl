<!-- CATEGORY NEWS -->
<div class="section-title-wr">
    <h3 class="section-title left"><span><?php echo $heading_title; ?></span></h3>
</div>
<div class="mb-20">
	<?php $i = 1; ?>
	<?php foreach ($all_news as $news) { ?>
		<?php if($i == 1) { ?>
			<div class="wp-block article grid bb">
		        <div class="article-image">
		            <a href="<?php echo $news['view']; ?>">
						<img src="<?php echo $news['image']['h']; ?>" alt="">
					</a>
		        </div>
		        <h3 class="title">
		            <a href="<?php echo $news['view']; ?>"><?php echo $news['full_title']; ?></a>
		        </h3>
		        <p>
		        <?php echo $news['short_description']; ?>
		        </p>
		    </div>
		<?php } else { ?>
			 <div class="wp-block article list bb">
                <div class="article-image">
                    <a href="<?php echo $news['view']; ?>">
						<img src="<?php echo $news['image']['w']; ?>" alt="">
					</a>
                </div>
                <div class="wp-block-body">
                    <h3 class="title">
                       <a href="<?php echo $news['view']; ?>"><?php echo $news['title']; ?></a>
                    </h3>
                    <p>
                     <?php echo $news['short_description']; ?>
                    </p>
                </div>
            </div>

		<?php } ?>
		
	    <?php $i++; ?>
	<?php } ?>
    
</div>