<?php

/**
 * OSSMailView detail view class
 * @package YetiForce.View
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
class OSSMailView_Detail_View extends Vtiger_Detail_View
{

	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('showSummary');
	}

	public function isAjaxEnabled($recordModel)
	{
		return false;
	}

	public function showSummary(\App\Request $request)
	{
		$record = $request->getInteger('record');
		$viewer = $this->getViewer($request);
		$viewer->assign('RECORD', $record);
	}
}
