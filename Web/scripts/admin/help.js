/**
 Copyright 2015 Nick Korbel

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
 */
$(function() {
	bindHelpDiv($('#help-prompt'));

	function getDiv() {
		if ($('#helpPopupDiv').length <= 0)
		{
			return $('<div id="helpPopupDiv"/>').appendTo('body');
		}
		else
		{
			return $('#helpPopupDiv');
		}
	}

	function hideDiv() {
		var tag = getDiv();
		var timeoutId = setTimeout(function () {
			tag.hide();
		}, 500);
		tag.data('timeoutId', timeoutId);
	}

	function bindHelpDiv(helpElement) {
		if (helpElement.attr('help-details-bound') === '1')
		{
			return;
		}

		var tag = getDiv();

		tag.mouseenter(function () {
			clearTimeout(tag.data('timeoutId'));
		}).mouseleave(function () {
			hideDiv();
		});

		helpElement.mouseenter(function () {
			var tag = getDiv();
			clearTimeout(tag.data('timeoutId'));

			var data = tag.data('helpContents');
			if (data != null)
			{
				showData(data);
			}
			else
			{
				$.ajax({
					url: '../help.php?ht=admin',
					type: 'GET',
					cache: true,
					beforeSend: function () {
						tag.html('Loading...').show();
						tag.position({my: 'left bottom', at: 'right top', of: helpElement});
					},
					error: tag.html('Error loading help!').show(),
					success: function (data, textStatus, jqXHR) {
						var helpDiv = $(data).find('#' + helpElement.attr('ref'));
						var helpContents = 'Error loading help!';

						if (helpDiv.length > 0)
						{
							helpContents = helpDiv.html();
						}
						tag.data('helpContents', helpContents);
						showData(helpContents);
					}
				});
			}

			function showData(data) {
				tag.html(data).show();
				tag.position({my: 'left bottom', at: 'right top', of: helpElement});
			}
		}).mouseleave(function () {
			hideDiv();
		});

		helpElement.attr('help-details-bound', '1');
	}
});