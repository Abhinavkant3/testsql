<?php
class AllianceMemberController extends Controller {

	public function actionCreate() {
		if(isset($_POST['AllianceMember'])) {
			$alliance_member = AllianceMember::create($_POST['AllianceMember']);
			if(!$alliance_member->errors) {
				$this->renderSuccess(array('id'=>$alliance_member->id));
			} else {
				$this->renderError($this->getErrorMessageFromModelErrors($alliance_member));
			}
		}   else{
			$this->renderError('Please send post data!');
		}
	}  

}