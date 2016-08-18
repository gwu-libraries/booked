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

require_once(ROOT_DIR . 'Controls/Dashboard/DashboardItem.php');
require_once(ROOT_DIR . 'Presenters/Dashboard/UpcomingReservationsPresenter.php');
require_once(ROOT_DIR . 'Domain/Access/ReservationViewRepository.php');

class AvailableResourcesControl extends DashboardItem implements IAvailableResourcesControl
{
	/**
	 * @var AvailableResourcesPresenter
	 */
	protected $presenter;

	public function __construct(SmartyPage $smarty)
	{
		parent::__construct($smarty);
		$this->presenter = new AvailableResourcesPresenter($this,
														   new ReservationViewRepository(),
														   new ResourceService(new ResourceRepository(),
																			   PluginManager::Instance()->LoadPermission(),
																			   new AttributeService(new AttributeRepository()),
																			   new UserRepository()));
	}

	public function PageLoad()
	{
		$this->presenter->PageLoad(ServiceLocator::GetServer()->GetUserSession());
		$this->Display('upcoming_reservations.tpl');
	}

	public function SetTimezone($timezone)
	{
		$this->Set('Timezone', $timezone);
	}


	public function BindAvailableNow($items)
	{
		// TODO: Implement BindAvailableNow() method.
	}

	public function BindUnavailableNow($items)
	{
		// TODO: Implement BindUnavailableNow() method.
	}

	public function BindUnavailableAllDay($items)
	{
		// TODO: Implement BindUnavailableAllDay() method.
	}
}

interface IAvailableResourcesControl
{
	public function SetTimezone($timezone);

	public function BindAvailableNow($items);

	public function BindUnavailableNow($items);

	public function BindUnavailableAllDay($items);
}