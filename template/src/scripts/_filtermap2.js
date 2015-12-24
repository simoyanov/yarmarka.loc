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
          'news_id':_place_id
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
                    if(obj.success){
                      /*
                      html += '<h3>'+ obj.news_title +'</h3>';
                      html += '<div class="del-line"></div>';
                      html += '<img src="'+ obj.news_image +'" alt="" width="100%">';
                      html += obj.news_description;
                      console.log(html);
                      $('.news-modal-content').empty().html(html);
                      */
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

