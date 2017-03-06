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

	$boardMigration = new App\Migration\BoardMigration();
	$boardMigration->createTable();

	$listMigration = new App\Migration\ListMigration();
	$listMigration->createTable();

	$cardMigration = new App\Migration\CardMigration();
	$cardMigration->createTable();

	$commentMigration = new App\Migration\CommentMigration();
	$commentMigration->createTable();

	$checklistMigration = new App\Migration\ChecklistMigration();
	$checklistMigration->createTable();

	$childlistMigration = new App\Migration\ChildlistMigration();
	$childlistMigration->createTable();

	$activityMigration = new App\Migration\ActivityMigration();
	$activityMigration->createTable();

	return $response;
	});
});

$app->group('/login', function () {
    $this->get('/', App\Controller\UserController::class.':login')->setName('login');
    $this->post('/check', App\Controller\UserController::class.':checkuser')->setName('check-user');
});

$app->group('/user', function() {
	$this->get('/', App\Controller\UserController::class)->setName('tampil-user');
	$this->get('/add', App\Controller\UserController::class.':form')->setName('form-user');
	$this->get('/update/{id}', App\Controller\UserController::class.':form')->setName('update-user');
	$this->post('/save', App\Controller\UserController::class.':save')->setName('save-user');
	$this->get('/delete/{id}', App\Controller\UserController::class.':delete')->setName('delete-user');
	$this->get('/logout', App\Controller\UserController::class.':logout')->setName('user-logout');

});

$app->group('/comment', function() {
	$this->post('/save', App\Controller\CommentController::class.':save')->setName('comment-save');
	$this->get('/lihat/{id}', App\Controller\CommentController::class)->setName('comment-tampil');

});

$app->group('/board', function() {
	$this->get('/{id}', App\Controller\BoardController::class)->setName('tampil-board');
	$this->post('/save', App\Controller\BoardController::class.':save')->setName('save-board');
	$this->post('/member', App\Controller\BoardController::class.':member')->setName('member');
	// $this->get('/add', App\Controller\BoardController::class.':form')->setName('form-board');
	// $this->get('/update/{id}', App\Controller\BoardController::class.':form')->setName('update-board');
	$this->get('/list/{id}', App\Controller\ListController::class)->setName('list-board');
	$this->post('/save-list', App\Controller\ListController::class.':save')->setName('save-list');
	// $this->get('/delete/{id}', App\Controller\BoardController::class.':delete')->setName('delete-board');

	$this->get('/card/{id}', App\Controller\ListController::class)->setName('card-board');
	$this->post('/save-card', App\Controller\CardController::class.':save')->setName('save-card');
	$this->get('/delete/card/{board}/{id}', App\Controller\CardController::class.':delete')->setName('hapus-card');

	$this->post('/save-checklist', App\Controller\ChecklistController::class.':save')->setName('save-checklist');
	$this->get('/checklist/lihat/{id}', App\Controller\ChecklistController::class)->setName('checklist-tampil');

	$this->post('/save-child', App\Controller\ChildlistController::class.':save')->setName('save-child');
	$this->get('/childlist/lihat/{id}', App\Controller\ChildlistController::class)->setName('child-tampil');
	$this->get('/childlist/delete/{id}', App\Controller\ChildlistController::class.':delete')->setName('child-delete');
	$this->get('/childlist/save/{card}/{id}/{nama}/{status}', App\Controller\ChildlistController::class.':saveactive')->setName('child-save');


	$this->get('/activities/lihat/{id}', App\Controller\ActivityController::class)->setName('activity-tampil');
	$this->get('/activities/all/{id}', App\Controller\ActivityController::class.':allview')->setName('all-activity');
});


// // $app->group('/list', function() {
// 	$this->get('/', App\Controller\BoardController::class)->setName('tampil-list');
// 	// $this->get('/add', App\Controller\BoardController::class.':form')->setName('form-board');
// 	// $this->get('/update/{id}', App\Controller\BoardController::class.':form')->setName('update-board');
// 	$this->post('/save', App\Controller\BoardController::class.':save')->setName('save-list');
// 	// $this->get('/delete/{id}', App\Controller\BoardController::class.':delete')->setName('delete-board');

// });

// $app->group('/card', function() {
// 	$this->get('/', App\Controller\BoardController::class)->setName('tampil-card');
// 	// $this->get('/add', App\Controller\BoardController::class.':form')->setName('form-board');
// 	// $this->get('/update/{id}', App\Controller\BoardController::class.':form')->setName('update-board');
// 	$this->post('/save', App\Controller\BoardController::class.':save')->setName('save-card');

// 	// $this->get('/delete/{id}', App\Controller\BoardController::class.':delete')->setName('delete-board');

// // });




