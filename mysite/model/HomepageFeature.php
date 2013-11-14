<?php
/**
 * Represents an image and title that can be associated with a page
 */
class HomepageFeature extends DataObject {
	
	public static $db = array(
		'HasTitle' => 'boolean',
		'Title' => 'Varchar(100)',
		'Feature'		=> 'HTMLText',
		'Priority' => "Enum('1, 2, 3, 4, 5, 6, 7, 8, 9')",
		'FullWidth' => 'boolean',
	);
	static $default_sort = "Priority ASC"; 
	static $defaults = array(
		'HasTitle' => true,
		'Priority' => 5
	);

	public static $has_one = array(
		'ParentPage'	=> 'Page'
	);
    public function canView($member = null) {
        return $this->ParentPage()->canEdit($member);
    }
    public function canEdit($member = null) {
        return $this->ParentPage()->canEdit($member);
    }
    public function canDelete($member = null) {
        return $this->ParentPage()->canEdit($member);
    }
    public function canCreate($member = null) {
        return $this->ParentPage()->canEdit($member);
    }

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->removeByName('ParentPageID');
		return $fields;
	}

}