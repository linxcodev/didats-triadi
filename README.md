#TEST

Melalui halaman index.php
1. masukkan email dan password
2. submit, nanti muncul json respon

Melalui terminal<br>
Form.php
```
public $data = [
    'email' => 'user@mail.test',
    'password' => 1234567,
    'id' => 1
  ];

  public function run($data, $requirement, Closure $callback) {
    $data = $this->data;
```
