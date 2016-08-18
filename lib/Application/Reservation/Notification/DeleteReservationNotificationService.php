<?php
/**
 * Copyright 2011-2015 Nick Korbel
 *
 * This file is part of Booked Scheduler is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'lib/Application/Reservation/Notification/IReservationNotificationService.php');

class DeleteReservationNotificationService extends ReservationNotificationService
{
	public function __construct(IUserRepository $userRepo, IResourceRepository $resourceRepo,
								IAttributeRepository $attributeRepo)
	{
		$notifications = array();

		if (Configuration::Instance()->GetSectionKey(ConfigSection::RESERVATION_NOTIFY,
													 ConfigKeys::NOTIFY_DELETE_ALL_USERS, new BooleanConverter())
		)
		{
			$notifications[] = new AllUsersEmailDeletedNotification($userRepo, $userRepo, $attributeRepo);
		}
		else
		{

			$notifications[] = new OwnerEmailDeletedNotification($userRepo, $attributeRepo);
			$notifications[] = new ParticipantDeletedEmailNotification($userRepo, $attributeRepo);
			$notifications[] = new AdminEmailDeletedNotification($userRepo, $userRepo, $attributeRepo);
		}
		parent::__construct($notifications);
	}
}