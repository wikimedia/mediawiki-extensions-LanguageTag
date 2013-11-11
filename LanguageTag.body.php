<?php
 
/**
 * LanguageTag extension from D250 Laboratories
 *
 * @file
 * @ingroup Extensions
 * @author István Király <LaKing@D250.hu>
 */
 
 
// It is assumed that the $wgLanguageTagLanguages is defined in LocalSettings.php, in a line before this file is included with require.
// If this extension is used together with the LanguageSelector extension, ideally $wgLanguageTagLanguages is identical with $wgLanguageSelectorLanguages
// Since the Tag's are not acessible in the hooked render functions (no way to access that parameter at runtime without altering the mediawiki base code)
// render-functions for all language-tag's will be created. First setting the hook's.
 
class LanguageTag 
{
 
    public static function LanguageTagParserInit( Parser $parser ) {
 
        // at runtime TagLanguages is in the global scope
        global $wgLanguageTagLanguages;
        foreach ($wgLanguageTagLanguages as $Tag) $parser->setHook( $Tag, 'LanguageTag::LanguageTagRender_'.$Tag );
 
        unset($Tag);
        // theoretically nothing to return or fail.
        return true;
    }
 
    // This function is helpful in checking against the passed Language
 
    public static function LanguageTagCheck($input, $lang) {
        $output= htmlspecialchars($input);
 
        global $wgLang;
 
        if ( $wgLang->getCode()===$lang ) {
           // Match. The Language (set by LanguageSelector) is equal to the language tag.
           return $output;
        } else {
           // Other wise we return the text as html-comment, thus not visible in the browser.
           return '<!-- '.$lang.': '.$output.' -->';
        }
    }
 
    // This will catch all LanguageTagRender_XX functions attached to the hooks.
    // LanguageTagRender_ this is 18 characters, we get the language code from the function's name, and access everything else passed in via $arguments
    public static function __callStatic($name, $arguments)
    {
       return $arguments[2]->recursiveTagParse( LanguageTag::LanguageTagCheck($arguments[0], substr($name,18)), $arguments[3] );
    }
 
 
}
// end class LanguageTag