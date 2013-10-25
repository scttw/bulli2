<?php


class ChurchAdmin extends ModelAdmin {

    private static $managed_models = array(
    	'Family',
    	'Meeting',
    	'Attendance'
    );

	private static $url_segment = 'church-admin';

	private static $menu_title = "Church admin";

}





