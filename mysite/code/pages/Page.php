<?php
class Page extends SiteTree {
	private static $db = array(
		'PageStyle' => "Enum('orange, blue, lightblue, green, red')",
		'HasBanner' => 'boolean',
		'BannerContent' => 'HTMLText',
		'HasGallery' => 'Boolean',
		'Carousel' => 'Boolean'
	);
	private static $has_many = array(
		'GalleryImages' => 'GalleryImage'
	);
	private static $defaults = array(
		'PageStyle' => 'green',
		'HasBanner' => 0,
		'HasGallery' => 0,
		'Carousel' => 0
	);


	function getCMSFields() {
		$fields = parent::getCMSFields();

		$options = singleton('Page')->dbObject('PageStyle')->enumValues();
		$fields->addFieldToTab("Root.Main", new DropdownField("PageStyle", "Page colour scheme", $options), 'Content');

		$fields->addFieldToTab('Root.Banner', new CheckboxField('HasBanner'));
		$fields->addFieldToTab('Root.Banner', new HTMLEditorField('BannerContent'));

		$fields->addFieldToTab('Root.Gallery', new CheckboxField('HasGallery'));
		$fields->addFieldToTab('Root.Gallery', new CheckboxField('Carousel', 'Carousel style image rotator'));
		$fields->addFieldToTab('Root.Gallery', new GridField('GalleryImages', 'Gallery Images', $this->GalleryImages(), GridFieldConfig_RecordEditor::create()));
		return $fields;
	}    
}
class Page_Controller extends ContentController {
	private static $allowed_actions = array (
		"TopPodcast",
		"TopPodcastShortcodeHandler"
	);
	
	public function TopPodcast($arguments=null, $content=null) {
		function forTemplate() { return $this->renderWith('TopPodcast'); }
		//if(!isset($_GET['start']) || !is_numeric($_GET['start']) || (int)$_GET['start'] < 1) $_GET['start'] = 0;
		//$SQL_start = (int)$_GET['start']; 
		$children = Podcast::get()->first();
		$template = new SSViewer('TopPodcast');
		if( !$children )
			return null; 
		return $template->process(new ArrayData(array('TopPodcast' => $children)));
	}
  	public static function TopPodcastShortcodeHandler($arguments, $content = null, $parser = null) {
      $current = Controller::curr();
      return $current->TopPodcast();
      //return "Ahoy";
   	}

	public function onBeforeInit() {
        Requirements::javascript('//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js');
		
	}
	public function init() {
		parent::init();

		Requirements::css('themes/Bulli/css/normalize.css');
		Requirements::css('themes/Bulli/css/bootstrap.css');
		Requirements::css('themes/Bulli/css/bootstrap-responsive.css');
		Requirements::css('themes/Bulli/css/main.css');
		Requirements::css('themes/Bulli/css/site.css');
		
        Requirements::javascript('themes/Bulli/javascript/plugins.js');
        Requirements::javascript('themes/Bulli/javascript/main.js');
        Requirements::javascript('themes/Bulli/javascript/bootstrap.js');
        Requirements::javascript('themes/Bulli/javascript/site.js');
        if ( $this->HasGallery  ) {
	        if ( $this->Carousel ) {
				Requirements::javascript('themes/Bulli/javascript/3rdparty/jquery.flexslider.js');
				Requirements::css('themes/Bulli/javascript/3rdparty/flexslider.css');
		        Requirements::javascript('themes/Bulli/javascript/carousel.js');
	        } else {
				Requirements::css('themes/Bulli/css/gallery.css');
		        Requirements::javascript('themes/Bulli/javascript/gallery.js');
		        Requirements::javascript('//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.0.4/jquery.imagesloaded.min.js');
		        Requirements::javascript('//cdnjs.cloudflare.com/ajax/libs/fluidbox/1.2.5/jquery.fluidbox.min.js');
				Requirements::css('//cdnjs.cloudflare.com/ajax/libs/fluidbox/1.2.5/jquery.fluidbox.css');

	        }
        }	
	}

}