<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/vendor/autoload.php';

// Create Container
$container = new Container();
AppFactory::setContainer($container);

// Set view in Container
$container->set('view', function() {
    return Twig::create('./', ['cache' => false]);
});

// Set Settings file
$container->set('settings', function() {
	$config = file_get_contents(__DIR__ . '/config.json');
  $settings = json_decode($config, true);
  return $settings;
});

$container->set('txs', './txs.json');
// Create App
$app = AppFactory::create();

// Add Twig-View Middleware
$app->add(TwigMiddleware::createFromContainer($app));

// Define named route
$app->get('/tx', function ($request, $response, $args) {
	$handle = curl_init();
	
	$account = 'entraide.rewards';
	$symbol = 'ECU';
	
	$file = $this->get('txs');
 
	$url = "https://accounts.hive-engine.com/accountHistory?account=".$account."&symbol=".$symbol."&limit=50";
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($handle);
	curl_close($handle);
	
	$txsList = json_decode($output, true);
	
	$response->getBody()->write(json_encode($txsList[0]));

  return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
})->setName('tx');

$app->get('/', function ($request, $response, $args) {
	$handle = curl_init();
	
	$account = 'entraide.rewards';
	$symbol = 'ECU';
	
	$file = $this->get('txs');
 
	$url = "https://accounts.hive-engine.com/accountHistory?account=".$account."&symbol=".$symbol."&limit=50";
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($handle);
	curl_close($handle);

	$txsList = json_decode($output, true);

  return $this->get('view')->render($response, 'index.html', [
      'tx' => $txsList[0]
  ]);
})->setName('index');

// Run app
$app->run();
