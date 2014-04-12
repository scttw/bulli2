<?php
class HomePage extends Page {

	private static $db = array(
	);	
	private static $has_many = array(
		'HomepageFeatures' => 'HomepageFeature'
	);
	//static $icon = "framework/docs/en/tutorials/_images/treeicons/home-file.gif";
	
	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Features', new GridField('HomepageFeatures', 'Homepage Feature', $this->HomepageFeatures(), GridFieldConfig_RecordEditor::create()));
		//$fields->addFieldToTab('Root.Images', new GridField('CarouselImages', 'Carousel Images', $this->CarouselImages(), GridFieldConfig_RecordEditor::create()));

		return $fields;
	}

}
class HomePage_Controller extends Page_Controller {
	private static $allowed_actions = array (
		"TopPodcast",
		"TopPodcastShortcodeHandler"
	);
	
	//ShortcodeParser::get('default')->register('podcast', array('Page_Controller', 'TopPodcast'));


	public function TopPodcast($arguments=null, $content=null) {
		function forTemplate() { return $this->renderWith('TopPodcast'); }
		//if(!isset($_GET['start']) || !is_numeric($_GET['start']) || (int)$_GET['start'] < 1) $_GET['start'] = 0;
		//$SQL_start = (int)$_GET['start']; 
		$children = Podcast::get()->first();
		$template = new SSViewer('TopPodcast');
		if( !$children )
			return null; 
		print_r($children);
		return $template->process(new ArrayData(array('TopPodcast' => $children)));
	}
  	public static function TopPodcastShortcodeHandler($arguments, $content = null, $parser = null) {
      $current = Controller::curr();
      return $current->TopPodcast();
      //return "Ahoy";
   	}

	public function init() {
		parent::init();

        Requirements::javascript('//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.1/masonry.pkgd.js');
        Requirements::javascript('themes/Bulli/javascript/homepage.js');

	}
}

