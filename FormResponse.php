<?php
require_once('Form.php');

$form = new Form();

$requirement = [
  'email' => "email, required",
  'password' => "min7"
];

$form->run($_POST, $requirement, function(array $response) {
  global $form;

  if(count($response) > 0) {
      $form->response(0, "", $response);
  } else {
      $form->response(1, "Terjadi sesuatu!", []);
  }
});
?>
