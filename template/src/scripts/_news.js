var $news_container = $('#news_items');
var _news_btn = '.news_btn';
var news= {
	init:function(){
		news.initGrid();
		news.initBnt();
		$('#newsModal').on('shown.bs.modal', function () {
			 console.log('callback -открытие новости');
		});
	},
	initBnt:function(){
		$(_news_btn).on(MOUSE_DOWN,function(e){
			e.preventDefault();
			console.log($(this).attr('data-news_id'));
			var news_id = $(this).attr('data-news_id');
			var data = {
				'news_id':news_id
			};
		 	var url = 'agetnewsinfo';
	        $.ajax({
	            url: url,
	            type: 'POST',
	            data: data,
	            dataType: 'json',
	            beforeSend: function() {},  
	            complete: function() {},
	            success: function(obj) {
	                console.log(obj);
	                //очищаем контент в форме 
	                var html = '';
	               	if(obj.success){
	               		html += '<h3>'+ obj.news_title +'</h3>';
                        html += '<div class="del-line"></div>';
                        html += '<img src="'+ obj.news_image +'" alt="" width="100%">';
                      	html += obj.news_description;
                      	console.log(html);
                        $('.news-modal-content').empty().html(html);
	                	$('#newsModal').modal('show');
	                    
	                }else{
	                   console.log('не удалось расшарить');
	                }
	            },
	            error: function(xhr, ajaxOptions, thrownError) {
	                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText  + "\r\n" +xhr);
	            } 
	        });
			
		});
	},
	initGrid:function(){

		$news_container.imagesLoaded(function(){
			$news_container.masonry({
				itemSelector : '.item',
				columnWidth : 290,
				isAnimated: true,
		        isFitWidth: true
			});
		});
	},
	getDescription:function(){
		
	}
};