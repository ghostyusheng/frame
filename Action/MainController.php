<?php

require "BaseController.php";

class MainController extends BaseController
{
	public function index () {
        $infos = select(
            [
				'*',
				'group_concat(lon) as lons',
				'group_concat(lat) as lats'
            ]
        )
        ->from('buoyage_info')
		->groupBy('mark_id')
		->execute ();

		$this->attach ('infos', $infos);
		$this->show ('Index\index');
	}

}
