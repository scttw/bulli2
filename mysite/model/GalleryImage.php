<?php
/**
 * Represents an image and title that can be associated with a page
 */
class GalleryImage extends DataObject {

	public static $db = array(
		'Title' => 'Varchar(100)',
		'Priority' => 'Enum("1,2,3,4,5,6,7,8,9")'
	);

	public static $has_one = array(
		'Image'			=> 'Image',
		'ParentPage'	=> 'Page'
	);
	static $default_sort = "Priority ASC, Title ASC"; 
	static $defaults = array(
		'Priority' => 5
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