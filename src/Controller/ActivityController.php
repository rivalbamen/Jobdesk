<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controller\Controller;
use App\Model\Activity;

class ActivityController extends Controller
{
	public function __invoke(Request $request, Response $response, Array $args)
	{
		$data['activities'] = Activity::where([['card_id', $args['id']],['comment',0]])->orderBy('id', 'DESC')->limit(10)->get();

		return $this->renderer->render($response, 'activity', $data);
	}

}