<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controller\Controller;
use App\Model\Cards;
use App\Model\Lists;
use App\Model\Board;

class CardController extends Controller
{
	public function __invoke(Request $request, Response $response, Array $args)
	{
		$data['cards'] = Cards::all();
		$data['title'] = "Task Manager";

		if(isset($args['id'])){
			$data['lists'] = Board::find($args['id']);
			if(isset($args['id'])){
				$data['boards'] = Board::find($args['id']);
			}
		}

		return $this->renderer->render($response, 'card', $data);
	}

	public function create_card(Request $request, Response $response, Array $args)
	{
		$data = [];
		
		if(null != $this->session->getFlash('postCard')) {
			$data['cards'] = (object)$this->session->getFlash('postCard');
		}

		if(isset($args['id']))
			$data['card'] = Cards::find($args['id']);


		$data['title'] = "Form Card";

		return $this->renderer->render($response, 'card-form', $data);
	}

	public function save(Request $request, Response $response, Array $args)
	{
		$postData = $request->getParsedBody();

		 // insert
        if ($postData['id'] == '') {
        	$this->session->setFlash('success', 'Card Berhasil Dibuat');
            $card = new card();
        } else {
        // update
        	$this->session->setFlash('success', 'Card Berhasil Diperbaharui');
            $card = Cards::find($postData['id']);
        }

        $card->id = $postData['id'];
        $card->list = $postData['idlist'];
        $card->cardname = ($postData['cardname']);

        $card->save();

        return $response->withRedirect('/list/card/'.$list->board);
        return $response->withRedirect('/board/list/'.$postData['board']);

	}

	public function delete(Request $request, Response $response, Array $args)
	{
		$card = Cards::find($args['id']);
		$card->delete();
		$this->session->setFlash('success', 'card Terhapus');
		return $response->withRedirect($this->router->pathFor('tampil-card'));
	}
}