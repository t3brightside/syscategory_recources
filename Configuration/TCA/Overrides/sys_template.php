<?php
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	'syscategory_resources',
	'Configuration/TypoScript/',
	'System Category Resources'
);
