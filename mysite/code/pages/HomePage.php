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

	public function init() {
		parent::init();

        Requirements::javascript('//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.1/masonry.pkgd.js');
        Requirements::javascript('themes/Bulli/javascript/homepage.js');

	}
}

