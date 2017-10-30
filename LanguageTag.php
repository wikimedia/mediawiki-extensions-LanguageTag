<?php

/**
 * LanguageTag extension from D250 Laboratories
 *
 * @file
 * @ingroup Extensions
 * @author István Király <LaKing@D250.hu>
 */

// Yes, this is an extension, not a standalone script, we are coming from LocalSettings.php
if( !defined( 'MEDIAWIKI' ) ) {
        echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
        die( -1 );
}

// Standard crediting
$wgExtensionCredits['parserhook'][] = array(
        'path'           => __FILE__,
        'name'           => 'LanguageTag',
        'version'        => '1.1.0',
        'author'         => 'István Király',
        'url'            => 'https://www.mediawiki.org/wiki/Extension:LanguageTag',
	'descriptionmsg' => 'languagetag-desc',
);

$wgMessagesDirs['LanguageTag'] = __DIR__ . '/i18n';
$wgAutoloadClasses['LanguageTag'] = __DIR__ . '/LanguageTag.body.php';
$wgHooks['ParserFirstCallInit'][] = 'LanguageTag::LanguageTagParserInit';
