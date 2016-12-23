<?php
class CommentController extends Controller {

	public function actionCreate() {
		if(isset($_POST['Comment'])) {
			$comment = Comment::create($_POST['Comment']);
			if(!$comment->errors) {
				$this->renderSuccess(array('id'=>$comment->id));
			} else {
				$this->renderError($this->getErrorMessageFromModelErrors($comment));
			}
		}   else{
			$this->renderError('Please send post data!');
		}
	}  

	public function actionTwo() {

		$comments = Comment::model()->with('likes','post')->findAll(array('condition'=>"post.category LIKE :str",'params'=>array('str'=>"Big Reports")));
		if(!$comments) {
			$this->renderError('No matches found.');	
		} 
		else {



	//$count = count($comments->id);
	//$comment_likes = CommentLike::model()->findAllByAttributes(array(count('comment_id'=>$comments->id)));

			$count_data[] = array();
			foreach($comments as $comment){

				$c = CommentLike::model()->count(array('condition'=>"comment_id = {$comment->id}"));

				$count_data[] = array('No_of_Likes'=>$c, 'Comment_id'=>$comment->id);

			}



/*$likes=$comments->like_count;
foreach($comments as $comment) {
$count_data[]=array('comment_id'=>$comment->id,'no_of_likes'=>count($comment),'defaultOrder'=>'count($comment) DESC','limit'=>20);

}
$result[]=$count_data::array()->findAll();
$this->renderSuccess(array('count'=>$result));
*/
}
}

}