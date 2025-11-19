<?php
class ContactPerson{
      private string $cid;
      private string $name;
      private string $phone;
      private string $email;

      public function __construct(string $cid, string $name, string $phone, string $email){
        $this->setCid($cid);
        $this->setName($name);
        $this->setPhone($phone);
        $this->setEmail($email);
      }

      public function getCid():string{
        return $this->cid;
      }

        public function getName():string{
        return $this->name;
      }

        public function getPhone():string{
        return $this->phone;
      }
        public function getEmail():string{
        return $this->email;
      }

    private function setCid(string $cid):void{
        if(strlen(trim($cid))>0){
          $this->cid=$cid;
        }
        else{
          throw new InvalidArgumentException("Kapcsolattartó száma megadása kötelező!");
        }
    }

        private function setName(string $name):void{
            if(strlen(trim($name))>0){
              $this->name=$name;
            }
            else{
              throw new InvalidArgumentException("Kapcsolattartó neve megadása kötelező!");
            }
    }

        private function setPhone(string $phone):void{
            if(strlen(trim($phone))>0){
              $this->phone=$phone;
            }
            else{
              throw new InvalidArgumentException("Kapcsolattartó telefonszáma megadása kötelező!");
            }
    }

        private function setEmail(string $email):void{
            if(strlen(trim($email))>0){
              $this->email=$email;
            }
            else{
              throw new InvalidArgumentException("Kapcsolattartó email címe megadása kötelező!");
            }
          }
      }
