<?php 
class TodoValidation {
  private $data;
  private $error_msgs = array();

  public function setData($data) {
    $this->data = $data;
  }

  public function getData() {
    return $this->data;
  }

  public function getErrorMessages() {
    return $this->$error_msgs;
  }

  public function chech() {
    $title = $this->data['title'];
    $detail = $this->data['detail'];

    if(empty($title)) {
        $this->$error_msgs[] = "タイトルが空です。";
    }
    if(empty($detail)) {
        $this->$error_msgs[] = "詳細が空です。";
    }

    if(!empty($this->$error_msgs)) {
      return false;
    }
    return true;
  }
}
 ?>
