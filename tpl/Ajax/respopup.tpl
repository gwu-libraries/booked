{*
Copyright 2011-2015 Nick Korbel

This file is part of Booked Scheduler.

Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Booked Scheduler is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
*}
{if $authorized}
<div class="res_popup_details" style="margin:0">
	{capture "name"}
	<div class="user">
		{if $hideUserInfo || $hideDetails}
			{translate key=Private}
		{else}
			{$fullName}
		{/if}
	</div>
	{/capture}
	{$formatter->Add('name', $smarty.capture.name)}

	{capture "dates"}
		<div class="dates">{formatdate date=$startDate key=res_popup} - {formatdate date=$endDate key=res_popup}</div>
	{/capture}
	{$formatter->Add('dates', $smarty.capture.dates)}

	{capture "title"}
	{if !$hideDetails}
		{* Changed to remove "(no title)" output *}
		{if $title neq ''}<div class="title">{$title}</div>{/if}
	{/if}
	{/capture}
	{$formatter->Add('title', $smarty.capture.title)}

	{capture "resources"}
	<div class="resources">
	{translate key="Resources"} ({$resources|@count}):
	{foreach from=$resources item=resource name=resource_loop}
		{$resource->Name()}
		{if !$smarty.foreach.resource_loop.last}, {/if}
	{/foreach}
	</div>
	{/capture}
	{$formatter->Add('resources', $smarty.capture.resources)}

	{* Removed "Participants" output *}

	{* Removed "Accessories" output *}

	{capture "description"}
	{if !$hideDetails}
		{* Changed to remove "(no description)" output *}
		{if $summary neq ''}<div class="summary">{$summary|truncate:300:"..."|nl2br}</div>{/if}
	{/if}
	{/capture}
	{$formatter->Add('description', $smarty.capture.description)}

	{capture "attributes"}
	{if !$hideDetails}
		{if $attributes|count > 0}
			<br/>
			{foreach from=$attributes item=attribute}
				{assign var=attr value="att`$attribute->Id()`"}
				{capture name=""|cat:$attr}
				<div>{control type="AttributeControl" attribute=$attribute readonly=true}</div>
				{/capture}
				{$smarty.capture.$attr}
				{$formatter->Add($attr, $smarty.capture.$attr)}
			{/foreach}
		{/if}
	{/if}
	{/capture}
	{$formatter->Add('attributes', $smarty.capture.attributes)}

	<!-- {$ReservationId} -->

	{$formatter->Display()}
</div>
{else}
	{translate key='InsufficientPermissionsError'}
{/if}
