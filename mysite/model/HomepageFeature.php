<?php
/**
 * Represents an image and title that can be associated with a page
 */
class HomepageFeature extends DataObject {

	public static $db = array(
		'HasTitle'  => 'boolean',
		'Title'     => 'Varchar(100)',
		'Feature'   => 'HTMLText',
		'Priority'  => "Enum('1, 2, 3, 4, 5, 6, 7, 8, 9')",
		'FullWidth' => 'boolean',
		'Online'    => 'boolean',
		'Expiry'	=> 'SS_DateTime'
	);
	static $default_sort = "Priority ASC";
	static $defaults = array(
		'HasTitle' => true,
		'Online'   => 1,
		'Priority' => 5
	);
	public static $summary_fields = array(
		'Title',
		'Priority',
		'Online.Nice',
		'Expiry.Nice'
	);

	public static $has_one = array(
		'ParentPage'	=> 'Page'
	);
    public function canView($member = null) {
        return $this->ParentPage()->canView($member);
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

	public function Enabled () {
        if ($this->Expiry) {
            if ($this->obj('Expiry')->InPast()) {
                return false;
            }
        }
        return true;
	}

}