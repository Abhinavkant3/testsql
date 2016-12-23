<?php
class PostController extends Controller {

	public function actionCreate() {
		if(isset($_POST['Post'])) {
			$post = Post::create($_POST['Post']);
			
			if(!$post->errors) {
				$this->renderSuccess(array('id'=>$post->id));
			} 

			else {
				$this->renderError($this->getErrorMessageFromModelErrors($post));
			}
		}   
		else{
			$this->renderError('Invalid !');
		}
	}
}




