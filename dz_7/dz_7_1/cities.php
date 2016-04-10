<?php

$regions_array ='
[Moscowia]
77 = Moscow
78 = S-Peterburg
93 = Krasnodar
96 = Ekaterinburg

[West_Siberia]
55 = Omsk
154 = Novosibirsk
72 = Tumen
86 = Han. Mans

[East_Siberia]
88 = Krasnoyarsk
85 = Irkutsk
103 = Ulan
84 = Norilsk

[Far_East]
125 = Vladivostok
24 = Habarovsk
25 = Nahodka
28 = Blagovechensk
';
        
$russland = parse_ini_string( $regions_array, true, INI_SCANNER_NORMAL );

?>