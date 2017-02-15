<?php
// Routes

/*$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});*/

$app->get('/', App\Controller\NameController::class)->setName('name-url');
/*$app->get('/tampil/[{nama}]', App\Controller\NameController::class.':saya')->setName('saya-url');*/
$app->group('/migrate', function() {
	$this->get('/', function($request, $response, $args) {
	$userMigration = new App\Migration\UserMigration();
	$userMigration->createTable();
	return $response;
	});
});

$app->group('/user', function() {
	$this->get('/', App\Controller\UserController::class)->setName('tampil-user');
	$this->get('/add', App\Controller\UserController::class.':form')->setName('form-user');
	$this->get('/update/{id}', App\Controller\UserController::class.':form')->setName('update-user');
	$this->post('/save', App\Controller\UserController::class.':save')->setName('save-user');
	$this->get('/delete/{id}', App\Controller\UserController::class.':delete')->setName('delete-user');

});



