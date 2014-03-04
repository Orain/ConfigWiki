<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	exit( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
	'author' => 'Kudu',
	'descriptionmsg' => 'configwiki-desc',
	'name' => 'ConfigWiki',
	'path' => __FILE__,
	'url' => '//github.com/Orain/ConfigWiki'
);

$wgAutoloadClasses['SpecialConfigWiki'] = dirname( __FILE__ ) . '/SpecialConfigWiki.php';
$wgAutoloadClasses['SpecialGlobalConfigWiki'] = dirname( __FILE__ ) . '/SpecialGlobalConfigWiki.php';
$wgExtensionMessagesFiles['ConfigWiki'] = dirname( __FILE__ ) . '/ConfigWiki.i18n.php';
$wgExtensionMessagesFiles['ConfigWikiAlias'] = dirname( __FILE__ ) . '/ConfigWiki.alias.php';
$wgSpecialPages['ConfigWiki'] = 'SpecialConfigWiki';
$wgSpecialPages['GlobalConfigWiki'] = 'SpecialGlobalConfigWiki';

