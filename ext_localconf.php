<?php defined('TYPO3_MODE') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'B263.' . $_EXTKEY,
	'pi1',
	array(
		'Flexslider2' => 'index',
	),
	array(),
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

$pageTsConfig = <<<'EOT'
	mod.wizards.newContentElement.wizardItems.special.elements.fs2_pi1 {
		icon = gfx/c_wiz/user_defined.gif
		title = FlexSlider 2
		description = Slider for content elements
		tt_content_defValues {
			CType = fs2_pi1
		}
	}
	mod.wizards.newContentElement.wizardItems.special.show := addToList(fs2_pi1)
EOT;
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($pageTsConfig);

?>