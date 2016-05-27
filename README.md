# Gees Gii
SetUP

'modules' => [
        ....
		'gridview' =>  [
			'class' => '\kartik\grid\Module'
		],
		.....
],

/** Gii Setup **/
$config['bootstrap'][] = 'geesgii';
    $config['modules']['geesgii'] = [
        'class' => 'richkay\geesgii\Geesgii',
];