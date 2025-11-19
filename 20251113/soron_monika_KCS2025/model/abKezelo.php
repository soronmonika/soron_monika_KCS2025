<?php

include_once("contactPerson.php");

class AbKezelo{
    public static function getContactPersons():array{
      $con=new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
      $stmt=$con->prepare("SELECT * FROM ContactPerson;");
      $stmt->execute();
      $stmt->bind_result($cid, $name, $phone, $email);

      $contactPersons=[];

      while($stmt->fetch()){
          $contactPerson=new ContactPerson($cid, $name, $phone, $email);
          $contactPersons=$contactPerson;
      }

      $stmt->close();
      $con->close();

      return $contactPersons;
    }


}
