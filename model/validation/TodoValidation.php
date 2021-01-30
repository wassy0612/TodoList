<?php 
class TodoValidation {
  public $data = array();

  public function setData($data) {
    $this->data = $data;
  }

  public function getData($data) {
    $this->data = $data;
  }

  public function chech() {
        $error_msgs = array();
    if((isset($this->data['title'])) && empty($this->data['title'])) {
        $error_msgs[] = "タイトルが空です。";
    }
    if((isset($this->data['detail'])) && empty($this->data['detail'])) {
        $error_msgs[] = "詳細が空です。";
    }

    if(count($error_msgs) > 0) {
    return false;
    }
    return true;
  }
}
 ?>
