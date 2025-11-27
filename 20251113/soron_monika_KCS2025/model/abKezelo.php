<?php

class AbKezelo {
    public static function getContactPersons(): array {
        $con = new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
        $stmt = $con->prepare("SELECT CID, Name, Phone, Email FROM ContactPerson;");
        $stmt->execute();
        $stmt->bind_result($cid, $name, $phone, $email);

        $contactPersons = [];

        while ($stmt->fetch()) {
            $contactPersons[] = new ContactPerson($cid, $name, $phone, $email);
        }

        $stmt->close();
        $con->close();

        return $contactPersons;
    }


    public static function getProducts(): array {
        $con = new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
        $stmt = $con->prepare("SELECT SEID, Manufacturer, Model, DataReceived FROM Product;");
        $stmt->execute();
        $stmt->bind_result($seid, $manufacturer, $model, $dataReceived);

        $products = [];

        while ($stmt->fetch()) {
            $products[] = new Product($seid, $manufacturer, $model, $dataReceived);
        }

        $stmt->close();
        $con->close();

        return $products;
    }


    public static function getService(): array {
        $con = new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
        $stmt = $con->prepare("SELECT SID, SEID, CID, Status, LastUpdate FROM Service;");
        $stmt->execute();
        $stmt->bind_result($sid, $seid, $cid, $status, $lastUpdate);

        $serviceList = [];

        while ($stmt->fetch()) {
            $serviceList[] = new Service($sid, $seid, $cid, $status, $lastUpdate);
        }

        $stmt->close();
        $con->close();

        return $serviceList;
    }


    public static function createContactPerson(ContactPerson $contactPerson): void {
        $con = new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
        $stmt = $con->prepare("INSERT INTO ContactPerson (CID, Name, Phone, Email) VALUES (?, ?, ?, ?);");

        $cid = $contactPerson->getCid();
        $name = $contactPerson->getName();
        $phone = $contactPerson->getPhone();
        $email = $contactPerson->getEmail();

        $stmt->bind_param("ssss", $cid, $name, $phone, $email);
        $stmt->execute();

        $stmt->close();
        $con->close();
    }


    public static function createProduct(Product $product): void {
        $con = new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");
        $stmt = $con->prepare("INSERT INTO Product (SEID, Manufacturer, Model, DataReceived) VALUES (?, ?, ?, ?);");

        $seid = $product->getSeid();
        $manufacturer = $product->getManufacturer();
        $model = $product->getModel();
        $dataReceived = $product->getDataReceived();

        $stmt->bind_param("ssss", $seid, $manufacturer, $model, $dataReceived);
        $stmt->execute();

        $stmt->close();
        $con->close();
    }


    public static function createService(Service $service): void {
        $con = new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");

        $stmt = $con->prepare("INSERT INTO Service (SID, SEID, CID, Status) VALUES (?, ?, ?, ?);");

        $sid = $service->getSid();
        $seid = $service->getSeid();
        $cid = $service->getCid();
        $status = $service->getStatus();

        $stmt->bind_param("ssss", $sid, $seid, $cid, $status);
        $stmt->execute();

        $stmt->close();
        $con->close();
    }


   public static function getAllServiceItems(): array {
    $con = new mysqli("127.0.0.1", "root", "", "soron_monika_KCS2025");

    $sql = " SELECT Product.SEID, Product.Manufacturer, Product.Model, ContactPerson.Name, ContactPerson.Phone, ContactPerson.Email, Service.Status, Service.lastupdate
        FROM Service
        INNER JOIN Product ON Service.SEID = Product.SEID
        INNER JOIN ContactPerson ON Service.CID = ContactPerson.CID
        WHERE NOT (
            Service.Status = 'Kész'
            AND DATE(Service.lastupdate) != CURDATE()
        )
        ORDER BY FIELD( Service.Status, 'Beérkezett', 'Hibafeltárás', 'Alkatrész beszerzés alatt','Javítás','Kész');
    ";

    $result = $con->query($sql);

    $adatok = [];

    while ($row = $result->fetch_assoc()) {
        $adatok[] = $row;
    }

    $con->close();
    return $adatok;
}
}
