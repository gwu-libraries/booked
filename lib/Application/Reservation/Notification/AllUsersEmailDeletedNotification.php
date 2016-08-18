<?php

/**
 * Copyright 2016 Nick Korbel
 *
 * This file is part of phpScheduleIt.
 *
 * phpScheduleIt is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * phpScheduleIt is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with phpScheduleIt.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'lib/Email/Messages/ReservationDeletedEmailAdmin.php');

class AllUsersEmailDeletedNotification implements IReservationNotification
{
	/**
	 * @var IUserRepository
	 */
	private $userRepo;

	/**
	 * @var IUserViewRepository
	 */
	private $userViewRepo;

	/**
	 * @var IAttributeRepository
	 */
	protected $attributeRepository;

	/**
	 * @param IUserRepository $userRepo
	 * @param IUserViewRepository $userViewRepo
	 * @param IAttributeRepository $attributeRepository
	 */
	public function __construct(IUserRepository $userRepo, IUserViewRepository $userViewRepo,
								IAttributeRepository $attributeRepository)
	{
		$this->userRepo = $userRepo;
		$this->userViewRepo = $userViewRepo;
		$this->attributeRepository = $attributeRepository;
	}

	/**
	 * @param ReservationSeries $reservationSeries
	 */
	function Notify($reservationSeries)
	{
		if ($reservationSeries->CurrentInstance()->EndDate()->LessThan(Date::Now()))
		{
			return; // dont send in the past
		}
		
		$owner = $this->userRepo->LoadById($reservationSeries->UserId());
		$users = $this->userViewRepo->GetAll();
		$resource = $reservationSeries->Resource();

		/** @var $admin UserDto */
		foreach ($users as $user)
		{
			$message = new ReservationDeletedUserEmail($user, $owner, $reservationSeries, $resource, $this->attributeRepository);
			ServiceLocator::GetEmailService()->Send($message);
		}
	}
}

class ReservationDeletedUserEmail extends ReservationDeletedEmailAdmin
{
}