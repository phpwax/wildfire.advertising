<?php

class WildfireAdvertisingController extends ApplicationController {

  public $advert_class = "WildfireAdvert";

  public function r(){
    $model = new $this->advert_class();
    if($found = $model->filter("md5(id)", Request::get('id') )->first() ){
      $found->update_attributes(array('clicks'=>$found->clicks+1));
      $this->redirect_to($found->link);
    }else $this->redirect_to("/");
  }

  public function method_missing(){
    $this->advert = $this->getadvert($this->advert_type, 1);
    if($this->advert) $this->advert->update_attributes(array('impressions'=>$this->advert->impressions+1));
  }

  protected function getadvert($type, $number){
    $model = new $this->advert_class;
    $model = $model->filter("type", $type)->order("RAND()");
    if($number == 1) return $model->first();
    else return $model->limit($number)->all();
  }

}
?>