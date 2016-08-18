<?php
/**
 * Copyright 2016 Nick Korbel
 *
 * This file is part of Booked Scheduler.
 *
 * Booked Scheduler is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Booked Scheduler is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'lib/Email/namespace.php');
require_once(ROOT_DIR . 'Domain/namespace.php');

class AnnouncementEmail extends EmailMessage
{
	/**
	 * @var string
	 */
	private $announcement;
	/**
	 * @var UserSession
	 */
	private $sentBy;

	/**
	 * @var
	 */
	private $toEmail;
	/**
	 * @var
	 */
	private $toName;

	/**
	 * @param string $announcement
	 * @param UserSession $sentBy
	 * @param string $toEmail
	 * @param string $toName
	 */
	public function __construct($announcement, $sentBy, $toEmail, $toName)
	{
		parent::__construct('en_us');
		$this->announcement = $announcement;
		$this->sentBy = $sentBy;
		$this->toEmail = $toEmail;
		$this->toName = $toName;
	}

	/**
	 * @return array|EmailAddress[]|EmailAddress
	 */
	public function To()
	{
		return new EmailAddress($this->toEmail, $this->toName);
	}

	/**
	 * @return string
	 */
	public function Subject()
	{
		return $this->Translate('AnnouncementSubject', new FullName($this->sentBy->FirstName, $this->sentBy->LastName));
	}

	/**
	 * @return string
	 */
	public function Body()
	{
		$this->Set('AnnouncementText', $this->announcement);
		return $this->FetchTemplate('AnnouncementEmail.tpl');
	}
}