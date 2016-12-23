<?php
class PaymentOrderController extends Controller {

	public function actionCreate() {
		if(isset($_POST['PaymentOrder'])) {
			$payment_order = PaymentOrder::create($_POST['PaymentOrder']);
			if(!$payment_order->errors) {
				$this->renderSuccess(array('user_id'=>$payment_order->id));
			} else {
				$this->renderError($this->getErrorMessageFromModelErrors($payment_order));
			}
		} else {
			$this->renderError('Please Create a new PaymentOrder!');
		}
	}

}