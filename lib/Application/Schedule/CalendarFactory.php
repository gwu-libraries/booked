<?php
/**
Copyright 2011-2015 Nick Korbel

This file is part of Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
*/


class CalendarTypes
{
	const Month = 'month';
	const Week = 'week';
	const Day = 'day';
}

interface ICalendarFactory
{
	/**
	 * @abstract
	 * @param $type
	 * @param $year
	 * @param $month
	 * @param $day
	 * @param $timezone
	 * @param $firstDayOfWeek
	 * @return ICalendarSegment
	 */
	public function Create($type, $year, $month, $day, $timezone, $firstDayOfWeek = 0);
}

class CalendarFactory implements ICalendarFactory
{
	public function Create($type, $year, $month, $day, $timezone, $firstDayOfWeek = 0)
	{
		if ($type == CalendarTypes::Day)
		{
			return new CalendarDay(Date::Create($year, $month, $day, 0, 0, 0, $timezone));
		}

		if ($type == CalendarTypes::Week)
		{
			return CalendarWeek::FromDate($year, $month, $day, $timezone, $firstDayOfWeek);
		}

		return new CalendarMonth($month, $year, $timezone);
	}
}