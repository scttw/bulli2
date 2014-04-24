<?php
class CustomMember extends DataExtension {
 
 
    private static $has_one = array(
        'Image' => 'Image',
    );
 
    public function updateCMSFields(FieldList $fields) {
        $CurrentMemberID = Member::currentUserID(); 
        $fields->push($imageField = new UploadField('Image', 'Profile Image'));
        $imageField->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
        $path = preg_replace('/^' . ASSETS_DIR . '\//', '', 'Uploads/profile' . $CurrentMemberID);
        $imageField->setFolderName($path);   
    }
}