<?php defined('TYPO3_MODE') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'pi1',
	'FlexSlider 2'
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Flexslider2', 'FlexSlider 2');

$TCA['tt_content']['columns']['pi_flexform']['config']['ds'][','.$_EXTKEY.'_pi1'] = 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/flexform_fs2.xml';

$TCA['tt_content']['types'][$_EXTKEY . '_pi1']['showitem'] = '
		CType;;4;button;1-1-1,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
		pages;LLL:EXT:fs2/Resources/Private/Language/locallang.xml:tca.field.pages,
		records;LLL:EXT:fs2/Resources/Private/Language/locallang.xml:tca.field.records,
	--div--;LLL:EXT:fs2/Resources/Private/Language/locallang.xml:tca.tab.settings,
		pi_flexform,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
';

?>