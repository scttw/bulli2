<?php
/**
 * Represents an image and title that can be associated with a page
 */
class Meeting extends DataObject {
	
	public static $db = array(
		'Name' => 'Varchar(100)',
		'Location' => 'Varchar(100)',
		'StartTime' => 'Varchar(100)',
		'EndTime' => 'Varchar(100)',
		'Day' => 'Varchar(100)',
	);

	public static $has_many = array(
		'Members'	=> 'Member'
	);
	public static $has_one = array(
		'Leader'	=> 'Member'
	);
	static $summary_fields = array(
		'Name'
	);
    public function canView($member = null) {
        return Permission::check('CMS_ACCESS_ChurchAdmin', 'any', $member);
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_ChurchAdmin', 'any', $member);
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_ChurchAdmin', 'any', $member);
    }

    public function canCreate($member = null) {
        return Permission::check('CMS_ACCESS_ChurchAdmin', 'any', $member);
    }



}