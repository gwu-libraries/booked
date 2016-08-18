{*
Copyright 2016 Nick Korbel

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

{include file='globalheader.tpl' cssFiles='css/admin.css'}

<div class="admin" style="margin-top:30px">
	<div class="title">
		{translate key=Import}
	</div>

	<div>
		<div class="validationSummary">
			<ul>
				{async_validator id="fileExtensionValidator" key=""}
				{async_validator id="importQuartzyValidator" key=""}
			</ul>
		</div>
		<div id="importErrors" class="error hidden"></div>
		<div id="importResult" class="hidden">
			<span>{translate key=RowsImported}</span>

			<div id="importCount" class="inline bold"></div>
			<span>{translate key=RowsSkipped}</span>

			<div id="importSkipped" class="inline bold"></div>
			<a href="{$smarty.server.SCRIPT_NAME}">{translate key=Done}</a>
		</div>
		<form id="icsImportForm" method="post" enctype="multipart/form-data" ajaxAction="importIcs">
			<div>
				<input type="file" {formname key=ICS_IMPORT_FILE} />
			</div>

			<div class="admin-update-buttons">
				<button id="btnUpload" type="button" class="button save">{html_image src="table-import.png"} {translate key=Import}</button>
			</div>
		</form>
	</div>
	<div>
		<div class="note">{translate key=OnlyIcs}</div>
		<div class="note">{translate key=IcsLocationsAsResources}</div>
		<div class="note">{translate key=IcsMissingOrganizer}</div>
		<div class="warning">{translate key=IcsWarning}</div>
	</div>
</div>

{csrf_token}
{html_image src="admin-ajax-indicator.gif" class="indicator" style="display:none;"}

{jsfile src="admin/edit.js"}
{jsfile src="js/jquery.form-3.09.min.js"}

<script type="text/javascript">
	$(document).ready(function () {

		var importForm = $('#icsImportForm');

		var defaultSubmitCallback = function (form) {
			return function () {
				return '{$smarty.server.SCRIPT_NAME}?action=' + form.attr('ajaxAction');
			};
		};

		var importHandler = function (responseText, form) {
			if (!responseText)
			{
				return;
			}

			$('#importCount').text(responseText.importCount);
			$('#importSkipped').text(responseText.skippedRows);
			$('#importResult').show();

			var errors = $('#importErrors');
			errors.empty();
			if (responseText.messages && responseText.messages.length > 0)
			{
				var messages = responseText.messages.join('</li><li>');
				errors.html('<div>' + messages + '</div>').show();
			}
		};

		$('#btnUpload').click(function(e)
		{
			e.preventDefault();
			importForm.submit();
		});

		ConfigureAdminForm(importForm, defaultSubmitCallback(importForm), importHandler);
	});
</script>

{include file='globalfooter.tpl'}