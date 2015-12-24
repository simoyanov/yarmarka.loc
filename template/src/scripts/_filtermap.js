var myMap, myCollection,myGeoObjects, MyBalloonContentLayoutClass;
var clusterIcons=[{
      href:'http://gmaps-utility-library.googlecode.com/svn/trunk/markerclusterer/images/m1.png',
      size:[53,52],
      offset:[0,0]
    }];
var clusterNumbers=[100];

var filtermap = {
  init:function(){
    console.log('ready map');
    myMap = new ymaps.Map('map', {
        center: [55.76, 37.64],
        zoom: 11
    }, {
        searchControlProvider: 'yandex#search'
    });
    myCollection = new ymaps.GeoObjectCollection();
    if(!mobile){
      myMap.behaviors.disable('scrollZoom');
      myMap.behaviors.disable('multiTouch');
     // myMap.behaviors.disable('drag');
    }
    filtermap.getInfoAboutPlace(0);
    $(document).on(MOUSE_DOWN,'.filter-btn',function(e){
      e.preventDefault();
      var type_place = $(this).attr('data-type');
      filtermap.getInfoAboutPlace(type_place);
    });
  },
  drawPlace:function(_json){
    console.log(_json);
    console.log('as');
    myCollection.removeAll();   
    for (i = 0; i < _json.markers.length; i++) {
          // Создаем метку.
        
      //    console.log(_json.markers[i]);
          var placemark = new ymaps.Placemark([_json.markers[i].lat,_json.markers[i].lon],
            {
                  name: _json.markers[i].place_title,
                  description: _json.markers[i].place_title,     
                  hintContent: _json.markers[i].place_title
            },
            {
              // Опции.
              // Необходимо указать данный тип макета.
              iconLayout: 'default#image',
              iconImageHref: 'images/map-marker.png',
              iconImageSize: [49, 40],
              iconImageOffset: [-20, -20]
          });
          placemark.events.add('click', function(e) {
             //здесь получаю координаты
            console.log(e);
           });        
          myCollection.add(placemark);

      }

      myMap.geoObjects.add(myCollection);
  
  },
  getInfoAboutPlace:function(category){
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

