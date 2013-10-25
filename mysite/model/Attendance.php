<?php
/**
 * Represents an image and title that can be associated with a page
 */
class Attendance extends DataObject {
	
	public static $db = array(
		'Date' => 'Date',
	);

	public static $has_many = array(
		'Members'	=> 'Member'
	);
	public static $has_one = array(
		'Meeting' => 'Meeting'
	);
	static $summary_fields = array(
		'Date',
		'Meeting'
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