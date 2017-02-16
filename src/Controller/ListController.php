<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controller\Controller;
use App\Model\List;

class ListdController extends Controller
{
	public function __invoke(Request $request, Response $response, Array $args)
	{
		$data['lists'] = List::all();
		$data['title'] = "Task Manager";

		return $this->renderer->render($response, 'list', $data);
	}

	public function create_list(Request $request, Response $response, Array $args)
	{
		$data = [];
		
		if(null != $this->session->getFlash('postList')) {
			$data['lists'] = (object)$this->session->getFlash('postList');
		}

		if(isset($args['id']))
			$data['list'] = List::find($args['id']);


		$data['title'] = "Form List";

		return $this->renderer->render($response, 'list-form', $data);
	}

	public function save(Request $request, Response $response, Array $args)
	{
		$postData = $request->getParsedBody();

		 // insert
        if ($postData['id'] == '') {
        	$this->session->setFlash('success', 'List Berhasil Dibuat');
            $list = new List();
        } else {
        // update
        	$this->session->setFlash('success', 'List Berhasil Diperbaharui');
            $list = list::find($postData['id']);
        }

        $list->id = $postData['id'];
        $list->listname = ($postData['listname']);

        $list->save();

        return $response->withRedirect($this->router->pathFor('tampil-list'));

	}

	public function delete(Request $request, Response $response, Array $args)
	{
		$list = List::find($args['id']);
		$list->delete();
		$this->session->setFlash('success', 'List Terhapus');
		return $response->withRedirect($this->router->pathFor('tampil-list'));
	}
}