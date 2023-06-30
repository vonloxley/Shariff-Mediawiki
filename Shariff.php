<?php
/*
 * Parser that inserts social media buttons
 *
 * For more info see http://mediawiki.org/wiki/Shariff
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Niki Hansche
 * @copyright © 2014-2018 Niki Hansche
 * @licence The MIT License (MIT)
 */

class Shariff {
	static function shariffLikeParserFunction_Setup( &$parser ) {
		# Create a magic word
		MediaWiki\MediaWikiServices::getInstance()->getContentLanguage()->mMagicExtensions['shariffLike'] = ['shariffike', 'ShariffLike'];
		# Set a function hook associating the "shariffLike_parser" magic word with our function
		$parser->setFunctionHook( 'shariffLike', 'Shariff::shariffLikeParserFunction_Render' );
		return true;
	}

	static function shariffLikeParserFeedHead(&$out, &$sk) {
		$out->addModules( 'ext.Shariff' );

		return true;
	}

 
	static function shariffLikeParserFunction_Render( &$parser, $param1 = '', $param2 = '', $param3 = '' ) {
		global $wgSitename;
		global $wgScriptPath;
		global $wgLanguageCode;

		if (substr($wgLanguageCode, 0, 3) === 'de-') {
			$datalang = "de";
			}
		else {
			$datalang = $wgLanguageCode;
		}
		
		//Get page title and URL
		$output = '<div class="shariff noprint" data-lang="'.$datalang.'" data-services="[&quot;twitter&quot;,&quot;facebook&quot;,&quot;pinterest&quot;]"></div>';

		return $parser->insertStripItem($output, $parser->getStripState());
	}
}
