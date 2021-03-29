<?php

class Alerts {

	public static function setFlash($heading, $message, $type = "success") {
		$_SESSION['flash']['heading'] = $heading;
	    $_SESSION['flash']['message'] = $message;
	    $_SESSION['flash']['type'] = $type;
	}

	public static function getFlash() {
	    if (isset($_SESSION['flash'])) {
	        extract($_SESSION['flash']);
	        unset($_SESSION['flash']);
	        return "
	        <div class='row d-flex justify-content-center'>
	            <div class='col-auto'>
	                <div class='alert alert-$type text-center animate__animated animate__bounceIn' role='alert'>
	                    <h4 class='alert-heading'>$heading</h4>
	                    <div class='alert-body'>
	                        $message
	                    </div>
	                </div>
	            </div>
	        </div>
	        ";
	    }
	}

}

?>