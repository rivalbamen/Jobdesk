<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controller\Controller;
use App\Model\Boadr;

class BoardController extends Controller
{
	public function __invoke(Request $request, Response $response, Array $args)
	{
		$data['boards'] = Board::all();
		$data['title'] = "Task Manager";

		return $this->renderer->render($response, 'board', $data);
	}

	public function create_board(Request $request, Response $response, Array $args)
	{
		$data = [];
		
		if(null != $this->session->getFlash('postBoard')) {
			$data['boards'] = (object)$this->session->getFlash('postBoard');
		}

		if(isset($args['id']))
			$data['board'] = Board::find($args['id']);


		$data['title'] = "Form Boadr";

		return $this->renderer->render($response, 'board-form', $data);
	}

	public function save(Request $request, Response $response, Array $args)
	{
		$postData = $request->getParsedBody();

		 // insert
        if ($postData['id'] == '') {
        	$this->session->setFlash('success', 'Boad Berhasil Dibuat');
            $board = new Board();
        } else {
        // update
        	$this->session->setFlash('success', 'Board Berhasil Diperbaharui');
            $board = board::find($postData['id']);
        }

        $board->id = $postData['id'];
        $board->boardname = ($postData['boardname']);

        $board->save();

        return $response->withRedirect($this->router->pathFor('tampil-board'));

	}

	public function delete(Request $request, Response $response, Array $args)
	{
		$board = Board::find($args['id']);
		$board->delete();
		$this->session->setFlash('success', 'Board Terhapus');
		return $response->withRedirect($this->router->pathFor('tampil-board'));
	}
}