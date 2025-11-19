<?php

class Service{
  private string $sid;
  private string $seid;
  private string $cid;
  private string $status;
  private string $last_update;

  public function __construct(string $sid, string $seid, string $cid, string $status, string $last_update){
    $this->$sid;
    $this->$seid;
    $this->$cid;
    $this->$status;
    $this->$last_update;
  }
}
