<?php

$categories_array ='
[Computers]
sm = Smartphones
ph = Photo
av = Audio/Video
ws = Workstation

[Houses]
ap = Appartments
ro = Rooms
hos = Hostels
ho = Houses

[Transport]
fo = Fourback
fb = Fullback
by = Bykes
ot = Other

[Other things]
fw = For work
fa = For transport
fh = For health
fd = For dislocation
';

$categories = parse_ini_string( $categories_array, true, INI_SCANNER_NORMAL );

?>