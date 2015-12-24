function showMapModal(n){
    $("#fermer-mmm-"+n+"").css('display','block');
    $("#close-fermer-mmm-"+n+"").click(function(){
        $("#fermer-mmm-"+n+"").css('display','none');
    });
}

/*************************************************************/
    ymaps.ready(function () {
    var mySpecMap = new ymaps.Map('spec-modal-map1', {
            center: [55.605826, 37.531235],
            zoom: 13
        }, {
            searchControlProvider: 'yandex#search'
        }),
        mySpecPlacemark = new ymaps.Placemark(mySpecMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        mySpecMap.behaviors.disable('scrollZoom');
        mySpecMap.behaviors.disable('multiTouch');
        mySpecMap.behaviors.disable('drag');
        mySpecPlacemark.events.add('click', function () {
        $('#mapModal').modal('show')
    });

    mySpecMap.geoObjects.add(mySpecPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var mySpecMap = new ymaps.Map('spec-modal-map2', {
            center: [55.758732, 37.40672],
            zoom: 13
        }, {
            searchControlProvider: 'yandex#search'
        }),
        mySpecPlacemark = new ymaps.Placemark(mySpecMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        mySpecMap.behaviors.disable('scrollZoom');
        mySpecMap.behaviors.disable('multiTouch');
        mySpecMap.behaviors.disable('drag');
        mySpecPlacemark.events.add('click', function () {
        $('#mapModal').modal('show')
    });

    mySpecMap.geoObjects.add(mySpecPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var mySpecMap = new ymaps.Map('spec-modal-map3', {
            center: [55.79266, 37.775981],
            zoom: 13
        }, {
            searchControlProvider: 'yandex#search'
        }),
        mySpecPlacemark = new ymaps.Placemark(mySpecMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        mySpecMap.behaviors.disable('scrollZoom');
        mySpecMap.behaviors.disable('multiTouch');
        mySpecMap.behaviors.disable('drag');
        mySpecPlacemark.events.add('click', function () {
        $('#mapModal').modal('show')
    });

    mySpecMap.geoObjects.add(mySpecPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var mySpecMap = new ymaps.Map('spec-modal-map4', {
            center: [55.751574, 37.573856],
            zoom: 13
        }, {
            searchControlProvider: 'yandex#search'
        }),
        mySpecPlacemark = new ymaps.Placemark(mySpecMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        mySpecMap.behaviors.disable('scrollZoom');
        mySpecMap.behaviors.disable('multiTouch');
        mySpecMap.behaviors.disable('drag');
        mySpecPlacemark.events.add('click', function () {
        $('#mapModal').modal('show')
    });

    mySpecMap.geoObjects.add(mySpecPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var myFermerMap = new ymaps.Map('fermer-modal-map', {
            center: [55.751574, 37.573856],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myFermerPlacemark = new ymaps.Placemark(myFermerMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        
        myFermerMap.behaviors.disable('scrollZoom');
        myFermerMap.behaviors.disable('multiTouch');
        myFermerMap.behaviors.disable('drag');
        myFermerPlacemark.events.add('click', function () {
        $("#fermer-mmm").css('display','block');
        $("#close-fermer-mmm").click(function(){
            $("#fermer-mmm").css('display','none');
        });
    });
    myFermerMap.geoObjects.add(myFermerPlacemark);
});


/*************************************************************/
    ymaps.ready(function () {
    var myFermerMap = new ymaps.Map('fermer-modal-map1', {
            center: [55.751574, 37.573856],
            zoom: 12
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myFermerPlacemark = new ymaps.Placemark(myFermerMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        
        myFermerMap.behaviors.disable('scrollZoom');
        myFermerMap.behaviors.disable('multiTouch');
        myFermerMap.behaviors.disable('drag');
        myFermerPlacemark.events.add('click', function(){
            showMapModal(1);
        });
    myFermerMap.geoObjects.add(myFermerPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var myFermerMap = new ymaps.Map('fermer-modal-map2', {
            center: [55.751574, 37.573856],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myFermerPlacemark = new ymaps.Placemark(myFermerMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        
        myFermerMap.behaviors.disable('scrollZoom');
        myFermerMap.behaviors.disable('multiTouch');
        myFermerMap.behaviors.disable('drag');
        myFermerPlacemark.events.add('click', function(){
            showMapModal(2);
        });
    myFermerMap.geoObjects.add(myFermerPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var myFermerMap = new ymaps.Map('fermer-modal-map3', {
            center: [55.751574, 37.573856],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myFermerPlacemark = new ymaps.Placemark(myFermerMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        
        myFermerMap.behaviors.disable('scrollZoom');
        myFermerMap.behaviors.disable('multiTouch');
        myFermerMap.behaviors.disable('drag');
        myFermerPlacemark.events.add('click', function(){
            showMapModal(3);
        });
    myFermerMap.geoObjects.add(myFermerPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var myFermerMap = new ymaps.Map('fermer-modal-map4', {
            center: [55.751574, 37.573856],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myFermerPlacemark = new ymaps.Placemark(myFermerMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        
        myFermerMap.behaviors.disable('scrollZoom');
        myFermerMap.behaviors.disable('multiTouch');
        myFermerMap.behaviors.disable('drag');
        myFermerPlacemark.events.add('click', function(){
            showMapModal(4);
        });
    myFermerMap.geoObjects.add(myFermerPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var myFermerMap = new ymaps.Map('fermer-modal-map5', {
            center: [55.751574, 37.573856],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myFermerPlacemark = new ymaps.Placemark(myFermerMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        
        myFermerMap.behaviors.disable('scrollZoom');
        myFermerMap.behaviors.disable('multiTouch');
        myFermerMap.behaviors.disable('drag');
        myFermerPlacemark.events.add('click', function(){
            showMapModal(5);
        });
    myFermerMap.geoObjects.add(myFermerPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var myFermerMap = new ymaps.Map('fermer-modal-map6', {
            center: [55.751574, 37.573856],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myFermerPlacemark = new ymaps.Placemark(myFermerMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        
        myFermerMap.behaviors.disable('scrollZoom');
        myFermerMap.behaviors.disable('multiTouch');
        myFermerMap.behaviors.disable('drag');
        myFermerPlacemark.events.add('click', function(){
            showMapModal(6);
        });
    myFermerMap.geoObjects.add(myFermerPlacemark);
});

/*************************************************************/
    ymaps.ready(function () {
    var myFermerMap = new ymaps.Map('fermer-modal-map7', {
            center: [55.751574, 37.573856],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myFermerPlacemark = new ymaps.Placemark(myFermerMap.getCenter(), {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.png',
            iconImageSize: [49, 40],
            iconImageOffset: [-20, -20]
        });
        
        myFermerMap.behaviors.disable('scrollZoom');
        myFermerMap.behaviors.disable('multiTouch');
        myFermerMap.behaviors.disable('drag');
        myFermerPlacemark.events.add('click', function(){
            showMapModal(7);
        });
    myFermerMap.geoObjects.add(myFermerPlacemark);
});

