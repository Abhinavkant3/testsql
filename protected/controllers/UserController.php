<?php
class UserController extends Controller {

	public function actionCreate() {
		if(isset($_POST['User'])) {
			$user = User::create($_POST['User']);
			if(!$user->errors) {
				$this->renderSuccess(array('user_id'=>$user->id));
			} else {
				$this->renderError($this->getErrorMessageFromModelErrors($user));
			}
		} else {
			$this->renderError('Please Create a new User!');
		}
	}

	public function actionYo() {
		
		$users = User::model()->active()->findAll(array('condition'=>'mrp>6000 AND created_at > 1482499400 AND created_at < 1482499406'));
		if(!$users){
			$this->renderError('no matches found');
		}
		else{
			$users_exist = array();
			foreach($users as $user){
				$user_exist[] = array('id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'mrp' => $user->mrp,'created_at' => $user->created_at);
			}
			$this->renderSuccess(array('user_info'=>$user_exist));
		}
	}

	public function actionThree() {
		$var = time();
		$users = User::model()->active()->with('alliance')->findAll(array('condition'=>"mrp > 10000  AND updated_at > :var",'params'=>array('var'=>$var-(7*24*60*60))));
		if(!$users)
			$this->renderError('No matches found.');
		else {
			foreach ($users as $user) {
				$user_details[] = array('user_id'=>$users->id);
			}
			$this->renderSuccess(array('users'=>$user_details));
		}

	}

	public function actionFour() {
		$users = User::model()->active()->with('payments')->findAll(array('condition'=>"app_activity_count > 10000 OR web_activity_count > 5000"));
		if(!$users)
			$this->renderError('No matches found.');
		else {
			foreach ($users as $user) {
				$user_details[] = array('user_id'=>$users->id);
			}
			$this->renderSuccess(array('users'=>$user_details));
		}

	}





}




