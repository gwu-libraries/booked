function ResourceManagement(opts) {
	var options = opts;

	var elements = {
		activeId:$('#activeId'),

		renameDialog:$('#renameDialog'),
		imageDialog:$('#imageDialog'),
		scheduleDialog:$('#scheduleDialog'),
		locationDialog:$('#locationDialog'),
		descriptionDialog:$('#descriptionDialog'),
		notesDialog:$('#notesDialog'),
		deleteDialog:$('#deleteDialog'),
		configurationDialog:$('#configurationDialog'),
		groupAdminDialog:$('#groupAdminDialog'),
		sortOrderDialog:$('#sortOrderDialog'),
		resourceTypeDialog:$('#resourceTypeDialog'),
		statusDialog:$('#statusDialog'),

		renameForm:$('#renameForm'),
		imageForm:$('#imageForm'),
		scheduleForm:$('#scheduleForm'),
		locationForm:$('#locationForm'),
		descriptionForm:$('#descriptionForm'),
		notesForm:$('#notesForm'),
		deleteForm:$('#deleteForm'),
		configurationForm:$('#configurationForm'),
		groupAdminForm:$('#groupAdminForm'),
		attributeForm:$('.attributesForm'),
		sortOrderForm:$('#sortOrderForm'),
		statusForm:$('#statusForm'),
		resourceTypeForm:$('#resourceTypeForm'),

		statusReasons:$('#reasonId'),
		statusOptions:$('#statusId'),
		addStatusReason:$('#addStatusReason'),
		newStatusReason:$('#newStatusReason'),

		addForm:$('#addResourceForm'),
		statusOptionsFilter:$('#resourceStatusIdFilter'),
		statusReasonsFilter:$('#resourceReasonIdFilter'),
		filterTable:$('#filterTable'),
		filterButton:$('#filter'),
		clearFilterButton:$('#clearFilter'),

		bulkUpdatePromptButton:$('#bulkUpdatePromptButton'),
		bulkUpdateDialog:$('#bulkUpdateDialog'),
		bulkUpdateList:$('#bulkUpdateList'),
		bulkUpdateForm:$('#bulkUpdateForm'),
		bulkEditStatusOptions:$('#bulkEditStatusId'),
		bulkEditStatusReasons:$('#bulkEditStatusReasonId'),

		userSearch: $('#userSearch'),
		userDialog: $('#userDialog'),
		addUserForm: $('#addUserForm'),
		removeUserForm: $('#removeUserForm'),
		browseUserDialog: $('#allUsers'),
		browseUsersButton: $('#browseUsers'),
		resourceUserList:$('#resourceUserList'),

		groupSearch: $('#groupSearch'),
		groupDialog: $('#groupDialog'),
		addGroupForm: $('#addGroupForm'),
		removeGroupForm: $('#removeGroupForm'),
		browseGroupDialog: $('#allGroups'),
		browseGroupsButton: $('#browseGroups'),
		resourceGroupList:$('#resourceGroupList')
	};

	var resources = {};
	var reasons = [];

	ResourceManagement.prototype.init = function () {
		$(".days").watermark('days');
		$(".hours").watermark('hrs');
		$(".minutes").watermark('mins');

		ConfigureAdminDialog(elements.renameDialog);
		ConfigureAdminDialog(elements.imageDialog);
		ConfigureAdminDialog(elements.scheduleDialog);
		ConfigureAdminDialog(elements.locationDialog);
		ConfigureAdminDialog(elements.descriptionDialog);
		ConfigureAdminDialog(elements.notesDialog);
		ConfigureAdminDialog(elements.deleteDialog);
		ConfigureAdminDialog(elements.configurationDialog);
		ConfigureAdminDialog(elements.groupAdminDialog);
		ConfigureAdminDialog(elements.sortOrderDialog);
		ConfigureAdminDialog(elements.resourceTypeDialog);
		ConfigureAdminDialog(elements.statusDialog);
		ConfigureAdminDialog(elements.userDialog);
		ConfigureAdminDialog(elements.browseUserDialog);
		ConfigureAdminDialog(elements.groupDialog);
		ConfigureAdminDialog(elements.browseGroupDialog);

		$('.resourceDetails').each(function () {
			var id = $(this).find(':hidden.id').val();
			var indicator = $('.indicator');

			$(this).find('a.update').click(function (e) {
				e.preventDefault();
				setActiveResourceId(id);
			});

			$(this).find('.imageButton').click(function (e) {
				showChangeImage(e);
			});

			$(this).find('.removeImageButton').click(function (e) {
				PerformAsyncAction($(this), getSubmitCallback(options.actions.removeImage), indicator);
			});

			$(this).find('.enableSubscription').click(function (e) {
				PerformAsyncAction($(this), getSubmitCallback(options.actions.enableSubscription), indicator);
			});

			$(this).find('.disableSubscription').click(function (e) {
				PerformAsyncAction($(this), getSubmitCallback(options.actions.disableSubscription), indicator);
			});

			$(this).find('.renameButton').click(function (e) {
				showRename(e);
			});

			$(this).find('.changeScheduleButton').click(function (e) {
				showScheduleMove(e);
			});

			$(this).find('.changeResourceType').click(function (e) {
				showResourceType(e);
			});

			$(this).find('.changeLocationButton').click(function (e) {
				showChangeLocation(e);
			});

			$(this).find('.descriptionButton').click(function (e) {
				showChangeDescription(e);
			});

			$(this).find('.notesButton').click(function (e) {
				showChangeNotes(e);
			});

			$(this).find('.adminButton').click(function (e) {
				showResourceAdmin(e);
			});

			$(this).find('.deleteButton').click(function (e) {
				showDeletePrompt(e);
			});

			$(this).find('.changeConfigurationButton').click(function (e) {
				showConfigurationPrompt(e);
			});

			$(this).find('.changeAttributes, .customAttributes .cancel').click(function (e) {
				var otherResources = $(".resourceDetails[resourceid!='" + id + "']");
				otherResources.find('.attribute-readwrite, .validationSummary').hide();
				otherResources.find('.attribute-readonly').show();
				var container = $(this).closest('.customAttributes');
				container.find('.attribute-readwrite').toggle();
				container.find('.attribute-readonly').toggle();
				container.find('.validationSummary').hide();
			});

			$(this).find('.changeSortOrder').click(function (e) {
				showSortPrompt(e);
			});

			$(this).find('.changeStatus').click(function (e) {
				showStatusPrompt(e);
			});

			$(this).find('.changeUsers').click(function(e) {
				changeUsers();
			});

			$(this).find('.changeGroups').click(function(e) {
				changeGroups();
			});
		});

		$(".save").click(function () {
			$(this).closest('form').submit();
		});

		$(".cancel").click(function () {
			$(this).closest('.dialog').dialog("close");
		});

		$(".cancelColorbox").click(function () {
			$('#bulkUpdateDialog').hide();
			$.colorbox.close();
		});

		elements.statusOptions.change(function(e){
			populateReasonOptions(elements.statusOptions.val(), elements.statusReasons);
		});

		elements.bulkEditStatusOptions.change(function(e){
			populateReasonOptions(elements.bulkEditStatusOptions.val(), elements.bulkEditStatusReasons);
		});

		elements.addStatusReason.click(function(e){
			e.preventDefault();
			elements.newStatusReason.toggle();

			if (elements.newStatusReason.is(':visible')){
				elements.statusReasons.data('prev', elements.statusReasons.val());
				elements.statusReasons.val('');
			}
			else{
				elements.statusReasons.val(elements.statusReasons.data('prev'));
			}
		});

		elements.statusOptionsFilter.change(function(e){
			populateReasonOptions(elements.statusOptionsFilter.val(), elements.statusReasonsFilter);
		});

		elements.filterButton.click(filterResources);

		elements.clearFilterButton.click(function (e) {
			e.preventDefault();
			elements.filterTable.find('input,select,textarea').val('')

			filterResources();
		});

		elements.bulkUpdatePromptButton.click(function(e){
			e.preventDefault();

			var items = [];
			elements.bulkUpdateList.empty();
			$.each(resources, function (i, r) {
				items.push('<li><label><input type="checkbox" name="resourceId[]" checked="checked" value="' + r.id + '" /> ' + r.name + '</li>');
			});
			$('<ul/>', {'class': 'no-style', html: items.join('')}).appendTo(elements.bulkUpdateList);

			wireUpIntervalToggle(elements.bulkUpdateDialog);

			$.colorbox({inline:true,
				href:"#bulkUpdateDialog",
				transition: "none",
				width: "100%",
				height: "100%"});
			elements.bulkUpdateDialog.show();
		});

		elements.userSearch.userAutoComplete(options.userAutocompleteUrl, function(ui) {
			addUserPermission(ui.item.value);
			elements.userSearch.val('');
		});

		elements.browseUserDialog.delegate('.add', 'click', function() {
			var link = $(this);
			var userId = link.siblings('.id').val();

			addUserPermission(userId);

			link.find('img').attr('src', '../img/tick-white.png');
		});

		elements.resourceUserList.delegate('.delete', 'click', function() {
			var userId = $(this).siblings('.id').val();
			removeUserPermission($(this), userId);
		});

		elements.browseUsersButton.click(function() {
			showAllUsersToAdd();
		});

		elements.groupSearch.groupAutoComplete(options.groupAutocompleteUrl, function(ui) {
			addGroupPermission(ui.item.value);
			elements.groupSearch.val('');
		});

		elements.browseGroupDialog.delegate('.add', 'click', function() {
			var link = $(this);
			var groupId = link.siblings('.id').val();

			addGroupPermission(groupId);

			link.find('img').attr('src', '../img/tick-white.png');
		});

		elements.resourceGroupList.delegate('.delete', 'click', function() {
			var groupId = $(this).siblings('.id').val();
			removeGroupPermission($(this), groupId);
		});

		elements.browseGroupsButton.click(function() {
			showAllGroupsToAdd();
		});

		var imageSaveErrorHandler = function (result) {
			alert(result);
		};

		var combineIntervals = function (jqForm, opts) {
			$(jqForm).find('.interval').each(function (i, v) {
				var id = $(v).attr('id');
				var d = $('#' + id + 'Days').val();
				var h = $('#' + id + 'Hours').val();
				var m = $('#' + id + 'Minutes').val();
				$(v).val(d + 'd' + h + 'h' + m + 'm');
				//console.log($(v).val());
			});
		};

		var attributesHandler = function(responseText, form) {
			if (responseText.ErrorIds && responseText.Messages.attributeValidator)
			{
				var messages =  responseText.Messages.attributeValidator.join('</li><li>');
				messages = '<li>' + messages + '</li>';
				var validationSummary = $(form).find('.validationSummary');
				validationSummary.find('ul').empty().append(messages);
				validationSummary.show();
			}
		};

		var errorHandler = function (result) {
			$("#globalError").html(result).show();
		};

		var bulkUpdateErrorHandler = function (result) {
			$("#bulkUpdateErrors").html(result).show();
		};

		ConfigureAdminForm(elements.imageForm, defaultSubmitCallback(elements.imageForm), null, imageSaveErrorHandler);
		ConfigureAdminForm(elements.renameForm, defaultSubmitCallback(elements.renameForm), null, errorHandler);
		ConfigureAdminForm(elements.scheduleForm, defaultSubmitCallback(elements.scheduleForm));
		ConfigureAdminForm(elements.locationForm, defaultSubmitCallback(elements.locationForm));
		ConfigureAdminForm(elements.descriptionForm, defaultSubmitCallback(elements.descriptionForm));
		ConfigureAdminForm(elements.notesForm, defaultSubmitCallback(elements.notesForm));
		ConfigureAdminForm(elements.addForm, defaultSubmitCallback(elements.addForm), null, handleAddError);
		ConfigureAdminForm(elements.deleteForm, defaultSubmitCallback(elements.deleteForm));
		ConfigureAdminForm(elements.configurationForm, defaultSubmitCallback(elements.configurationForm), null, errorHandler, {onBeforeSerialize:combineIntervals});
		ConfigureAdminForm(elements.groupAdminForm, defaultSubmitCallback(elements.groupAdminForm));
		ConfigureAdminForm(elements.resourceTypeForm, defaultSubmitCallback(elements.resourceTypeForm));
		ConfigureAdminForm(elements.bulkUpdateForm, defaultSubmitCallback(elements.bulkUpdateForm), null, bulkUpdateErrorHandler, {onBeforeSerialize:combineIntervals});
		ConfigureAdminForm(elements.addUserForm, defaultSubmitCallback(elements.addUserForm), changeUsers, errorHandler);
		ConfigureAdminForm(elements.removeUserForm, defaultSubmitCallback(elements.removeUserForm), changeUsers, errorHandler);
		ConfigureAdminForm(elements.addGroupForm, defaultSubmitCallback(elements.addGroupForm), changeGroups, errorHandler);
		ConfigureAdminForm(elements.removeGroupForm, defaultSubmitCallback(elements.removeGroupForm), changeGroups, errorHandler);

		$.each(elements.attributeForm, function(i,form){
			ConfigureAdminForm($(form), defaultSubmitCallback($(form)), null, attributesHandler, {validationSummary:null});
		});

		ConfigureAdminForm(elements.sortOrderForm, defaultSubmitCallback(elements.sortOrderForm));
		ConfigureAdminForm(elements.statusForm, defaultSubmitCallback(elements.statusForm));
	};

	ResourceManagement.prototype.add = function (resource) {
		resources[resource.id] = resource;
	};

	ResourceManagement.prototype.addStatusReason = function (id, statusId, description) {
		if (!(statusId in reasons))
		{
			reasons[statusId] = [];
		}

		reasons[statusId].push({id:id,description:description});
	};

	ResourceManagement.prototype.initializeStatusFilter = function (statusId, reasonId)	{
		elements.statusOptionsFilter.val(statusId);
		elements.statusOptionsFilter.trigger('change');
		elements.statusReasonsFilter.val(reasonId);
	};

	var getSubmitCallback = function (action) {
		return function () {
			return options.submitUrl + "?rid=" + getActiveResourceId() + "&action=" + action;
		};
	};

	var defaultSubmitCallback = function (form) {
		return function () {
			return options.submitUrl + "?action=" + form.attr('ajaxAction') + '&rid=' + getActiveResourceId();
		};
	};

	var setActiveResourceId = function (scheduleId) {
		elements.activeId.val(scheduleId);
	};

	var getActiveResourceId = function () {
		return elements.activeId.val();
	};

	var getActiveResource = function () {
		return resources[getActiveResourceId()];
	};

	var showChangeImage = function (e) {
		elements.imageDialog.dialog("open");
	};

	var showRename = function (e) {
		$('#editName').val(HtmlDecode(getActiveResource().name));
		elements.renameDialog.dialog("open");
	};

	var showScheduleMove = function (e) {
		$('#editSchedule').val(getActiveResource().scheduleId);
		elements.scheduleDialog.dialog("open");
	};

	var showResourceType = function (e) {
		$('#editResourceType').val(getActiveResource().resourceTypeId);
		elements.resourceTypeDialog.dialog("open");
	};

	var showChangeLocation = function (e) {
		$('#editLocation').val(getActiveResource().location);
		$('#editContact').val(getActiveResource().contact);
		elements.locationDialog.dialog("open");
	};

	var showChangeDescription = function (e) {
		$('#editDescription').val(HtmlDecode(getActiveResource().description));
		elements.descriptionDialog.dialog("open");
	};

	var showChangeNotes = function (e) {
		$('#editNotes').val(HtmlDecode(getActiveResource().notes));
		elements.notesDialog.dialog("open");
	};

	var showResourceAdmin = function (e) {
		$('#adminGroupId').val(getActiveResource().adminGroupId);
		elements.groupAdminDialog.dialog("open");
	};

	var showDeletePrompt = function (e) {
		elements.deleteDialog.dialog("open");
	};

	var showConfigurationPrompt = function (e) {

		wireUpIntervalToggle(elements.configurationDialog);

		var resource = getActiveResource();

		setDaysHoursMinutes('#minDuration', resource.minLength, $('#noMinimumDuration'));
		setDaysHoursMinutes('#maxDuration', resource.maxLength, $('#noMaximumDuration'));
		setDaysHoursMinutes('#startNotice', resource.startNotice, $('#noStartNotice'));
		setDaysHoursMinutes('#endNotice', resource.endNotice, $('#noEndNotice'));
		setDaysHoursMinutes('#bufferTime', resource.bufferTime, $('#noBufferTime'));
		showHideConfiguration(resource.maxParticipants, $('#maxCapacity'), $('#unlimitedCapacity'));

		$('#allowMultiday').val(resource.allowMultiday);
		$('#requiresApproval').val(resource.requiresApproval);

		var autoAssign = $('#autoAssign');
		autoAssign.val(resource.autoAssign);
		autoAssign.change(function() {
			var removeAll = $('#autoAssignRemoveAllPermissions');
			removeAll.find('input').prop('checked', false);
			if (autoAssign.val() == "0")
			{
				removeAll.show();
			}
			else
			{
				removeAll.hide();
			}
		});

		elements.configurationDialog.dialog("open");
	};

	var showSortPrompt = function (e) {
		$('#editSortOrder').val(getActiveResource().sortOrder);
		elements.sortOrderDialog.dialog("open");
	};

	var showStatusPrompt = function (e) {
		var resource = getActiveResource();
		elements.statusOptions.val(resource.statusId);

		populateReasonOptions(elements.statusOptions, elements.statusReasons);

		elements.statusReasons.val(resource.reasonId);

		elements.statusDialog.dialog("open");
	};

	function populateReasonOptions(statusId, reasonsElement){
		reasonsElement.empty().append($('<option>', {value:'', text:'-'}));

		if (statusId in reasons)
		{
			$.each(reasons[statusId], function(i, v){
				reasonsElement.append($('<option>', {
						value: v.id,
						text : v.description
					}));
			});
		}
	}

	function setDaysHoursMinutes(elementPrefix, interval, attributeCheckbox) {
		$(elementPrefix + 'Days').val(interval.days);
		$(elementPrefix + 'Hours').val(interval.hours);
		$(elementPrefix + 'Minutes').val(interval.minutes);
		showHideConfiguration(interval.value, $(elementPrefix), attributeCheckbox);
	}

	function showHideConfiguration(attributeValue, attributeDisplayElement, attributeCheckbox) {
		attributeDisplayElement.val(attributeValue);
		var id = attributeCheckbox.attr('id');
		var span = elements.configurationDialog.find('.' + id);

		if (attributeValue == '' || attributeValue == undefined) {
			attributeCheckbox.prop('checked', true);
			span.hide();
		}
		else {
			attributeCheckbox.prop('checked', false);
			span.show();
		}
	}

	function wireUpIntervalToggle(container) {
		container.find(':checkbox').change(function ()
		{
			var id = $(this).attr('id');
			var span = container.find('.' + id);

			if ($(this).is(":checked"))
			{
				span.find(":text").val('');
				span.hide();
			}
			else
			{
				span.show();
			}
		});
	}

	function filterResources() {
		window.location = document.location.pathname + '?' + $('#filterForm').serialize();
	}

	var handleAddError = function (result) {
		$('#addResourceResults').text(result).show();
	};

	var changeUsers = function() {
		var resourceId = getActiveResourceId();
		$.getJSON(opts.permissionsUrl + '?dr=users', {rid: resourceId}, function(data) {
			var items = [];
			var userIds = [];

			$('#totalUsers').text(data.Total);
			if (data.Users != null)
			{
				$.map(data.Users, function(item) {
					items.push('<li><a href="#" class="delete"><img src="../img/cross-button.png" /></a> ' + item.DisplayName + '<input type="hidden" class="id" value="' + item.Id + '"/></li>');
					userIds[item.Id] = item.Id;
				});
			}

			elements.resourceUserList.empty();
			elements.resourceUserList.data('userIds', userIds);

			$('<ul/>', {'class': '', html: items.join('')}).appendTo(elements.resourceUserList);
			elements.userDialog.dialog('open');
		});
	};

	var addUserPermission = function(userId) {
		$('#addUserId').val(userId);
		elements.addUserForm.submit();
	};

	var removeUserPermission = function(element, userId) {
		$('#removeUserId').val(userId);
		elements.removeUserForm.submit();
	};

	var allUserList;

	var showAllUsersToAdd = function() {
		elements.browseUserDialog.empty();

		if (allUserList == null) {
			$.ajax({
				url: options.userAutocompleteUrl,
				dataType: 'json',
				async: false,
				success: function(data) {
					allUserList = data;
				}
			});
		}

		var items = [];
		if (allUserList != null)
		{
			$.map(allUserList, function(item) {
				if (elements.resourceUserList.data('userIds')[item.Id] == undefined) {
					items.push('<li><a href="#" class="add"><img src="../img/plus-button.png" alt="Add" /></a> ' + item.DisplayName + '<input type="hidden" class="id" value="' + item.Id + '"/></li>');
				}
				else {
					items.push('<li><img src="../img/tick-white.png" /> <span>' + item.DisplayName + '</span></li>');
				}
			});
		}

		$('<ul/>', {'class': '', html: items.join('')}).appendTo(elements.browseUserDialog);

		elements.browseUserDialog.dialog('open');
	};

	var changeGroups = function() {
		var resourceId = getActiveResourceId();
		$.getJSON(opts.permissionsUrl + '?dr=groups', {rid: resourceId}, function(data) {
			var items = [];
			var groups = [];

			$('#totalGroups').text(data.Total);
			if (data.Groups != null)
			{
				$.map(data.Groups, function(item) {
					items.push('<li><a href="#" class="delete"><img src="../img/cross-button.png" /></a> ' + item.Name + '<input type="hidden" class="id" value="' + item.Id + '"/></li>');
					groups[item.Id] = item.Id;
				});
			}

			elements.resourceGroupList.empty();
			elements.resourceGroupList.data('groupIds', groups);

			$('<ul/>', {'class': '', html: items.join('')}).appendTo(elements.resourceGroupList);
			elements.groupDialog.dialog('open');
		});
	};

	var addGroupPermission = function(group) {
		$('#addGroupId').val(group);
		elements.addGroupForm.submit();
	};

	var removeGroupPermission = function(element, groupId) {
		$('#removeGroupId').val(groupId);
		elements.removeGroupForm.submit();
	};

	var allGroupList;

	var showAllGroupsToAdd = function() {
		elements.browseGroupDialog.empty();

		if (allGroupList == null) {
			$.ajax({
				url: options.groupAutocompleteUrl,
				dataType: 'json',
				async: false,
				success: function(data) {
					allGroupList = data;
				}
			});
		}

		var items = [];
		if (allGroupList != null)
		{
			$.map(allGroupList, function(item) {
				if (elements.resourceGroupList.data('groupIds')[item.Id] == undefined) {
					items.push('<li><a href="#" class="add"><img src="../img/plus-button.png" alt="Add To Group" /></a> ' + item.Name + '<input type="hidden" class="id" value="' + item.Id + '"/></li>');
				}
				else {
					items.push('<li><img src="../img/tick-white.png" /> <span>' + item.Name + '</span></li>');
				}
			});
		}

		$('<ul/>', {'class': '', html: items.join('')}).appendTo(elements.browseGroupDialog);

		elements.browseGroupDialog.dialog('open');
	};

}