
ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
            center: [55.76, 37.64],
            zoom: 11
        }, {
            searchControlProvider: 'yandex#search'
        });
        myMap.behaviors.disable('scrollZoom');
      myMap.behaviors.disable('multiTouch');
    myMap.behaviors.disable('drag');
    
    jQuery.getJSON('data.json', function (json) {
            var myObjects = ymaps.geoQuery(json);
            for(i=0;i<myObjects._objects.length;i++){
                myObjects._objects[i].options.set({
                    iconLayout: 'default#image',
                    iconImageHref: 'images/map-marker.png',
                    iconImageSize: [49, 40],
                    iconImageOffset: [-20, -20]
                });
                myObjects._objects[i].events.add('click', function () {
                    $('#mapModal').modal('show')
                });
            }
            myObjects.addToMap(myMap);
            function checkState() {
                var shownObjects,
                    byName = new ymaps.GeoQueryResult();

                if (n == 1) {
                    byName = myObjects.search('properties.name == "yar1"');
                } else if (n == 2) {
                    byName = myObjects.search('properties.name == "yar2"');
                } else if (n == 3) {
                    byName = myObjects.search('properties.name == "yar3"');
                } else if (n == 4) {
                    byName = myObjects.search('properties.name == "yar4"');
                } else if (n == 5) {
                    byName = myObjects.search('properties.name == "yar5"');
                }
                shownObjects = byName.addToMap(myMap);
                myObjects.remove(byName).removeFromMap(myMap);
            }
            $(document).ready(function() {
                $('.map-but1').click(function() {
                    checkState(1);
                });
                $('.map-but2').click(function() {
                    checkState(2);
                });
                $('.map-but3').click(function() {
                    checkState(3);
                });
                $('.map-but4').click(function() {
                    checkState(4);
                });
                $('.map-but5').click(function() {
                    checkState(5);
                });
            });
        
        
        
        });
}
    
