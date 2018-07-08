<?php 

namespace App\Helper;

use Config;

class Status {

	public $code 			= ''; 
	public $description 	= ''; 
	public $returnAction 	= ''; 

	/**
	 *
	 * @param
	 * @return void
	 */
	public function __construct() {
		$this->code = Config::get('constants.STATUS_CODE_SUCCESS');
	}

}
