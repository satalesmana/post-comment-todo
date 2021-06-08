<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Posts;

class PostsController extends BaseController
{
	public function index()
	{
		$posts = new Posts();
		return $this->response->setJSON(
			$posts->findAll()
		);
	}

	public function create(){
		$posts = new Posts();
		$input = $this->request->getPost();
		if ($posts->save($input) === false)
		{
			return  $this->response->setStatusCode(422)
				->setJSON([$posts->errors()]);
		}else
			return $this->response->setJSON(["message"=>"data berhasil di tambahkan"]);
	}

	public function show($id){
		$posts = new Posts();
		return $this->response->setJSON(
			$posts->find($id)
		);
	}

	public function update($id){
		$posts = new Posts();

		$input = $this->request->getRawInput();
		$input['id'] = $id;

		if ($posts->save($input) === false)
		{
			return  $this->response->setStatusCode(422)
				->setJSON([$posts->errors()]);
		}else
			return $this->response->setJSON(["message"=>"data berhasil di Update"]);
	}

	public function delete($id){
		$posts = new Posts();
		$posts->delete($id);
		return $this->response->setJSON(["message"=>"data berhasil di hapus"]);
	}


}
