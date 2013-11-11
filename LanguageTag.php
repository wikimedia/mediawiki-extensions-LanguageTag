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
$wgExtensionCredits['validextensionclass'][] = array(
        'path'           => __FILE__,
        'name'           => 'LanguageTag',
        'version'        => '1.0', // 2013.10.28
        'author'         => 'István Király', 
        'url'            => 'https://www.mediawiki.org/wiki/Extension:LanguageTag',
//      'descriptionmsg' => 'Language Tag extension', // Message key in i18n file.
        'description'    => 'This extension allows to use XML-style language tags to markup different languages, and display them properly.'
);
 
 
$wgAutoloadClasses['LanguageTag'] = __DIR__ . '/LanguageTag.body.php';
$wgHooks['ParserFirstCallInit'][] = 'LanguageTag::LanguageTagParserInit';