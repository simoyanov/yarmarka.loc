
var _fermer_btn = '.fermer_btn';
var fermers= {
	init:function(){
		fermers.initMap();
		fermers.initBnt();
		$('#feremerModal').on('shown.bs.modal', function () {
			 console.log('callback -открытие фермер');
		});
	},
	initBnt:function(){
		$(_fermer_btn).on(MOUSE_DOWN,function(e){
			e.preventDefault();
			console.log($(this).attr('data-fermer_id'));
			var fermer_id = $(this).attr('data-fermer_id');
			var data = {
				'fermer_id':fermer_id
			};
		 	var url = 'fermer.json';
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
	                var html = '',
                        people_info = '',
                        fermer_address = '',
                        fermer_form = '', 
                        fermer_carousel = '',
                        mmm_content_info = '',
                        mmm_content_contact = '';
	               	if(obj.success){
                        // собираем карусель
                        for(i=0;i<obj.fermer_images.length; i++){
                            if (i == 0){
                                fermer_carousel += '<div class="item active"><img src="images/'+obj.fermer_images[i]+'" width="100%" alt=""></div>';
                            } else {
                                fermer_carousel += '<div class="item"><img src="images/'+obj.fermer_images[i]+'" width="100%" alt=""></div>';
                            }
                        }
                        $('#myFermerCarousel .carousel-inner').html(fermer_carousel);
                        
                        //собираем информацию о фермере
                        people_info += '<div class="avatar"  style="background-image: url(../images/'+obj.avatar+');"><div class="like"><span>18</span></div></div>';
                        people_info += '<div class="name">'+obj.second_name+' '+obj.first_name+' '+obj.third_name'</div>'
                        people_info += '<div class="profession">'obj.prof'</div>';
                        people_info += '<div class="category">Категория товаров:<span>'+obj.category+'</span></div>';
                        var social_info = '';
                        if (obj.vk !== ''){
                            social_info += '<a class="modal-vk" href="'+obj.vk+'"></a>';
                        }
                        if (obj.ok !== ''){
                            social_info += '<a class="modal-ok" href="'+obj.ok+'"></a>';
                        }
                        if (social_info !== ''){
                            people_info += '<div class="social">'+social_info+'</div>';
                        }
                        fermer_address += '<div class="fermer-add-row"><span>О себе</span>'+obj.about+'<div class="modal-line"></div></div>';
                        fermer_address += '<div class="fermer-add-row"><span>Где купить?</span>'+obj.locate+'<div class="modal-line"></div></div>';
                        fermer_address += '<div class="fermer-add-row"><span>Адрес</span>'+obj.adress+'<div class="modal-line"></div></div>';
                        //если существуем почта собираем форму
                        if(obj.email !== ''){
                            fermer_form += '<form action="">';
                            fermer_form += '<p>Оставьте сообщение фермеру</p>';
                            fermer_form += '<input name="Имя" type="text" placeholder="Ваше имя">';
                            fermer_form += '<input name="e-mail" type="text" placeholder="Ваш e-mail">';
                            fermer_form += '<textarea name="message" type="text" placeholder="Ваше сообщение"></textarea>';
                            fermer_form += '<button>Отправить</button>';
                            fermer_form += '</form>';
                        }
                        
                        $('#feremerModal .fermer-modal-info').html('<div class="people-info">'+people_info+'</div><div class="fermer-address">'+fermer_address+'</div>'+fermer_form);
                        //собираем всплывашку на карте
                        mmm_content_info += '<h3>'+obj.locate_info.title+'</h3>';
                        mmm_content_info += '<div id="myModalMapCarousel" class="carousel slide" data-ride="carousel"><div class="carousel-inner" role="listbox">';
                        for(i=0;i<obj.locate_info.images.length; i++){
                            if (i == 0){
                                mmm_content_info +='<div class="item active"><img src="images/'+obj.locate_info.images[i]+'" alt=""></div>';
                            } else {
                                mmm_content_info +='<div class="item"><img src="images/'+obj.locate_info.images[i]+'" alt=""></div>';
                            }
                        }
                        mmm_content_info += '<a class="left carousel-control" href="#myModalMapCarousel" role="button" data-slide="prev"><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myModalMapCarousel" role="button" data-slide="next"><span class="sr-only">Next</span></a></div>';
                        mmm_content_info += '<p>'+obj.locate_info.text+'</p>';
                        mmm_content_info += '<div class="popup-category">категории товаров<span>'+obj.locate_info.category+'</span></div>';
                        $('#fermer-mmm .mmm-content-info').html(mmm_content_info);
                        mmm_content_contact += '<div class="popup-time">график работы<span>'+obj.locate_info.work_time+'</span></div>';
                        mmm_content_contact += '<div class="popup-hotline">горячая линия<span>'+obj.locate_info.phone+'</span></div>';
                        mmm_content_contact += '<a href="" class="how">как стать участником?</a><div class="social"><a href="" class="vk"></a><a href="" class="ok"></a><a href="" class="twit"></a></div>';
                        $('#fermer-mmm .mmm-content-contact').html(mmm_content_contact);
                        
	               	
	                $('#fermerModal').modal('show');
	                    
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
	getDescription:function(){
		
	}
};