<?php

class SiteConfigExtension extends DataExtension {

	private static $db = array(
		'FooterContentOne'   => 'HTMLText',
		'FooterContentTwo'   => 'HTMLText',
		'FooterContentThree' => 'HTMLText',
	);

	private static $has_one = array(
	);

	private static $many_many = array(
	);


	public function updateCMSFields(FieldList $fields) {

		$fields->addFieldsToTab('Root.Footer', array(
			HTMLEditorField::create('FooterContentOne')->setRows(5),
			HTMLEditorField::create('FooterContentTwo')->setRows(5),
			HTMLEditorField::create('FooterContentThree')->setRows(5),
		));

		// $fields->addFieldToTab('Root.Tracking', TextareaField::create('TrackingBeacons'));
	}
}