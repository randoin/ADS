<?php
session_start();
if (!$_SESSION['id']){
	header('Location: /ADS/index.php');
	
}
require_once '../db_con/template.php';
require_once '../model/utils.php';

$subcatID = trim($_GET['id']);
$subcat = Util::getSubCat($subcatID);
$template = Template::load('cat_index.html');
$data = array(
	'title' => 'ADS - index',
	'catalog' => true,
	'user' => array('id' => $_SESSION['id'], 'name' => $_SESSION['username']),
	'breadcrumbs' => array(array('url' => '/ADS/catalog/index.php', 'name'=>'Catalog')),
	'name' => 'wewe',
	'btitle' => $subcat['name'],
	'nav' => Util::getCat(),
	'products' => Util::getNewProducts($subcatID)
);
echo $template->render($data);

?>
