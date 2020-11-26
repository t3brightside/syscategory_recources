<?php
$EM_CONF[$_EXTKEY] = [
	'title' => 'System Category Resources',
	'description' => 'Add images and files field to sys_category',
	'category' => 'fe',
	'version' => '0.0.1',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Tanel Põld',
	'author_email' => 'tanel@brightside.ee',
	'author_company' => 'Brightside OÜ / t3brightside.com',
	'constraints' => [
		'depends' => [
			'typo3' => '10.4.0 - 10.4.99',
		],
	],
];
