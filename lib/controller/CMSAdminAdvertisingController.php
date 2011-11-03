<?php
class CMSAdminAdvertisingController extends AdminComponent {
  public $module_name = "advertising";												
  public $model_class = 'WildfireAdvert';
	public $display_name = "Advertising";
  public $dashboard = false;
  public $file_tags = array('advert');
}
?>