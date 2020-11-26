<?php
    defined('TYPO3_MODE') || die('Access denied.');

    call_user_func(
        function () {
            $tempColumns = array(
                'tx_syscategory_resources_images' => [
                    'exclude' => 1,
                    'label' => 'Images',
                    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                        'tx_syscategory_resources_images',
                        [
                            'behaviour' => [
                                'allowLanguageSynchronization' => true,
                            ],
                            'overrideChildTca' => [
                                'types' => [
                                    '0' => [
                                        'showitem' => '
                                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                            --palette--;;filePalette'
                                    ],
                                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                        'showitem' => '
                                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                            --palette--;;filePalette'
                                    ],
                                ],
                            ],
                        ],
                        $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
                    ),
                ],
                'tx_syscategory_resources_files' => [
                    'exclude' => 1,
                    'label' => 'Files',
                    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                        'tx_syscategory_resources_files',
                        [
                            'behaviour' => [
                                'allowLanguageSynchronization' => true,
                            ],
                            'overrideChildTca' => [
                                'types' => [
                                    '0' => [
                                        'showitem' => '
                                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                            --palette--;;filePalette'
                                    ],

                                ],
                            ],
                        ],
                    ),
                ],
            );

            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns ( 'sys_category', $tempColumns );
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
                'sys_category',
                '--div--;Resources,--palette--;;syscategory_resources,',
                '1',
                'after:items'
            );
            $GLOBALS['TCA']['sys_category']['palettes']['syscategory_resources']['showitem'] = '
              tx_syscategory_resources_images,
              --linebreak--,tx_syscategory_resources_files,
            ';
        }
    );
