<?php
namespace App\Controller;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controller\Controller;
use App\Model\Lists;
use App\Model\Board;
use App\Model\Card;
use App\Model\Activity;
use App\Model\User;

class ListController extends Controller
{
	public function __invoke(Request $request, Response $response, Array $args)
	{
		$data['lists'] = Lists::where('board', $args['id'])->get();
		$data['boardlist'] = Board::whereRaw('find_in_set(? , user_id)', $_SESSION['id'])->get();
		$data['boardrecent'] = Board::whereRaw('find_in_set(? , user_id)', $_SESSION['id'])->orderBy('id', 'DESC')->get();
		$data['title'] = "List Manager - Task Manager";
		$data['acts'] = Activity::where('board_id', $args['id'])->orderBy('id','DESC')->limit(15)->get();
		$alluser= Board::select('user_id')->where('id', $args['id'])->get();

		function comma_separated_to_array($string, $separator = ',')
		{
		  $vals = explode($separator, $string);
		  foreach($vals as $key => $val) {
		    $vals[$key] = trim($val);
		  }
		  return array_diff($vals, array(""));
		}

		foreach ($alluser as $user) { 
			$array_one = comma_separated_to_array($user->user_id);
		}

		$data['users'] = User::whereIn('id', $array_one)->get();

		if(isset($args['id'])){
			$data['boards'] = Board::find($args['id']);
		}

		return $this->renderer->render($response, 'list', $data);
	}	

	public function create_list(Request $request, Response $response, Array $args)
	{
		$data = [];
		
		if(null != $this->session->getFlash('postList')) {
			$data['lists'] = (object)$this->session->getFlash('postList');
		}
		if(isset($args['id']))
			$data['list'] = Lists::find($args['id']);
		$data['title'] = "Form List";

		return $this->renderer->render($response, 'list-form', $data);
	}

	public function save(Request $request, Response $response, Array $args)
	{
		$postData = $request->getParsedBody();


		 // insert
        if ($postData['pk'] == '') {
        	$this->session->setFlash('success', 'List Berhasil Dibuat');
            $list = new Lists();
	        $list->board = $postData['idboard'];
	        $list->listname = ($postData['listname']);

	        $activity = new Activity();
	        $activity->board_id = $postData['idboard'];
	        $activity->user_id = $postData['iduser'];
	        $activity->ket = 'created list "'.$postData['listname'].'" on this board';
	        $activity->save();
        } else {
        // update
        	$this->session->setFlash('success', 'List Berhasil Diperbaharui');
            $list = lists::find($postData['pk']);
	        $list->listname = ($postData['value']);
        }
        $list->save();

        return $response->withRedirect('/board/list/'.$list->board);
	}

	public function delete(Request $request, Response $response, Array $args)
	{
		$list = Lists::find($args['id']);
		$list->delete();
		$this->session->setFlash('success', 'List Terhapus');

		return $response->withRedirect($this->router->pathFor('tampil-list'));
	}
}