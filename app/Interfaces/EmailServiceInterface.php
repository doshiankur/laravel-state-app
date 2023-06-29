<?php
namespace App\Interfaces;
interface EmailServiceInterface{

  public function EmailSend(array $data_email);
  public function QueryEmailSend(array $data);

}
?>