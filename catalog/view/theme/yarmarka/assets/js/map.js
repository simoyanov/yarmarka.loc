/*************************************************************/
    ymaps.ready(function () {
    var mySpecMap = new ymaps.Map('spec-modal-map', {
            center: [55.751574, 37.573856],
            zoom: 9
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
        myFermerPlacemark.events.add('click', function () {
        $('#mapModal').modal('show')
    });
    myFermerMap.geoObjects.add(myFermerPlacemark);
});

