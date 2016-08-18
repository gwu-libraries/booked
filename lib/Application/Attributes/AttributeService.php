<?php
/**
 * Copyright 2011-2015 Nick Korbel
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


require_once(ROOT_DIR . 'lib/Common/Helpers/StopWatch.php');

interface IAttributeService
{
	/**
	 * @abstract
	 * @param $category CustomAttributeCategory|int
	 * @param $entityIds array|int[]|int
	 * @return IEntityAttributeList
	 */
	public function GetAttributes($category, $entityIds = array());

	/**
	 * @param $category int|CustomAttributeCategory
	 * @param $attributeValues AttributeValue[]|array
	 * @param $entityId int|null
	 * @return AttributeServiceValidationResult
	 */
	public function Validate($category, $attributeValues, $entityId = null);

	/**
	 * @abstract
	 * @param $category int|CustomAttributeCategory
	 * @return array|CustomAttribute[]
	 */
	public function GetByCategory($category);

	/**
	 * @abstract
	 * @param $attributeId int
	 * @return CustomAttribute
	 */
	public function GetById($attributeId);

	/**
	 * @param UserSession $userSession
	 * @param ReservationView $reservationView
	 * @param int $requestedUserId
	 * @return Attribute[]
	 */
	public function GetReservationAttributes(UserSession $userSession, ReservationView $reservationView, $requestedUserId = 0);
}

class AttributeService implements IAttributeService
{
	/**
	 * @var IAttributeRepository
	 */
	private $attributeRepository;

	/**
	 * @var IAuthorizationService
	 */
	private $authorizationService;

	public function __construct(IAttributeRepository $attributeRepository)
	{
		$this->attributeRepository = $attributeRepository;
	}

	/**
	 * @return IAuthorizationService
	 */
	public function GetAuthorizationService()
	{
		if ($this->authorizationService == null)
		{
			$this->authorizationService = new AuthorizationService(new UserRepository());
		}

		return $this->authorizationService;
	}

	public function GetAttributes($category, $entityIds = array())
	{
		if (!is_array($entityIds) && !empty($entityIds))
		{
			$entityIds = array($entityIds);
		}

		$attributeList = new AttributeList();
		$attributes = $this->attributeRepository->GetByCategory($category);

		$stopwatch = new StopWatch();
		$stopwatch->Start();
		$values = $this->attributeRepository->GetEntityValues($category, $entityIds);

		foreach ($attributes as $attribute)
		{
			$attributeList->AddDefinition($attribute);
		}

		foreach ($values as $value)
		{
			$attributeList->AddValue($value);
		}
		$stopwatch->Stop();

		Log::Debug('Took %d seconds to load custom attributes for category %s', $stopwatch->GetTotalSeconds(), $category);

		return $attributeList;
	}

	public function Validate($category, $attributeValues, $entityId = null, $ignoreEmpty = false)
	{
		$isValid = true;
		$errors = array();

		$resources = Resources::GetInstance();

		$values = array();
		foreach ($attributeValues as $av)
		{
			$values[$av->AttributeId] = $av->Value;
		}

		$attributes = $this->attributeRepository->GetByCategory($category);
		foreach ($attributes as $attribute)
		{
			if ($attribute->UniquePerEntity() && $entityId != $attribute->EntityId())
			{
				continue;
			}

			$value = trim($values[$attribute->Id()]);
			$label = $attribute->Label();

			if (empty($value) && $ignoreEmpty)
			{
				continue;
			}

			if (!$attribute->SatisfiesRequired($value))
			{
				$isValid = false;
				$errors[] = $resources->GetString('CustomAttributeRequired', $label);
			}

			if (!$attribute->SatisfiesConstraint($value))
			{
				$isValid = false;
				$errors[] = $resources->GetString('CustomAttributeInvalid', $label);
			}
		}

		return new AttributeServiceValidationResult($isValid, $errors);
	}

	public function GetByCategory($category)
	{
		return $this->attributeRepository->GetByCategory($category);
	}


	public function GetById($attributeId)
	{
		return $this->attributeRepository->LoadById($attributeId);
	}

	public function GetReservationAttributes(UserSession $userSession, ReservationView $reservationView, $requestedUserId = 0)
	{
		if ($requestedUserId == 0)
		{
			$requestedUserId = $reservationView->OwnerId;
		}

		$attributes = array();
		$customAttributes = $this->GetByCategory(CustomAttributeCategory::RESERVATION);
		foreach ($customAttributes as $attribute)
		{
//			$secondaryCategory = $attribute->SecondaryCategory();

			if ($this->CanReserveFor($userSession, $requestedUserId))
			{
				$attributes[] = new Attribute($attribute, $reservationView->GetAttributeValue($attribute->Id()));
			}
		}

		return $attributes;
	}

	private function CanReserveFor(UserSession $userSession, $requestedUserId)
	{
		return $userSession->UserId == $requestedUserId || $this->GetAuthorizationService()->CanReserveFor($userSession, $requestedUserId);
	}
}

class AttributeServiceValidationResult
{
	/**
	 * @var int
	 */
	private $isValid;

	/**
	 * @var array|string[]
	 */
	private $errors;

	/**
	 * @param $isValid int
	 * @param $errors string[]|array
	 */
	public function __construct($isValid, $errors)
	{
		$this->isValid = $isValid;
		$this->errors = $errors;
	}

	public function IsValid()
	{
		return $this->isValid;
	}

	public function Errors()
	{
		return $this->errors;
	}
}