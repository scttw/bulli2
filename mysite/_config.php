<?php

global $project;
$project = 'mysite';

include_once dirname(__FILE__).'/local.conf.php';

MySQLDatabase::set_connection_charset('utf8');

// Set the current theme. More themes can be downloaded from
// http://www.silverstripe.org/themes/
SSViewer::set_theme('Bulli');
FulltextSearchable::enable();


// Set the site locale
i18n::set_locale('en_US');

// Enable nested URLs for this site (e.g. page/sub-page/)
if (class_exists('SiteTree')) SiteTree::enable_nested_urls(); 
Member::add_extension("CustomMember"); 

ShortcodeParser::get('default')->register(
	'WeeksOfPrayer', array('Page_Controller', 'WeeksShortCodeHandler')
);
ShortcodeParser::get('default')->register(
    'TopPodcast', array('Page_Controller', 'TopPodcastShortcodeHandler')
);
ShortcodeParser::get('default')->register(
    'Iframe', array('Page_Controller', 'IframeShortCodeHandler')
);

HtmlEditorConfig::get('cms')->setOption('extended_valid_elements', 
    'div[class|id|style|title],' .
    'span[class|id|style|title]'
);