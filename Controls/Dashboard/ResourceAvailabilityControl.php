<?php
/**
 * Copyright 2015 Nick Korbel
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

require_once(ROOT_DIR . 'Presenters/Dashboard/ResourceAvailabilityControlPresenter.php');
require_once(ROOT_DIR . 'Controls/Dashboard/DashboardItem.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Schedule/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Attributes/namespace.php');

interface IResourceAvailabilityControl
{
	/**
	 * @param AvailableDashboardItem[] $items
	 */
	public function SetAvailable($items);

	/**
	 * @param UnavailableDashboardItem[] $items
	 */
	public function SetUnavailable($items);

	/**
	 * @param UnavailableDashboardItem[] $items
	 */
	public function SetUnavailableAllDay($items);
}

class AvailableDashboardItem
{
	/**
	 * @param ResourceDto $resource
	 * @param ReservationItemView|null $nextItem
	 */
	public function __construct(ResourceDto $resource, $nextItem = null)
	{
		$this->resource = $resource;
		$this->next = $nextItem;
	}

	/**
	 * @return string
	 */
	public function ResourceName()
	{
		return $this->resource->GetName();
	}

	/**
	 * @return int
	 */
	public function ResourceId()
	{
		return $this->resource->GetId();
	}

	/**
	 * @return Date|null
	 */
	public function NextTime()
	{
		if ($this->next != null)
		{
			return $this->next->StartDate;
		}

		return null;
	}
}

class UnavailableDashboardItem
{
	/**
	 * @var ResourceDto
	 */
	private $resource;

	/**
	 * @var ReservationItemView
	 */
	private $currentReservation;

	public function __construct(ResourceDto $resource, ReservationItemView $currentReservation)
	{
		$this->resource = $resource;
		$this->currentReservation = $currentReservation;
	}

	/**
	 * @return string
	 */
	public function ResourceName()
	{
		return $this->resource->GetName();
	}

	/**
	 * @return int
	 */
	public function ResourceId()
	{
		return $this->resource->GetId();
	}

	/**
	 * @return Date|null
	 */
	public function ReservationEnds()
	{
		return $this->currentReservation->EndDate;
	}
}

class ResourceAvailabilityControl extends DashboardItem implements IResourceAvailabilityControl
{
	public function __construct(SmartyPage $smarty)
	{
		parent::__construct($smarty);


		$this->presenter = new ResourceAvailabilityControlPresenter($this,
																	new ResourceService(new ResourceRepository(), PluginManager::Instance()->LoadPermission(),
																						new AttributeService(new AttributeRepository()), new UserRepository()),
																	new ReservationViewRepository());
	}

	public function PageLoad()
	{
		$userSession = ServiceLocator::GetServer()->GetUserSession();
		$this->Set('Timezone', $userSession->Timezone);

		$this->presenter->PageLoad($userSession);

		$this->Display('resource_availability.tpl');
	}


	public function SetAvailable($items)
	{
		$this->Assign('Available', $items);
	}

	/**
	 * @param UnavailableDashboardItem[] $items
	 */
	public function SetUnavailable($items)
	{
		$this->Assign('Unavailable', $items);
	}

	/**
	 * @param UnavailableDashboardItem[] $items
	 */
	public function SetUnavailableAllDay($items)
	{
		$this->Assign('UnavailableAllDay', $items);
	}
}
