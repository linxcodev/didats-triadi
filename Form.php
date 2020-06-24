<?php
// require_once('FormResponse.php');

class Form
{
  public $error;
  public $message;
  public $data;

  public function run($data, $requirement, Closure $callback) {
    $this->data = $data;
    $this->validation($data, $requirement);

    // menampilkan data array tanpa password
    $data = array_diff_key($data, array('password'=>0));
    $callback($data);
  }

  public function response($err, $message, $response)
  {
    $response = [
      'error' => ($this->error) ? count($this->message) : $err,
      'message' => ($this->error) ? $this->message : $message,
      'details' => ($this->error) ? [] : $response
    ];

    $res = json_encode($response);
    echo $res;
    // header("location:index.php?"response=$res);
  }

  public function validation($data, $requirement)
  {
    foreach ($requirement as $key => $value) {
      // jika satu input memiliki lebih dari satu validasi
      $value = explode(', ', $value);
      foreach ($value as $val) {
        if ($val == 'email') {
          // yang memiliki validasi
          $this->validationEmail($key);
        }
        if ($val == 'min7') {
          // yang memiliki validasi
          $this->validationMin7($key);
        }
      }
    }
  }

  public function validationEmail($key)
  {
    if (!filter_var($this->data[$key], FILTER_VALIDATE_EMAIL)) {
      $this->error = true;
      $this->message[] = "Invalid email format";
    }
  }

  public function validationMin7($key)
  {
    if (strlen($this->data[$key]) < 7) {
      $this->error = true;
      $this->message[] = "Password minimum 7 karakter";
    }
  }
}
?>
