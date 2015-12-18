
ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
            center: [55.76, 37.64],
            zoom: 11
        }, {
            searchControlProvider: 'yandex#search'
        });
        myMap.behaviors.disable('scrollZoom');
      myMap.behaviors.disable('MultiTouch');
    
    jQuery.getJSON('data.json', function (json) {
            var myObjects = ymaps.geoQuery(json);
            for(i=0;i<myObjects._objects.length;i++){
                myObjects._objects[i].options.set({
                    iconLayout: 'default#image',
                    iconImageHref: 'src/images/map-marker.png',
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

                if ($('#map-but1').attr("value") == "fair-weekend") {
                    byName = myObjects.search('properties.name == "yar1"');
                }
                if ($('#map-but2').attr("value") == "fair-region") {
                    byName = myObjects.search('properties.name == "yar2"');
                }
                if ($('#map-but3').attr("value") == "food-markets") {
                    byName = myObjects.search('properties.name == "yar3"');
                }
                if ($('#map-but4').attr("value") == "festivals") {
                    byName = myObjects.search('properties.name == "yar4"');
                }
                if ($('#map-but5').attr("value") == "special-offer") {
                    byName = myObjects.search('properties.name == "yar5"');
                }
                if ($('#map-mini-but1').attr("value") == "fair-weekend") {
                    byName = myObjects.search('properties.name == "yar1"');
                }
                if ($('#map-mini-but2').attr("value") == "fair-region") {
                    byName = myObjects.search('properties.name == "yar2"');
                }
                if ($('#map-mini-but3').attr("value") == "food-markets") {
                    byName = myObjects.search('properties.name == "yar3"');
                }
                if ($('#map-mini-but4').attr("value") == "festivals") {
                    byName = myObjects.search('properties.name == "yar4"');
                }
                if ($('#map-mini-but5').attr("value") == "special-offer") {
                    byName = myObjects.search('properties.name == "yar5"');
                }
                if ($('#dummy-map-but1').attr("value") == "fair-weekend") {
                    byName = myObjects.search('properties.name == "yar1"');
                }
                if ($('#dummy-map-but2').attr("value") == "fair-region") {
                    byName = myObjects.search('properties.name == "yar2"');
                }
                if ($('#dummy-map-but3').attr("value") == "food-markets") {
                    byName = myObjects.search('properties.name == "yar3"');
                }
                if ($('#dummy-map-but4').attr("value") == "festivals") {
                    byName = myObjects.search('properties.name == "yar4"');
                }
                if ($('#dummy-map-but5').attr("value") == "special-offer") {
                    byName = myObjects.search('properties.name == "yar5"');
                }
                shownObjects = byName.addToMap(myMap);
                myObjects.remove(byName).removeFromMap(myMap);
            }
            $(document).ready(function() {
                $('#map-but1').click(function() {
                    $('#map-but1').attr("value","fair-weekend");
                    if ($('#map-but1').attr("value") == "fair-weekend") {
                        checkState();
                        $('#map-but1').removeAttr("value");
                    }
                });
                $('#map-but2').click(function() {
                    $('#map-but2').attr("value","fair-region");
                    if ($('#map-but2').attr("value") == "fair-region") {
                        checkState();
                        $('#map-but2').removeAttr("value");
                    }
                });
                $('#map-but3').click(function() {
                    $('#map-but3').attr("value","food-markets");
                    if ($('#map-but3').attr("value") == "food-markets") {
                        checkState();
                        $('#map-but3').removeAttr("value");
                    }
                });
                $('#map-but4').click(function() {
                    $('#map-but4').attr("value","festivals");
                    if ($('#map-but4').attr("value") == "festivals") {
                        checkState();
                        $('#map-but4').removeAttr("value");
                    }
                });
                $('#map-but5').click(function() {
                    $('#map-but5').attr("value","special-offer");
                    if ($('#map-but5').attr("value") == "special-offer") {
                        checkState();
                        $('#map-but5').removeAttr("value");
                    }
                });
                $('#map-mini-but1').click(function() {
                    $('#map-mini-but1').attr("value","fair-weekend");
                    if ($('#map-mini-but1').attr("value") == "fair-weekend") {
                        checkState();
                        $('#map-mini-but1').removeAttr("value");
                    }
                });
                $('#map-mini-but2').click(function() {
                    $('#map-mini-but2').attr("value","fair-region");
                    if ($('#map-mini-but2').attr("value") == "fair-region") {
                        checkState();
                        $('#map-mini-but2').removeAttr("value");
                    }
                });
                $('#map-mini-but3').click(function() {
                    $('#map-mini-but3').attr("value","food-markets");
                    if ($('#map-mini-but3').attr("value") == "food-markets") {
                        checkState();
                        $('#map-mini-but3').removeAttr("value");
                    }
                });
                $('#map-mini-but4').click(function() {
                    $('#map-mini-but4').attr("value","festivals");
                    if ($('#map-mini-but4').attr("value") == "festivals") {
                        checkState();
                        $('#map-mini-but4').removeAttr("value");
                    }
                });
                $('#map-mini-but5').click(function() {
                    $('#map-mini-but5').attr("value","special-offer");
                    if ($('#map-mini-but5').attr("value") == "special-offer") {
                        checkState();
                        $('#map-mini-but5').removeAttr("value");
                    }
                });
                $('#dummy-map-but1').click(function() {
                    $('#dummy-map-but1').attr("value","fair-weekend");
                    if ($('#dummy-map-but1').attr("value") == "fair-weekend") {
                        checkState();
                        $('#dummy-map-but1').removeAttr("value");
                    }
                });
                $('#dummy-map-but2').click(function() {
                    $('#dummy-map-but2').attr("value","fair-region");
                    if ($('#dummy-map-but2').attr("value") == "fair-region") {
                        checkState();
                        $('#dummy-map-but2').removeAttr("value");
                    }
                });
                $('#dummy-map-but3').click(function() {
                    $('#dummy-map-but3').attr("value","food-markets");
                    if ($('#dummy-map-but3').attr("value") == "food-markets") {
                        checkState();
                        $('#dummy-map-but3').removeAttr("value");
                    }
                });
                $('#dummy-map-but4').click(function() {
                    $('#dummy-map-but4').attr("value","festivals");
                    if ($('#dummy-map-but4').attr("value") == "festivals") {
                        checkState();
                        $('#dummy-map-but4').removeAttr("value");
                    }
                });
                $('#dummy-map-but5').click(function() {
                    $('#dummy-map-but5').attr("value","special-offer");
                    if ($('#dummy-map-but5').attr("value") == "special-offer") {
                        checkState();
                        $('#dummy-map-but5').removeAttr("value");
                    }
                });

            });
        
        
        
        });
}
    
