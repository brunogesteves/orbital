<?php


if (sizeof($_SESSION["results"]) == 0) {
    $searchResults = [];
} else {
    $searchResults = $_SESSION["results"];
}


require view("admin/search.php");
