<?php
/**
 * Represents an image and title that can be associated with a page
 */
class Family extends DataObject {
	
	public static $db = array(
		'Surname' => 'Varchar(100)',
	);

	public static $has_many = array(
		'Members'	=> 'Member'
	);
	public static $has_one = array(
		'Head'	=> 'Member'
	);
    static $summary_fields = array(
        'Surname'
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