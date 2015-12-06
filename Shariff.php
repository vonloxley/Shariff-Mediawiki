<?php
/*
 * Parser that inserts social media buttons
 *
 * For more info see http://mediawiki.org/wiki/Extension:TwitterFBLike
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Niki Hansche
 * @copyright © 2014 Niki Hansche
 * @licence The MIT License (MIT)
 */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Shariff', 
	'author' => 'Niki Hansche', 
	'url' => 'https://github.com/vonloxley/Shariff-Mediawiki',
	'description' => 'Insert 2-click "Like" buttons.',
);

$wgResourceModules['ext.Shariff'] = array(
	'scripts' => 'shariff.min.js',
	'styles' => 'shariff.min.css',
	'position' => 'bottom',

	'localBasePath' => __DIR__,
	'remoteExtPath' => 'Shariff',
);

$wgHooks['ParserFirstCallInit'][] = 'shariffLikeParserFunction_Setup';
$wgHooks['LanguageGetMagic'][]       = 'shariffLikeParserFunction_Magic';
$wgHooks['BeforePageDisplay'][] = 'shariffLikeParserFeedHead';

function shariffLikeParserFunction_Setup( &$parser ) {
	# Set a function hook associating the "shariffLike_parser" magic word with our function
	$parser->setFunctionHook( 'shariffLike', 'shariffLikeParserFunction_Render' );
	return true;
}
 
function shariffLikeParserFunction_Magic( &$magicWords, $langCode ) {
        //Set first parameter to 1 to make it case sensitive
	$magicWords['shariffLike'] = array( 0, 'ShariffLike' );
        return true;
}

function shariffLikeParserFeedHead(&$out, &$sk) {
	$out->addModules( 'ext.Shariff' );

	return $out;
}

 
function shariffLikeParserFunction_Render( &$parser, $param1 = '', $param2 = '', $param3 = '' ) {
	global $wgSitename;
	global $wgScriptPath;
	
	//Get page title and URL
	$output = '<div class="shariff noprint" data-backend-url="'.$wgScriptPath.'/extensions/Shariff/shariff-backend/" data-services="[&quot;twitter&quot;,&quot;facebook&quot;,&quot;googleplus&quot;]"></div>';

	return $parser->insertStripItem($output, $parser->mStripState);;
}
