<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Slim\App();

$container = $app->getContainer();

$container['view'] = function($container){
	$view = new \Slim\Views\Twig(__DIR__ . '/../views',[
		'cache' => false
	])
	$basePath = rtrim(str_replace('index.php','',$container['request']->getUri()->getBasePatch()),'');
	$view->addExtension(new Slim\Views\TwigExtension($container['router'],$basePath));

	return $view;
}

$app->get('/',function($request,$response){
	return $this->view->render($response,'view.twig')
})

$app->get('/contact',function($request,$response){
	return $this->view->render($response,'contact.twig')
})

$app->get('login',function($request,$response){
	return $this->view->render($response,'login.twig')
})


$app->get('/other',function($request,$response){
	// other
})


$app->get('/other2',function($request,$response){
	// other
})