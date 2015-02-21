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

	private static $casting = array(
        'WeeksShortCodeHandler' => 'HTMLText'
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
		"TopPodcastShortcodeHandler",
		"SearchForm"
	);
	
   	/**
   	 * 77 Days of Prayer promo.
   	 */
   	public function DaysOfPrayer () {
   		$weeks = array(
			"Week 1" => "For our church as we work at making disciples of Jesus; to meet and exceed the budget and for giving to be generous & joyful.",
			"Week 2" => "For property meetings & building plans that allow for Gospel growth. For Jesus to shape our families, parents discipling their kids, for marriages & grandparents.",
			"Week 3" => "Youth ministry - youth leaders, families & other adults to get alongside youth. Evangelism in high schools. Our annual general meeting.",
			"Week 4" => "Children’s Ministry - leaders, families & all to love, teach & nurture children; EE Seven Nations Conference - for attendees, their Gospel ministry & ours.",
			"Week 5" => "Overseas Gospel ministry; church leaders, those on mission - the Scarratt’s serving South America, the Harvey’s in the Pacific, the Hatton’s in Africa.",
			"Week 6" => "Serving ministries - as we make disciples in the local context; for people to step up and serve Jesus with humility & love - for ‘people’ opportunities and ‘practical’ opportunities to serve. ",
			"Week 7" => "Women’s ministry - that our church would faithfully disciple and encourage women to follow Jesus and continue to become like him.",
			"Week 8" => "Easter - inviting people to hear about Jesus; for renewed love & gratitude to God for our salvation. Easter Youth Camp - leaders, campers & new believers in Christ.",
			"Week 9" => "Pray for men’s ministry. For our men to befriend other blokes, speak to them about Jesus, read God’s word together and disciple them.",
			"Week 10" => "For our church vision to be faithful, clear and captivating - so that it leads to great zeal, love, generosity and each of us serving together for the sake of Jesus. ",
			"Week 11" => "Towards Belief Series - for our church to invite people; for open, gracious conversations, for us to listen, for people to begin their journey towards faith in Jesus."
   		);
		$startweek = new DateTime('2015-02-15');

//		return $this->datediffInWeeks(date('Y-m-d'), $startweek), date('Y-m-d'));
	    $weekssince = floor($startweek->diff(new DateTime('NOW'))->days/7)+1;
		if ($weekssince<12) {
		    return "<strong>Week $weekssince</strong>: " . $weeks['Week '.$weekssince];
		}
		return false;
   	}

	public static function WeeksShortCodeHandler($arguments, $content = null, $parser = null, $tagName) {
        $current = Controller::curr();
        return '<div class="weeks">'.$current->DaysOfPrayer().'</div>';
    }
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

	// public function onBeforeInit() {
 //        
	static function PodcastShortCodeHandler(){
	   $current = Controller::curr();
	   return $current->renderWith('Podcast');
   }
   function SearchForm() {
      $searchText = isset($_REQUEST['Search']) ? $_REQUEST['Search'] : 'Search Huh?';
      $fields = new FieldList(
       new TextField("Search", "", $searchText)
       );
      $actions = new FieldList(
       new FormAction('results', 'Search')
       );
       $form = new SearchForm($this, "SearchForm", $fields, $actions);
		$form->setFormAction(Director::baseURL()."searchresults/SearchForm");
		return $form;
   }

	public function init() {
		parent::init();
		Requirements::themedCSS('reset');
		Requirements::themedCSS('layout'); 
		Requirements::themedCSS('typography'); 
		Requirements::themedCSS('form'); 

		Requirements::css('themes/Bulli/css/normalize.css');
		Requirements::css('themes/Bulli/css/bootstrap.css');
		Requirements::css('//fonts.googleapis.com/css?family=Oxygen:300');
		Requirements::css('themes/Bulli/css/main.css');
		Requirements::css('themes/Bulli/css/site.css');
		Requirements::javascript('//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js');
        Requirements::javascript('themes/Bulli/javascript/plugins.js');
        Requirements::javascript('themes/Bulli/javascript/bootstrap.js');
        Requirements::javascript('themes/Bulli/javascript/site.js');
        Requirements::javascript('themes/Bulli/javascript/main.js');
		Requirements::block(FRAMEWORK_DIR .'/thirdparty/jquery/jquery.js');
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