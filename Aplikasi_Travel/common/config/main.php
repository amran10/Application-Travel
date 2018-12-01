<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
			'class' => 'yii\redis\Cache',
		],
		'authClientCollection' => [
				'class' => 'yii\authclient\Collection',
				'clients' => [
				'facebook' => [
					'class' => 'yii\authclient\clients\Facebook',
					'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
					'clientId' => '1723254804587797',
					'clientSecret' => '9e56186f608976732693ebe8b7e80b47',
				],
				'google' => [
					'class' => 'yii\authclient\clients\Google',
					'clientId' => '790837375344-siqagti7qfin23br8uibl9n9b9e2iv4c.apps.googleusercontent.com',
				'clientSecret' => 'L2uUJ6I0XN91kazNyL31ylGp',
				],
			],
		],
],

    

];
