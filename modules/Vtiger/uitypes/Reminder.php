<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * Contributor(s): YetiForce.com
 * *********************************************************************************** */

class Vtiger_Reminder_UIType extends Vtiger_Date_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordInstance = false, $rawText = false)
	{
		$reminder_value = '';
		$reminder_time = $this->getEditViewDisplayValue($value, $recordInstance);
		if (!empty($reminder_time[0])) {
			$reminder_value = $reminder_time[0] . ' ' . \App\Language::translate('LBL_DAYS');
		}
		if (!empty($reminder_time[1])) {
			$reminder_value = $reminder_value . ' ' . $reminder_time[1] . ' ' . \App\Language::translate('LBL_HOURS');
		}
		if (!empty($reminder_time[2])) {
			$reminder_value = $reminder_value . ' ' . $reminder_time[2] . ' ' . \App\Language::translate('LBL_MINUTES');
		}

		return $reminder_value;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEditViewDisplayValue($value, $recordModel = false)
	{
		if ($value != 0) {
			$rem_days = floor($value / (24 * 60));
			$rem_hrs = floor(($value - $rem_days * 24 * 60) / 60);
			$rem_min = ($value - ($rem_days * 24 * 60)) % 60;
			$reminder_time = array($rem_days, $rem_hrs, $rem_min);
			return $reminder_time;
		} else {
			return '';
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/Reminder.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDetailViewTemplateName()
	{
		return 'uitypes/ReminderDetailView.tpl';
	}
}
