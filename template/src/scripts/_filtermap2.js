var myMap,objectManager;

var filtermap = {
  init:function(){
    console.log('ready map');
    myMap = new ymaps.Map('map', {
        center: [55.76, 37.64],
        zoom: 11
    }, {
        searchControlProvider: 'yandex#search'
    });
    objectManager = new ymaps.ObjectManager({
        // Чтобы метки начали кластеризоваться, выставляем опцию.
        clusterize: false,
        geoObjectOpenBalloonOnClick: false,
        clusterOpenBalloonOnClick: true
    });
    objectManager.clusters.options.set({
        preset: 'islands#grayClusterIcons',
        maxZoom: 10,
        gridSize:10,
        hintContentLayout: ymaps.templateLayoutFactory.createClass('Группа объектов')
    });
    objectManager.objects.options.set({
                    iconLayout: 'default#image',
                    iconImageHref: 'images/map-marker.png',
                    iconImageSize: [49, 40],
                    iconImageOffset: [-20, -20]
                });
     myMap.geoObjects.add(objectManager);
     objectManager.objects.events.add(['click'], filtermap.onObjectEvent);
  
    if(!mobile){
      myMap.behaviors.disable('scrollZoom');
      myMap.behaviors.disable('multiTouch');
     // myMap.behaviors.disable('drag');
    }else{
      myMap.behaviors.disable('multiTouch');  
    }
    filtermap.getInfoAboutPlaces(0);
    $(document).on(MOUSE_DOWN,'.filter-btn',function(e){
      e.preventDefault();
      var type_place = $(this).attr('data-type');
      //добавить активность кнопки - !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      filtermap.getInfoAboutPlaces(type_place);
    });
  },
  drawPlace:function(_json){
    console.log(_json);
    console.log('as');
    objectManager.removeAll()
    objectManager.add(_json);
  },
  onObjectEvent:function(e){
      var objectId = e.get('objectId');
      console.log(objectId);
      filtermap.getInfoAboutPlace(objectId);
  },
  getInfoAboutPlace:function(_place_id){
       
        var data = {
          'place_id':_place_id
        };
        var url = 'agetplaceinfo';
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
                    var info_html = '';
                    if(obj.success){
                 /*     [place_id] => 90
    [place_date] => 2015-12-24 06:38:41
    [image] => 
    [latitude_longitude] => 55.6836,37.4531
    [metro_id] => 0
    [type_id] => 17
    [place_category] => 1
    [visibility] => 1
    [status] => 1
    [date_added] => 2015-12-24 06:38:41
    [language_id] => 2
    [title] => Ярмарка выходного дня
    [description] => 
    [place_time] => 
    [place_period] => 
    [place_phone] => 
    [address] => Улица Наташи Ковшовой, дом 6
    [metro] => 
    [meta_title] => Ярмарка выходного дня
    [meta_description] => 
    [meta_keyword] => 
    [keyword] => 
                      <h3>ярмарка тамбовской области</h3>
                     */
                      html += '<h3>'+ obj.place_info.title +'</h3>';
                      if(obj.place_image){
                        html += '<div id="myMapCarousel" class="carousel slide col-lg-5 col-md-12" data-ride="carousel">';
                        html += '<div class="carousel-inner" role="listbox">';
                        html += '<div class="item active">';
                        html += '<img src="'+obj.place_image+'" alt="">';
                        html += '</div>';
                        html += '</div>';
                       /* html += '<a class="left carousel-control" href="#myMapCarousel" role="button" data-slide="prev">';
                        html += '<span class="sr-only">Previous</span>';
                        html += '</a>';
                        html += '<a class="right carousel-control" href="#myMapCarousel" role="button" data-slide="next">';
                        html += '<span class="sr-only">Next</span>';
                        html += '</a>';*/
                        html += '</div>';
                        html += '<div class="col-lg-7  col-md-12">';
                        html += obj.place_info.description;
                        html += '</div>';

                      }else{
                        html += '<div class="col-lg-12  col-md-12">';
                        html += obj.place_info.description;
                        html += '</div>';
                      }
                      console.log(html);
                      $('.map-popup-content').empty().html(html);
                      
                      info_html += '<div class="map-popup-info-center">';
                      console.log('place_period' + obj.place_info.place_period);
                      info_html += '<div class="popup-time">';
                       if(obj.place_info.place_period){
                        info_html += 'график работы<span>'+ obj.place_info.place_period + ' ' + obj.place_info.place_time+ '</span>';
                      }
                      info_html += '</div>';
                      if(obj.place_info.address){
                        info_html  += '<div class="popup-adress">адрес<span>Москва,'+ obj.place_info.address +'</span></div>';
                      }
                      if(obj.place_info.place_phone){
                        info_html  += '<div class="popup-hotline">горячая линия<span>'+ obj.place_info.place_phone +'</span></div>';
                      }
                      
                      info_html  += '</div>';
                       if( parseInt(obj.place_info.type_id) == 17){
                        info_html  += '<a href="https://pgu.mos.ru/ru/services/link/1056" target="_blank" class="how">как стать участником?</a>';
                      }
                      
                      $('.map-popup-info').empty().html(info_html);
                      
                      $('#mapModal').modal('show')  
                    }else{
                       console.log('не удалось расшарить');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText  + "\r\n" +xhr);
                } 
            });
  },
  getInfoAboutPlaces:function(category){
    console.log(category);
    //добавить прелоадер - !!!!!!!!!!!!!!!!!!!!!!!!
    var url = 'agetplaces';
    $.getJSON(url,{
      category:category
    })
    .done(function(json){
      filtermap.drawPlace(json);
    });
  }
};

