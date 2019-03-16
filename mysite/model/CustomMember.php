<?php
class CustomMember extends DataExtension {
 
 
    private static $db = array(
                'Service' => "Enum('8am, 10am, 5pm, Other')"
    );
    private static $has_one = array(
        'Image' => 'Image',
    );
 
   public function getCMSFields() {
      $this->extend('updateCMSFields', $fields);
      return $fields;
   }
   
    public function updateCMSFields(FieldList $fields) {

        $options = singleton('Member')->dbObject('Service')->enumValues();
        $fields->push(new DropdownField("Service", "Service attended", $options), 'Root.Main');

        $CurrentMemberID = Member::currentUserID(); 
        $fields->push($imageField = new UploadField('Image', 'Profile Image'));
        $imageField->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
        $path = preg_replace('/^' . ASSETS_DIR . '\//', '', 'Uploads/profile' . $CurrentMemberID);
        $imageField->setFolderName($path);   
    }
}