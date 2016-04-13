<?php

$Electronics = 'Computers
Smartphones
Photo
Audio&Video';
$Electronics = explode("\n", $Electronics);

$Realty = 'Houses
Appartments
Rooms
Hostels';
$Realty = explode("\n", $Realty);

$Transport = 'SportCars
Fourback
Bykes
Other';
$Transport = explode("\n", $Transport);

$Other = 'For House
For work
For auto
For Health';
$Other = explode("\n", $Other);

$categories = array(
    'Electronics' => $Electronics,
    'Realty' => $Realty,
    'Transport' => $Transport,
    'Other' => $Other
                	);

?>