<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 15.04.15
 * Time: 17:09
 */
require_once "../classes/Excursion.php";
$excursion = new Excursion();
$cityId = $_GET['city'];
if(isset($cityId)) {
    $excursion->print_all_excursion($cityId);
}
