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


        public static function getProducts():array{
      $con=new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
      $stmt=$con->prepare("SELECT * FROM product;");
      $stmt->execute();
      $stmt->bind_result($seid, $manufacturer, $model, $dataReceived);

      $products=[];

      while($stmt->fetch()){
          $product=new Products($seid, $manufacturer, $model, $dataReceived);
          $products=$product;
      }

      $stmt->close();
      $con->close();

      return $products;
    }


    public static function getService() : array{
      $con=new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
      $stmt=$con->prepare("SELECT * FROM service;");
      $stmt->execute();
      $stmt->bind_result($sid, $seid, $cid, $status, $lasUpdate);

      $Service=[];

      while ($stmt->fetch()){
        $service=new Service($sid, $seid, $cid, $status, $lasUpdate);
        $Service=$service;
      }

      $stmt->close();
      $con->close();

      return $Service;
    }
}

//felvitel
public static function createProduct(Product $product):void{
    $con=new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
    $stmt=$con->prepare("INSERT INTO Product VALUES (?,?,?,?);");

    $seid=$Product->getSeid();
    $manufacturer=$Product->getManufacturer();
    $model=$Product->getModel();
    $dataReceived=$product->getDataReceived();

    $stmt->bind_param("ssss", $seid, $manufacturer, $model, $dataReceived);
    $stmt->execute();

    $con->close();
}

public static function createContactPerson(ContactPerson $contactPerson):void{
  $con=new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
  $stmt=$con->prepare("INSERT INTO ContactPerson VALUES (?,?,?,?);");

  $cid=$ContactPerson->getCid();
  $name=$ContactPerson->getName();
  $phone=$ContactPerson->getPhone();
  $email=$ContactPerson->getEmail();

  $stmt->bind_param("ssis", $cid, $name, $phone, $email);
  $stmt->execute();

  $con->close();
}

public static function createService(Service $service):void{
  $con=new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
  $stmt=$con->prepare("INSER INTO  Service VALUS (?);");

  $status=$Service->getStatus();

  $stmt->bind_param("s", $status);
  $stmt->execute();

  $con->close();
}
