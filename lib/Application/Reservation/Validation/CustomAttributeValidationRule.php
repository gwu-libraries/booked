<?php
/**
Copyright 2012-2015 Nick Korbel

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

class CustomAttributeValidationRule implements IReservationValidationRule
{
	/**
	 * @var IAttributeService
	 */
	private $attributeService;

	public function __construct(IAttributeService $attributeService)
	{
		$this->attributeService = $attributeService;
	}

	/**
	 * @param ReservationSeries $reservationSeries
	 * @return ReservationRuleResult
	 */
	public function Validate($reservationSeries)
	{
		$resources = Resources::GetInstance();
		$errorMessage = new StringBuilder();

		$result = $this->attributeService->Validate(CustomAttributeCategory::RESERVATION, $reservationSeries->AttributeValues());
		$isValid  = $result->IsValid();
		foreach ($result->Errors() as $error)
		{
			$errorMessage->AppendLine($error);
		}

		if (!$isValid)
		{
			$errorMessage->PrependLine($resources->GetString('CustomAttributeErrors'));
		}

		return new ReservationRuleResult($isValid, $errorMessage->ToString());
	}
}