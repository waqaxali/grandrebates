<?php

return [
    'client_id' => 'AQY6c_oOIuYMgtaKNJ96OCPCJgZdPNzCxF-ClF0fwDxY5PkvVSRBg7--oIrN4sjIicwQhC0kbl6sOMg4',
	'secret' => 'EEfPK80Gf2HNbkrPslEPwbkEzNE1GkODWs5XdKpMh7_nciPsFpJJVZTx4Wpdsf5jhjq7HE50_edOXBQW',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];

?>
