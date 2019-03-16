<?php

class FooterManager extends LeftAndMain implements PermissionProvider {

	// static require once '../../../vendor/autoload.php';

	private static $footer_tab_name = 'Footer';

	private static $url_segment = 'footer';
	private static $menu_title = 'Footer Items';
	private static $menu_priority = 2;
	private static $url_priority = 30;
	private static $menu_icon = 'framework/admin/images/menu-icons/16x16/pencil.png';
	private static $required_permission_codes = array('CMS_ACCESS_FooterManager');

	private static $url_handlers = array (

	);

	public function init() {
		parent::init();
		Requirements::javascript(CMS_DIR . '/javascript/CMSMain.EditForm.js');
		Requirements::javascript(FRAMEWORK_ADMIN_DIR . '/javascript/ModelAdmin.js');
		Requirements::css("mysite/css/custom-leftandmain.css");
	}


	private static $allowed_actions = array('FooterForm');


	public function FooterForm () {

		$config = SiteConfig::current_site_config();

		$fields = FieldList::create( $config->getCMSFields()->findOrMakeTab('Root.Footer'));


		$actions = new FieldList(
			FormAction::create('doSave', _t('CMSMain.SAVE','Save'))
				->addExtraClass('ss-ui-action-constructive')->setAttribute('data-icon', 'accept')
		);


		$form = Form::create(
			$this,
			'FooterForm',
			$fields,
			$actions
			)->setHTMLID('Form_EditForm');
		$form->addExtraClass('cms-content ui-widget cms-edit-form cms-panel-padded center');
		$form->setAttribute('data-pjax-fragment', 'CurrentForm');



		if($form->Fields()->hasTabset()) $form->Fields()->findOrMakeTab('Root')->setTemplate('CMSTabSet');
		$form->loadDataFrom($config);
		$form->setTemplate($this->getTemplatesWithSuffix('_EditForm'));

		// Use <button> to allow full jQuery UI styling
		$actions = $actions->dataFields();
		if($actions) foreach($actions as $action) $action->setUseButtonTag(true);


		return $form;
	}

	public function doSave ($data, $form) {

		// $page->flushCache();
		// die(print_r($page));

		$config = SiteConfig::current_site_config();

		$form->saveInto($config);
		$config->write();

		$form->sessionMessage("Footer Content updated.", 'good');

		$this->response->addHeader('X-Status', rawurlencode(_t('LeftAndMain.SAVEDUP', 'Saved.')));

		return $form->forTemplate();

	}

	private function FilterColumn ($string, $filter) {
		if ($filter && $string && strpos(' '.$filter.' ', $string)) {
			return ' class="filter" ';
		}
		return '';
	}
	/**
	 * A template accessor to check the ADMIN permission
	 *
	 * @return bool
	 */
	public function IsAdmin() {
		return Permission::check("ADMIN");
	}


	/**
	 * Check the permission to make sure the current user has a dashboard
	 *
	 * @return bool
	 */
	public function canView($member = null) {
		return Permission::check("CMS_ACCESS_FooterManager");
	}


	/**
	 * Sets the permisison parameter
	 * @return null
	 */
	function providePermissions() {
		return array(
			"CMS_ACCESS_FooterManager" => array(
				'name' => "Access to Footer Manager section",
				'category' => _t('Permission.CMS_ACCESS_CATEGORY', 'CMS Access'),
				'sort' => 1
			)
		);
	}

}