<?php
class Articles extends Controller{
	protected function Index(){
		$viewModel = new ArticleModel();
		$this->returnView($viewModel->Index(), true);
	}

	protected function add(){
		$viewModel = new ArticleModel();
		$this->returnView($viewModel->add(), true);
	}
}