<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controller\Controller;
use App\Model\Childlist;

class ChildlistController extends Controller
{
	public function __invoke(Request $request, Response $response, Array $args)
	{
		$data['childs'] = Childlist::where('checklist_id', $args['id'])->get();

		return $this->renderer->render($response, 'childlist', $data);
	}

	public function delete(Request $reqest, Response $response, Array $args)
	{
		$child = Childlist::find($args['id']);
		$child->delete();
	}

	public function save(Request $request, Response $response, Array $args)
	{
		$postData = $request->getParsedBody();

		 // insert
	    	$this->session->setFlash('success', 'Child Berhasil Dibuat');
	        $child = new Childlist();
	   		$child->checklist_id = $postData['cheklistid'];
	   		$child->childname = $postData['childname'];
        $child->save();
	}

	public function saveactive(Request $request, Response $response, Array $args)
	{
		$child = Childlist::find($args['id']);
		$child->status = $args['status'];
		$child->save();
	}
}