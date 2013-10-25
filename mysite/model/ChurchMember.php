<?php
class ChurchMember extends DataExtension {

    static $db = array(
		'DOB' => 'Date',
		'Address1' => 'Varchar(255)',
		'Address2' => 'Varchar(255)',
		'State' => 'Enum("NSW, Vic, QLD, Tas, SA, NT, ACT, WA")',
		'Postcode' => 'Varchar(255)',
    );
//    static $has_one = array(
//    	'Family' => 'Family',
//    );
//    static $has_many = array(
//    	'Meeting' => 'Meeting',
//    );
}