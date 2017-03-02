<?php
namespace App\Controller;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controller\Controller;
use App\Model\Card;
use App\Model\Activity;

class CardController extends Controller
{
	public function __invoke(Request $request, Response $response, Array $args)
	{
		$data['cards'] = Card::where('list', $args['id'])->get();
		$data['title'] = "Task Manager";
		return $this->renderer->render($response, 'card', $data);
	}

	public function create_card(Request $request, Response $response, Array $args)
	{
		$data = [];
		
		if(null != $this->session->getFlash('postCard')) {
			$data['cards'] = (object)$this->session->getFlash('postCard');
		}
		if(isset($args['id']))
			$data['card'] = Card::find($args['id']);
		$data['title'] = "Form Card";
		return $this->renderer->render($response, 'card-form', $data);
	}

	public function save(Request $request, Response $response, Array $args)
	{
		$postData = $request->getParsedBody();
		 // insert
        if ($postData['pk'] == '') {
        	$this->session->setFlash('success', 'Card Berhasil Dibuat');

        	$activity = new Activity();
        	$activity->user_id = $postData['userid'];
        	$activity->board_id = $postData['board'];
        	$activity->ket = 'created card "'.$postData['cardname'].'"';
        	$activity->save();

            $card = new card();
	        $card->id = $postData['id'];
	        $card->list = $postData['idlist'];
	        $card->cardname = ($postData['cardname']);
	        $card->save();
	        return $response->withRedirect('/board/list/'.$postData['board']);
	        
        } else {
        // update
        	$this->session->setFlash('success', 'Card Berhasil Diperbaharui');
            $card = Card::find($postData['pk']);
            $card->description = $postData['value'];
            $card->save();
        }
	}
	
	public function delete(Request $request, Response $response, Array $args)
	{
		$activity = new Activity();
    	$activity->user_id = $_SESSION['id'];
    	$activity->board_id = $args['board'];
    	$activity->card_id = $args['id'];
    	$activity->ket = 'archived some card';
    	$activity->save();

		$card = Card::find($args['id']);
		$card->delete();
		return $response->withRedirect($this->router->pathFor('tampil-board'));
	}
}