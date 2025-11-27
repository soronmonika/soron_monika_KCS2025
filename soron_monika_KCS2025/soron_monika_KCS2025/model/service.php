<?php

class Service{
    private string $sid;
    private string $seid;
    private string $cid;
    private string $status;
    private string $lastUpdate;

    public function __construct(string $sid, string $seid, string $cid, string $status, string $lastUpdate){
      $this->setSid($sid);
      $this->setSeid($seid);
      $this->setCid($cid);
      $this->setStatus($status);
      $this->lastUpdate=$lastUpdate;
    }

  public function getSid():string{
      return $this->sid;
  }

  public function getSeid():string{
    return $this->seid;
  }

  public function getCid():string{
    return $this-> cid;
  }

  public function getStatus() :string {
    return $this->status;
  }

  public function getLastUpdate():string{
    return $this->lastUpdate;
  }

  private function setSid(string $sid):void{
    if(strlen(trim($sid))>0){
      $this->sid=$sid;
    }
    else{
      throw new InvalidArgumentException("A szervíz azonosító kötelező!");
    }
  }

  private function setSeid(string $seid):void{
    if(strlen(trim($seid))>0){
    $this->seid=$seid;
    }
    else{
      throw new InvalidArgumentException("A szériaszám kötelező!");
    }
  }

  private function setCid(string $cid):void{
    if(strlen(trim($cid))>0){
      $this->cid=$cid;
    }
    else{
      throw new InvalidArgumentException("A kapcsolattartóazonosító kötelező!");
    }
  }

  private function setStatus(string $status):void{
    if(strlen(trim($status))>0){
      $this->status=$status;
    }
    else{
      throw new InvalidArgumentException("Válassz státuszt!");
    }
  }
}
