<?php

class Product{
  private string $seid;
  private string $manufacturer;
  private string $model;
  private string $dataReceived;

  public function __construct(string $seid, string $manufacturer, string $model, string $dataReceived ){
    $this->setSeid($seid);
    $this->setManufacturer($manufacturer);
    $this->setModel($model);
    $this->dataReceived=$dataReceived;
  }

  public function getSeid():string{
    return $this->seid;
  }

  public function getManufacturer():string{
    return $this->manufacturer;
  }

  public function getModel():string{
    return $this->model;
  }

  public function getDataReceived():string{
    return $this->dataReceived;
  }

  private function setSeid(string $seid):void{
      if(strlen(trim($seid))>0){
        $this->seid=$seid;
      }
      else{
        throw new InvalidArgumentException("A termék szériaszáma megadása kötelező!");
      }
  }

    private function setManufacturer(string $manufacturer):void{
      if(strlen(trim($manufacturer))>0){
        $this->manufacturer=$manufacturer;
      }
      else{
        throw new InvalidArgumentException("A termék gyártója megadása kötelező!");
      }
  }

      private function setModel(string $model):void{
      if(strlen(trim($model))>0){
        $this->model=$model;
      }
      else{
        throw new InvalidArgumentException("A termék típusa megadása kötelező!");
      }
  }
  }

