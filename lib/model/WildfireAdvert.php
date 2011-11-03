<?
class WildfireAdvert extends WaxModel{

  public $ad_types = array(''=>'-- Select --');

  public function setup(){
    if($types = Config::get("adverts/types")) foreach($types as $key=>$type) $this->ad_types[$key] = $type;
    else $this->types = array(''=>'-- Select --', 'mpu'=>'MPU', 'leaderboard'=>'Leaderboard', 'sky'=>'Sky');
    
    $this->define("title", "CharField", array('required'=>true,'scaffold'=>true));
    $this->define("type", "CharField", array('widget'=>'SelectInput', 'choices'=>$this->ad_types,'scaffold'=>true));
    $this->define("link", "CharField", array('required'=>true,'scaffold'=>true));
    $this->define("impressions", "IntegerField", array('editable'=>false,'scaffold'=>true));
    $this->define("clicks", "IntegerField", array('editable'=>false,'scaffold'=>true));
    $this->define("files", "ManyToManyField", array('target_model'=>"WildfireFile", 'input_pattern'=>'tags[%s]', 'group'=>'files'));
  }
  
  public function before_save(){
    if(!$this->link) $this->link = "http://";
  }
  
}
?>