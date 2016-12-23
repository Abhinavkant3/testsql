<?php
class CommentLikeController extends Controller {

	public function actionCreate() {
		if(isset($_POST['CommentLike'])) {
			$like = CommentLike::create($_POST['CommentLike']);
			
			if(!$like->errors) {
				$this->renderSuccess(array('id'=>$like->id));
			} 

			else {
				$this->renderError($this->getErrorMessageFromModelErrors($like));
			}
		}   
		else{
			$this->renderError('Invalid !');
		}
	}
}