<?php

use dosamigos\leaflet\types\LatLng;
use dosamigos\leaflet\layers\Marker;
use dosamigos\leaflet\layers\TileLayer;
use dosamigos\leaflet\LeafLet;
use dosamigos\leaflet\widgets\Map; 

// first lets setup the center of our map
$center = new LatLng(['lat' => 16.11456, 'lng' => 100.235664]);

// now lets create a marker that we are going to place on our map
$marker = new Marker(['latLng' => $center, 'popupContent' => 'Hi!']);


$tileLayer1 = new TileLayer([
   'urlTemplate' => 'http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',
    'clientOptions' => [
        'subdomains' => ['mt0','mt1','mt2','mt3'],
    ],
]);
$tileLayer2 = new TileLayer([
   'urlTemplate' => 'http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',
    'clientOptions' => [
        'subdomains' => ['mt0','mt1','mt2','mt3'],
    ],
]);

// now our component and we are going to configure it
$leaflet = new LeafLet([
    'center' => $center, // set the center
    'zoom'=>8
]);
// Different layers can be added to our map using the `addLayer` function.
$leaflet->addLayer($marker)    // add the marker
        ->addLayer($tileLayer1);
        //->addLayer($tileLayer2);  // add the tile layer

// finally render the widget
//echo Map::widget(['leafLet' => $leaflet]);

// we could also do
echo $leaflet->widget(['options' => ['style' => 'height: 460px']]);
        