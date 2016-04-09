<?php

$Moscowia = 'Moscow
S-Peterburg
Krasnodar
Ekaterinburg';
$Moscowia = explode("\n", $Moscowia);

$West_Siberia = 'Omsk
Novosibirsk
Tumen
Han. Mans.';
$West_Siberia = explode("\n", $West_Siberia);

$East_Siberia = 'Krasnoyarsk
Irkutsk
Ulan
Norilsk';
$East_Siberia = explode("\n", $East_Siberia);

$Far_East = 'Vladivostok
Habarovsk
Nahodka
Blagovechensk';
$Far_East = explode("\n", $Far_East);

$russland = array(
    'Moscowia' => $Moscowia,
    'West_Siberia' => $West_Siberia,
    'East_Siberia' => $East_Siberia,
    'Far_East' => $Far_East
                  );

?>