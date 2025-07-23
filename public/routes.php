<?php

$router->get("/", "views/pages/index.php");
$router->get("/home", "Controllers/index.php");
$router->get("/admin", "Controllers/Admin/index.php")->only("auth");


$router->get("/admin/novopost", "Controllers/Admin/add/index.php")->only("auth");
$router->get("/admin/editar", "Controllers/Admin/edit/index.php")->only("auth");
$router->post("/admin/post/create", "Controllers/Admin/add/create.php")->only("auth");
$router->put("/admin/post/update", "Controllers/Admin/edit/update.php")->only("auth");
$router->put("/admin/post/publish", "Controllers/Admin/publish.php")->only("auth");
$router->delete("/admin/post/destroy", "Controllers/Admin/destroy.php")->only("auth");


$router->get("/admin/procurar", "Controllers/Admin/search/index.php")->only("auth");
$router->post("/admin/search/makesearch", "Controllers/Admin/search/makeSearch.php")->only("auth");

$router->get("/admin/ads", "Controllers/Admin/ads/index.php")->only("auth");
$router->get("/admin/novoad", "Controllers/Admin/ads/newAd.php")->only("auth");
$router->get("/admin/editarad", "Controllers/Admin/ads/editAd.php")->only("auth");
$router->post("/admin/ads/create", "Controllers/Admin/ads/create.php")->only("auth");
$router->put("/admin/ads/update", "Controllers/Admin/ads/update.php")->only("auth");
$router->put("/admin/ads/publish", "Controllers/Admin/ads/publish.php")->only("auth");
$router->delete("/admin/ads/destroy", "Controllers/Admin/ads/destroy.php")->only("auth");

$router->get("/admin/imagens", "Controllers/Admin/images/index.php")->only("auth");
$router->post("/admin/images/create", "Controllers/Admin/images/create.php")->only("auth");
$router->delete("/admin/images/destroy", "Controllers/Admin/images/destroy.php")->only("auth");
$router->put("/admin/images/updatelogotype", "Controllers/Admin/images/updatelogotype.php");

$router->get("/admin/categorias", "Controllers/Admin/categories/index.php")->only("auth");
$router->post("/admin/categories/create", "Controllers/Admin/categories/create.php")->only("auth");
$router->delete("/admin/categories/destroy", "Controllers/Admin/categories/destroy.php")->only("auth");


$router->get("/404", "Controllers//abort.php");

$router->get("/login", "Controllers/login/index.php");

$router->post("/session/store", "Controllers/session/store.php");
$router->delete("/session/destroy", "Controllers/session/destroy.php");
