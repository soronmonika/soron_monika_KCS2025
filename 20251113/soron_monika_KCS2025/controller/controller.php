<?php

function betoltes($class){
    include "../model/" . $class . ".php";
}
spl_autoload_register("betoltes");

function fooldalView(string $error = ""): void {
    $adatok = AbKezelo::getAllServiceItems() ?? [];
    include_once("../view/fooldal.php");
}

function felvitelCreate(string $error = ""): void {
    include_once("../view/felvitel.php");
}

function main(): void {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        try {
            $cid = uniqid("C_");

            $contactPerson = new ContactPerson(
                $cid,
                $_POST["name"],
                $_POST["phone"],
                $_POST["email"]
            );
            AbKezelo::createContactPerson($contactPerson);

            $product = new Product(
                $_POST["seid"],
                $_POST["manufacturer"],
                $_POST["model"],
                date("Y-m-d")
            );
            AbKezelo::createProduct($product);

            $sid = uniqid("S_");

            $service = new Service(
                $sid,
                $_POST["seid"],
                $cid,
                "Beérkezett",
                date("Y-m-d H:i:s")
            );
            AbKezelo::createService($service);

            fooldalView();
            return;

        } catch (Exception $e) {
            felvitelCreate("Minden mező kitöltése kötelező!");
            return;
        }
    }

    if (array_key_exists("oldal", $_GET)) {
        switch ($_GET["oldal"]) {

            case "fooldalView":
                fooldalView();
                return;

            case "felvitelCreate":
                felvitelCreate();
                return;

            default:
                fooldalView();
                return;
        }
    }

    fooldalView();
}

main();
