# Gees Gii
=============

##Usage

Once the extension is installed. Prepare required table by execute yii migrate.
```
yii migrate --migrationPath=@richkay/geesgii/migrations
```

```
**SetUP**
-------------
'modules' => [
        ....
		'gridview' =>  [
			'class' => '\kartik\grid\Module'
		],
		.....
],
```
```
**Gii Setup** 
-----------------
$config['bootstrap'][] = 'geesgii';<br/>
    $config['modules']['geesgii'] = [
        'class' => 'richkay\geesgii\Geesgii',
];
```
