<?php
class ControllerExtensionModuleumutBildirim extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/umutBildirim');


	if($setting['bildirim_tekrar'] == "acik"){
		setcookie('bildirim','surekli',time() + (86400 * 30), "/");
				$setting['cookie']="surekli";

	}elseif($setting['bildirim_tekrar'] == "kapali") {
		if (isset($_COOKIE['bildirim'])) {
			if ($_COOKIE['bildirim'] == "bitti") {
					$setting['cookie']="bitti";
			}else {
				setcookie('bildirim',"tek",time() + (86400 * 30), "/");
				$setting['cookie']="tek";
			}

		} else {
			setcookie('bildirim',"tek",time() + (86400 * 30), "/");
			$setting['cookie']="tek";
		}


	}


		return $this->load->view('extension/module/umutBildirim',$setting);
	}
}
