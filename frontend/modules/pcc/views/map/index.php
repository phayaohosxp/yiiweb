<?php
$this->registerCssFile('//api.mapbox.com/mapbox.js/v3.1.1/mapbox.css', ['async' => false, 'defer' => true]);
$this->registerJsFile('//api.mapbox.com/mapbox.js/v3.1.1/mapbox.js', ['position' => $this::POS_HEAD]);

//ค้นหารายชื่อ
$this->registerCssFile('../../lib-gis/leaflet-search.min.css', ['async' => false, 'defer' => true]);
$this->registerCssFile('../../lib-gis/leaflet.label.css', ['async' => false, 'defer' => true]);
$this->registerJsFile('../../lib-gis/leaflet-search.min.js', ['position' => $this::POS_HEAD]);
$this->registerJsFile('../../lib-gis/leaflet.label.js', ['position' => $this::POS_HEAD]);

?>


<h4>แผนที่บ้านผู้ป่วย</h4>
<div id='map' style="width: 100%; height: 75vh;">


</div>


<?php

use frontend\modules\pcc\models\Person;

$model = Person::find()->asArray()->all();
$person_point = [];
foreach ($model as $value) {
    if ($value['lat'] * 1 > 0) {
        $person_point[] = [
            'type' => 'Feature',
            'properties' => [
                'PRENAME' => $value['prename'],
                'NAME' => $value['name'],
                'LNAME' => $value['lname'],
                'COLOR' => $value['rapid'],
                'SEARCH_TEXT' => $value['name'],
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [$value['lon'] * 1, $value['lat'] * 1]
            ],
        ];
    }
}


/*
  $person_point[] = [
  'type' => 'Feature',
  'properties' => [
  'NAME' => 'นาย ก',
  'LNAME' => 'ใจดี',
  ],
  'geometry' => [
  'type' => 'Point',
  'coordinates' => [99, 19]
  ],
  ];

  $person_point[] = [
  'type' => 'Feature',
  'properties' => [
  'NAME' => 'นาง ข',
  'LNAME' => 'ใจดี',
  ],
  'geometry' => [
  'type' => 'Point',
  'coordinates' => [99.456, 19.545]
  ],
  ];
 */


$person_point = json_encode($person_point);



use frontend\modules\pcc\models\TambonGis;
$model = TambonGis::find()->asArray()->all();
$tambon_pol = [];


foreach ($model as $value){
    
    $tambon_pol[] = [
        'type'=> 'Feature',
        'properties'=> [],
        'geometry' => [
            'type'=> 'MultiPolygon',
            'coordinates' => json_decode($value['COORDINATES']),
        ]
        
    ];
}

$tambon_pol = json_encode($tambon_pol);

$js = <<<JS
        
L.mapbox.accessToken = 'pk.eyJ1IjoicGhheWFvaG9zeHAiLCJhIjoiY2ozMmd3cjhzMDAyZzJ3bzhjNmFqaWVtMCJ9.0Xy6TvLkwLA4lHkcP2aY_A';
var map = L.mapbox.map('map', 'mapbox.streets')
    .setView([19.195945, 99.87253], 9); 
      
var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
var googleStreet = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
        
var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
        
var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
//http://stackoverflow.com/questions/9394190/leaflet-map-api-with-google-satellite-layer
        
var baseLayers = {
	"OSM ภูมิประเทศ": L.mapbox.tileLayer('mapbox.streets'),  
        "OSM ถนน":L.tileLayer('//{s}.tile.osm.org/{z}/{x}/{y}.png'),
        "OSM ดาวเทียม": L.mapbox.tileLayer('mapbox.satellite'),
        "Google Hybrid":googleHybrid,
        "Google Street":googleStreet.addTo(map),
        "Google ภูมิประเทศ ": googleTerrain
 };
        

     
 var marker = L.marker(new L.LatLng(19.195945, 99.87253), {
    draggable: true
});

//marker.addTo(map);    
        
marker.on("dragend",function(e){
        var pos = e.target.getLatLng();
        this.bindPopup(pos.toString()).openPopup();
    });        

var _group1 = L.layerGroup().addTo(map);  
var _group2 = L.layerGroup(); 
   
 var ic_green   =L.mapbox.marker.icon({'marker-color': '#228B22'});  
 var ic_yellow   =L.mapbox.marker.icon({'marker-color': '#FFFF00'});
 var ic_red   =L.mapbox.marker.icon({'marker-color': '#FF0000'});  
 var ic_white   =L.mapbox.marker.icon({'marker-color': '#FFFFFF'});  
        
        
var home = L.geoJson($person_point,{
   onEachFeature:function(feature,layer){
       layer.bindPopup(feature.properties.NAME+feature.properties.NAME+' '+feature.properties.LNAME);
       
   switch(feature.properties.COLOR){
           case  'red':
           layer.setIcon(ic_red);
           break;
        
           case  'yellow':
           layer.setIcon(ic_yellow);
           break;
        
           case  'green':
           layer.setIcon(ic_green);
           break;
       
            default: 
            layer.setIcon(ic_white);
   }
        
   } 
   
   }).addTo(_group1);  
        
 var tambon = L.geoJson($tambon_pol).addTo(map);       
        
       
        map.fitBounds(tambon.getBounds());
        
marker.addTo(_group2);
        
        
        
var overlays = {
   "บ้านผู้ป่วย" : _group1,
   "ลากตำแหน่ง" : _group2
   };  
        
       
L.control.layers(baseLayers,overlays).addTo(map);
        
  
    var searchControl = new L.Control.Search({
		layer: home,
		propertyName: 'SEARCH_TEXT',
		circleLocation: false,
		
    });
    searchControl.on('search:locationfound', function(e) {
				
		if(e.layer._popup)e.layer.openPopup();
    }).on('search:collapsed', function(e) {
		pt_layer.eachLayer(function(layer) {	
			pt_layer.resetStyle(layer);
		});	
    });
    map.addControl( searchControl );  
 
        
        
JS;
$this->registerJs($js);
