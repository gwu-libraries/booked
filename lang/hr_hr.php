<?php
/**
Copyright 2011-2015 Nick Korbel
Croatian translation by t.davor@gmail.com
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

require_once('Language.php');
require_once('en_us.php');

class hr_hr extends en_us
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return array
	 */
	protected function _LoadDates()
	{
		$dates = parent::_LoadDates();

		$dates['general_date'] = 'j.n.Y'; // d.m.Y
		$dates['general_datetime'] = 'j.n.Y H:i:s';
		$dates['schedule_daily'] = 'l, j.n.Y';
		$dates['reservation_email'] = 'j.n.Y @ G:i (e)';
		$dates['res_popup'] = 'j.n.Y G:i';
		$dates['dashboard'] = 'j.n.Y G:i (l)';
		$dates['period_time'] = 'G:i';
		$dates['general_date_js'] = 'dd.mm.gg';
		$dates['calendar_time'] = 'H:mm';
		$dates['calendar_dates'] = 'M/d';

		$this->Dates = $dates;

		return $this->Dates;
	}

	/**
	 * @return array
	 */
	protected function _LoadStrings()
	{
		$strings = parent::_LoadStrings();

		$strings['FirstName'] = 'Ime';
		$strings['LastName'] = 'Prezime';
		$strings['Timezone'] = 'Vremenska zona';
		$strings['Edit'] = 'Uredi';
		$strings['Change'] = 'Promjeni';
		$strings['Rename'] = 'Preimenuj';
		$strings['Remove'] = 'Ukloni';
		$strings['Delete'] = 'Obriši';
		$strings['Update'] = 'Ažuriraj';
		$strings['Cancel'] = 'Odustani';
		$strings['Add'] = 'Dodaj';
		$strings['Name'] = 'Ime';
		$strings['Yes'] = 'Da';
		$strings['No'] = 'Ne';
		$strings['FirstNameRequired'] = 'Ime je obavezno.';
		$strings['LastNameRequired'] = 'Prezime je obavezno.';
		$strings['PwMustMatch'] = 'Lozinke moraju odgovarati.';
		$strings['ValidEmailRequired'] = 'Ispravna mail adresa je obavezna.';
		$strings['UniqueEmailRequired'] = 'Mail adresa se već koristi';
		$strings['UniqueUsernameRequired'] = 'Korisničko ime je već registrirano.';
		$strings['UserNameRequired'] = 'Korisničko ime je obavezno.';
		$strings['CaptchaMustMatch'] = 'Upišite slova sa slike.';
		$strings['Today'] = 'Danas';
		$strings['Week'] = 'Tjedan';
		$strings['Month'] = 'Mjesec';
		$strings['BackToCalendar'] = 'Povratak na kalendar';
		$strings['BeginDate'] = 'Početak';
		$strings['EndDate'] = 'Kraj';
		$strings['Username'] = 'Korisničko ime';
		$strings['Password'] = 'Lozinka';
		$strings['PasswordConfirmation'] = 'Potvrdi lozinku';
		$strings['DefaultPage'] = 'Početna stranica';
		$strings['MyCalendar'] = 'Moj kalendar';
		$strings['ScheduleCalendar'] = 'Kalendar rasporeda';
		$strings['Registration'] = 'Registracija';
		$strings['NoAnnouncements'] = 'Nema obavijesti';
		$strings['Announcements'] = 'Obavijesti';
		$strings['NoUpcomingReservations'] = 'Nema nadolazećih rezervacija';
		$strings['UpcomingReservations'] = 'Nadolazeće rezervacije';
		$strings['AllNoUpcomingReservations'] = 'Nema nadolazećih rezervacija u slijedećih %s dana';
		$strings['AllUpcomingReservations'] = 'Sve nadolazeće rezervacije';
		$strings['ShowHide'] = 'Prikaži/Sakrij';
		$strings['Error'] = 'Greška';
		$strings['ReturnToPreviousPage'] = 'Povratak na prethodnu stranicu';
		$strings['UnknownError'] = 'Nepoznata greška';
		$strings['InsufficientPermissionsError'] = 'Nemate dozvolu za pristup';
		$strings['MissingReservationResourceError'] = 'Nije izabran resurs';
		$strings['MissingReservationScheduleError'] = 'Nije izabran resurs';
		$strings['DoesNotRepeat'] = 'Ne ponavljaj';
		$strings['Daily'] = 'Dnevno';
		$strings['Weekly'] = 'Tjedno';
		$strings['Monthly'] = 'Mjesečno';
		$strings['Yearly'] = 'Godišnje';
		$strings['RepeatPrompt'] = 'Ponovi';
		$strings['hours'] = 'sati';
		$strings['days'] = 'dana';
		$strings['weeks'] = 'tjedana';
		$strings['months'] = 'mjeseci';
		$strings['years'] = 'godina';
		$strings['day'] = 'dan';
		$strings['week'] = 'tjedan';
		$strings['month'] = 'mjesec';
		$strings['year'] = 'godina';
		$strings['repeatDayOfMonth'] = 'dan u mjesecu';
		$strings['repeatDayOfWeek'] = 'dan u tjednu';
		$strings['RepeatUntilPrompt'] = 'Do';
		$strings['RepeatEveryPrompt'] = 'Svaki';
		$strings['RepeatDaysPrompt'] = 'Na';
		$strings['CreateReservationHeading'] = 'Kreiraj novu rezervaciju';
		$strings['EditReservationHeading'] = 'Uređivanje rezervacije %s';
		$strings['ViewReservationHeading'] = 'Pregledavanje rezervacije %s';
		$strings['ReservationErrors'] = 'Izmjena rezervacije';
		$strings['Create'] = 'Kreiraj';
		$strings['ThisInstance'] = 'Samo ovaj put';
		$strings['AllInstances'] = 'Svaki put';
		$strings['FutureInstances'] = 'Ubuduće';
		$strings['Print'] = 'Ispis';
		$strings['ShowHideNavigation'] = 'Pokaži/Sakrij navigaciju';
		$strings['ReferenceNumber'] = 'Referentni broj';
		$strings['Tomorrow'] = 'Sutra';
		$strings['LaterThisWeek'] = 'Kasnije ovaj tjedan';
		$strings['NextWeek'] = 'Sljedeći tjedan';
		$strings['SignOut'] = 'Odjavi se';
		$strings['LayoutDescription'] = 'Počni na %s, pokaži %s dana odjednom';
		$strings['AllResources'] = 'Sve resurse';
		$strings['TakeOffline'] = 'Offline';
		$strings['BringOnline'] = 'Online';
		$strings['AddImage'] = 'Dodaj sliku';
		$strings['NoImage'] = 'Slika nije dodijeljena';
		$strings['Move'] = 'Ukloni';
		$strings['AppearsOn'] = 'Pojavljuje se na %s';
		$strings['Location'] = 'Lokacija';
		$strings['NoLocationLabel'] = '(nije podešena lokacija)';
		$strings['Contact'] = 'Kontakt';
		$strings['NoContactLabel'] = '(nema informacija o kontaktu)';
		$strings['Description'] = 'Opis';
		$strings['NoDescriptionLabel'] = '(nema opisa)';
		$strings['Notes'] = 'Bilješke';
		$strings['NoNotesLabel'] = '(nema bilješki)';
		$strings['NoTitleLabel'] = '(nema naziva)';
		$strings['UsageConfiguration'] = 'Konfiguracija korištenja';
		$strings['ChangeConfiguration'] = 'Izmjeni konfiguraciju';
		$strings['ResourceMinLength'] = 'Rezervacija mora trajati najmanje %s';
		$strings['ResourceMinLengthNone'] = 'Nema minimalnog trajanja rezervacije';
		$strings['ResourceMaxLength'] = 'Rezervacija ne može trajati manje od %s';
		$strings['ResourceMaxLengthNone'] = 'Nema maksimalnog trajanja rezervacije';
		$strings['ResourceRequiresApproval'] = 'Rezervacija mora biti odobrena';
		$strings['ResourceRequiresApprovalNone'] = 'Rezervacija ne zahtjeva odobrenje';
		$strings['ResourcePermissionAutoGranted'] = 'Dozvola je automatski odobrena';
		$strings['ResourcePermissionNotAutoGranted'] = 'Dozvola nije automatski odobrena';
		$strings['ResourceMinNotice'] = 'Rezervacija mora biti napravljena najmanje %s prije početka';
		$strings['ResourceMinNoticeNone'] = 'Rezervacija može biti napravljena do trenutnog vremena';
		$strings['ResourceMaxNotice'] = 'Rezervacija ne mora završiti %s od trenutnog vremena';
		$strings['ResourceMaxNoticeNone'] = 'Rezervacija može završiti bilo kada';
		$strings['ResourceBufferTime'] = 'Mora biti %s između rezervacija';
		$strings['ResourceBufferTimeNone'] = 'Nema razmaka između rezervacija';
		$strings['ResourceAllowMultiDay'] = 'Rezervacije mogu biti preko dana';
		$strings['ResourceNotAllowMultiDay'] = 'Rezervacije ne mogu biti preko dana';
		$strings['ResourceCapacity'] = 'Ovaj resurs ima kapacitet od %s osoba';
		$strings['ResourceCapacityNone'] = 'Ovaj resurs ima neograničen kapacitet';
		$strings['AddNewResource'] = 'Dodaj novi resurs';
		$strings['AddNewUser'] = 'Dodaj novog korisnika';
		$strings['AddUser'] = 'Dodaj korisnika';
		$strings['Schedule'] = 'Raspored';
		$strings['AddResource'] = 'Dodaj resurs';
		$strings['Capacity'] = 'Kapacitet';
		$strings['Access'] = 'Pristup';
		$strings['Duration'] = 'Trajanje';
		$strings['Active'] = 'Aktivan';
		$strings['Inactive'] = 'Neaktivan';
		$strings['ResetPassword'] = 'Resetiraj lozinku';
		$strings['LastLogin'] = 'Posljednja prijava';
		$strings['Search'] = 'Traži';
		$strings['ResourcePermissions'] = 'Dozvole resursa';
		$strings['Reservations'] = 'Rezervacije';
		$strings['Groups'] = 'Grupe';
		$strings['Users'] = 'Korisnici';
		$strings['ResetPassword'] = 'Resetiraj lozinku';
		$strings['AllUsers'] = 'Svi korisnici';
		$strings['AllGroups'] = 'Sve grupe';
		$strings['AllSchedules'] = 'Svi rasporedi';
		$strings['UsernameOrEmail'] = 'Korisničko ime ili email';
		$strings['Members'] = 'Članovi';
		$strings['QuickSlotCreation'] = 'Kreiraj mjesto svakih %s minuta između %s i %s';
		$strings['ApplyUpdatesTo'] = 'Dodaj ažuriranja';
		$strings['CancelParticipation'] = 'Otkaži sudjelovanje';
		$strings['Attending'] = 'Prisustvovanje';
		$strings['QuotaConfiguration'] = 'On %s for %s users in %s are limited to %s %s per %s'; // todo
		$strings['reservations'] = 'rezervacije';
		$strings['reservation'] = 'rezervacija';
		$strings['ChangeCalendar'] = 'Izmjeni kalendar';
		$strings['AddQuota'] = 'Dodaj kvotu';
		$strings['FindUser'] = 'Traži korisnika';
		$strings['Created'] = 'Kreirano';
		$strings['LastModified'] = 'Zadnja izmjena';
		$strings['GroupName'] = 'Ime grupe';
		$strings['GroupMembers'] = 'Članovi grupe';
		$strings['GroupRoles'] = 'Uloge grupe';
		$strings['GroupAdmin'] = 'Administrator grupe';
		$strings['Actions'] = 'Aktivnost';
		$strings['CurrentPassword'] = 'Trenutna lozinka';
		$strings['NewPassword'] = 'Nova lozinka';
		$strings['InvalidPassword'] = 'Trenutna lozinka nije ispravna';
		$strings['PasswordChangedSuccessfully'] = 'Vaša lozinka je promijenjena';
		$strings['SignedInAs'] = 'korisnik: ';
		$strings['NotSignedIn'] = 'Niste prijavljeni';
		$strings['ReservationTitle'] = 'Naslov rezervacije';
		$strings['ReservationDescription'] = 'Opis rezervacije';
		$strings['ResourceList'] = 'Resursi za rezervaciju';
		$strings['Accessories'] = 'Dodaci';
		$strings['ParticipantList'] = 'Sudjeluju';
		$strings['InvitationList'] = 'Pozvani';
		$strings['AccessoryName'] = 'Ime dodatka';
		$strings['QuantityAvailable'] = 'Dostupna količina';
		$strings['Resources'] = 'Resursi';
		$strings['Participants'] = 'Sudjeluju';
		$strings['User'] = 'Korisnik';
		$strings['Resource'] = 'Resurs';
		$strings['Status'] = 'Status';
		$strings['Approve'] = 'Dozvoli';
		$strings['Page'] = 'Stranica';
		$strings['Rows'] = 'Red';
		$strings['Unlimited'] = 'Neograničeno';
		$strings['Email'] = 'Email';
		$strings['EmailAddress'] = 'Email Adresa';
		$strings['Phone'] = 'Telefon';
		$strings['Organization'] = 'Organizacija';
		$strings['Position'] = 'Pozicija';
		$strings['Language'] = 'Jezik';
		$strings['Permissions'] = 'Dozvole';
		$strings['Reset'] = 'Reset';
		$strings['FindGroup'] = 'Nađi grupu';
		$strings['Manage'] = 'Upravljanje';
		$strings['None'] = 'Ništa';
		$strings['AddToOutlook'] = 'Dodaj u kalendar';
		$strings['Done'] = 'Gotovo';
		$strings['RememberMe'] = 'Zapamti me';
		$strings['FirstTimeUser?'] = 'Prvi put korisnik?';
		$strings['CreateAnAccount'] = 'Kreiraj račun';
		$strings['ViewSchedule'] = 'Vidi raspored';
		$strings['ForgotMyPassword'] = 'Zaboravio sam lozinku';
		$strings['YouWillBeEmailedANewPassword'] = 'Biti će vam poslana nasumce generirana lozinka';
		$strings['Close'] = 'Zatvori';
		$strings['ExportToCSV'] = 'Izvezi u CSV';
		$strings['OK'] = 'OK';
		$strings['Working'] = 'Radim...';
		$strings['Login'] = 'Prijava';
		$strings['AdditionalInformation'] = 'Dodatne informacije';
		$strings['AllFieldsAreRequired'] = 'sva polja su obavezna';
		$strings['Optional'] = 'opcija';
		$strings['YourProfileWasUpdated'] = 'Vaš profil je ažuriran';
		$strings['YourSettingsWereUpdated'] = 'Postavke su ažurirane';
		$strings['Register'] = 'Registriraj';
		$strings['SecurityCode'] = 'Sigurnosni kod';
		$strings['ReservationCreatedPreference'] = 'Kada kreiram rezervaciju ili je kreirana u moje ime';
		$strings['ReservationUpdatedPreference'] = 'Kada ažuriram rezervaciju ili je kreirana u moje ime';
		$strings['ReservationDeletedPreference'] = 'Kada obrišem rezervaciju ili je kreirana u moje ime';
		$strings['ReservationApprovalPreference'] = 'Kada je rezervacija na čekanju odobrena';
		$strings['PreferenceSendEmail'] = 'Pošalji mi email';
		$strings['PreferenceNoEmail'] = 'Ne obavještavaj me';
		$strings['ReservationCreated'] = 'Vaša rezervacija je kreirana!';
		$strings['ReservationUpdated'] = 'Vaša rezervacija je ažurirana!';
		$strings['ReservationRemoved'] = 'Vaša rezervacija je obrisana';
		$strings['ReservationRequiresApproval'] = 'One or more of the resources reserved require approval before usage.  This reservation will be pending until it is approved.'; // todo
		$strings['YourReferenceNumber'] = 'Vaš referentni broj je %s';
		$strings['UpdatingReservation'] = 'Ažuriraj rezervacije';
		$strings['ChangeUser'] = 'Promjeni korisnika';
		$strings['MoreResources'] = 'Više resursa';
		$strings['ReservationLength'] = 'Trajanje rezervacije';
		$strings['ParticipantList'] = 'Lista sudionika';
		$strings['AddParticipants'] = 'Dodaj sudionika';
		$strings['InviteOthers'] = 'Pozovi ostale';
		$strings['AddResources'] = 'Dodaj resurs';
		$strings['AddAccessories'] = 'Dodaj opremu';
		$strings['Accessory'] = 'Oprema';
		$strings['QuantityRequested'] = 'Zahtijevana količina';
		$strings['CreatingReservation'] = 'Kreiram rezervaciju';
		$strings['UpdatingReservation'] = 'Ažuriram rezervaciju';
		$strings['DeleteWarning'] = 'Ova akcija je nepovratna!';
		$strings['DeleteAccessoryWarning'] = 'Brisanje opreme ce je ukloniti iz svih rezervacija.';
		$strings['AddAccessory'] = 'Dodaj opremu';
		$strings['AddBlackout'] = 'Add Blackout'; // todo
		$strings['AllResourcesOn'] = 'Svi resursi ';
		$strings['Reason'] = 'Razlog';
		$strings['BlackoutShowMe'] = 'Prikaži rezervacije u konfliktu';
		$strings['BlackoutDeleteConflicts'] = 'Obriši rezervacije u konfliktu';
		$strings['Filter'] = 'Primjeni';
		$strings['Between'] = 'Između';
		$strings['CreatedBy'] = 'Kreirano od';
		$strings['BlackoutCreated'] = 'Blackout Created'; // todo
		$strings['BlackoutNotCreated'] = 'Blackout could not be created'; // todo
		$strings['BlackoutUpdated'] = 'Blackout Updated'; // todo
		$strings['BlackoutNotUpdated'] = 'Blackout could not be created'; // todo
		$strings['BlackoutConflicts'] = 'There are conflicting blackout times'; // todo
		$strings['ReservationConflicts'] = 'Nema rezervacija u konfliktu';
		$strings['UsersInGroup'] = 'Korisnici u grupi';
		$strings['Browse'] = 'Pretraži';
		$strings['DeleteGroupWarning'] = 'Brisanje ove grupe ce obrisati sve pridružene dozvole resursa. Korisnici u grupi bi mogli izgubiti pristup resursima.';
		$strings['WhatRolesApplyToThisGroup'] = 'Koju ulogu dodajete ovoj grupi?';
		$strings['WhoCanManageThisGroup'] = 'Tko može uređivati grupu?';
		$strings['WhoCanManageThisSchedule'] = 'Tko može uređivati raspored?';
		$strings['AddGroup'] = 'Dodaj grupu';
		$strings['AllQuotas'] = 'Sve kvote';
		$strings['QuotaReminder'] = 'Zapamtite: kvote se provode na temelju vremenske zone rasporeda.';
		$strings['AllReservations'] = 'Sve rezervacije';
		$strings['PendingReservations'] = 'Rezervacije na čekanju';
		$strings['Approving'] = 'Dozvoljavam';
		$strings['MoveToSchedule'] = 'Premjesti u';
		$strings['DeleteResourceWarning'] = 'Brisanje resursa ce obrisati sve pripadajuće podatke uključujući';
		$strings['DeleteResourceWarningReservations'] = 'sve prošle, trenutne i buduće rezervacije koje su mu dodane';
		$strings['DeleteResourceWarningPermissions'] = 'sve dodane dozvole';
		$strings['DeleteResourceWarningReassign'] = 'Molimo preraspodijeliti sve što ne želite da se briše prije nastavka';
		$strings['ScheduleLayout'] = 'Izgled (sva vremena %s)';
		$strings['ReservableTimeSlots'] = 'Vremena rezervacije';
		$strings['BlockedTimeSlots'] = 'Nedostupna vremena';
		$strings['ThisIsTheDefaultSchedule'] = 'Ovo je zadani raspored';
		$strings['DefaultScheduleCannotBeDeleted'] = 'Zadani raspored ne može biti obrisan';
		$strings['MakeDefault'] = 'Postavi kao zadani';
		$strings['BringDown'] = 'Spusti';
		$strings['ChangeLayout'] = 'Promjeni izgled';
		$strings['AddSchedule'] = 'Dodaj raspored';
		$strings['StartsOn'] = 'Počinje u';
		$strings['NumberOfDaysVisible'] = 'Broj vidljivih dana';
		$strings['UseSameLayoutAs'] = 'Koristi isti izgled kao';
		$strings['Format'] = 'Format';
		$strings['OptionalLabel'] = 'Opcionalni naziv';
		$strings['LayoutInstructions'] = 'Enter one slot per line.  Slots must be provided for all 24 hours of the day beginning and ending at 12:00 AM.';
		$strings['AddUser'] = 'Dodaj korisnika';
		$strings['UserPermissionInfo'] = 'Stvarni pristupi resursima mogu biti različiti, ovisno o korisničkoj ulozi, dozvolama grupe ili vanjskim postavke dozvola';
		$strings['DeleteUserWarning'] = 'Brisanje ovog korisnika ce ukloniti sve njihove sadašnje, buduce, i prosle rezervacije.';
		$strings['AddAnnouncement'] = 'Dodaj obavijest';
		$strings['Announcement'] = 'Obavijest';
		$strings['Priority'] = 'Prioritet';
		$strings['Reservable'] = 'Dostupno';
		$strings['Unreservable'] = 'Nedostupno';
		$strings['Reserved'] = 'Rezervirano';
		$strings['MyReservation'] = 'Moje rezervacije';
		$strings['Pending'] = 'Na čekanju';
		$strings['Past'] = 'Prošlo';
		$strings['Restricted'] = 'Zabranjeno';
		$strings['ViewAll'] = 'Vidi sve';
		$strings['MoveResourcesAndReservations'] = 'makni resurse i rezervacije u';
		$strings['TurnOffSubscription'] = 'Iskljuci upise u kalendar';
		$strings['TurnOnSubscription'] = 'Dozvoli upise u kalendar';
		$strings['SubscribeToCalendar'] = 'Pretplati se na kalendar';
		$strings['SubscriptionsAreDisabled'] = 'Administrator je isključio upise u kalendar';
		$strings['NoResourceAdministratorLabel'] = '(nema administratora resursa)';
		$strings['WhoCanManageThisResource'] = 'Tko može uređivati ovaj resurs?';
		$strings['ResourceAdministrator'] = 'Administrator resursa';
		$strings['Private'] = 'Privatno';
		$strings['Accept'] = 'Prihvati';
		$strings['Decline'] = 'Odbij';
		$strings['ShowFullWeek'] = 'Pokazi cijeli tjedan';
		$strings['CustomAttributes'] = 'Prilagođene značajke';
		$strings['AddAttribute'] = 'Dodaj značajku';
		$strings['EditAttribute'] = 'Ažuriraj značajke';
		$strings['DisplayLabel'] = 'Prikazi naziv';
		$strings['Type'] = 'Tip';
		$strings['Required'] = 'Obavezno';
		$strings['ValidationExpression'] = 'Provjera valjanosti';
		$strings['PossibleValues'] = 'Moguće vrijednosti';
		$strings['SingleLineTextbox'] = 'Jednolinijsko polje';
		$strings['MultiLineTextbox'] = 'Viselinijsko polje';
		$strings['Checkbox'] = 'Checkbox';
		$strings['SelectList'] = 'Lista odabira';
		$strings['CommaSeparated'] = 'odvojeno zarezom';
		$strings['Category'] = 'Kategorija';
		$strings['CategoryReservation'] = 'Rezervacija';
		$strings['CategoryGroup'] = 'Grupa';
		$strings['SortOrder'] = 'Sortiraj';
		$strings['Title'] = 'Naslov';
		$strings['AdditionalAttributes'] = 'Dodatne značajke';
		$strings['True'] = 'Da';
		$strings['False'] = 'Ne';
		$strings['ForgotPasswordEmailSent'] = 'E-mail je poslan na adresu s uputama za resetiranje zaporke';
		$strings['ActivationEmailSent'] = 'Uskoro ćete primiti aktivacijiski email.';
		$strings['AccountActivationError'] = 'Greška prilikom aktivacije računa';
		$strings['Attachments'] = 'Prilozi';
		$strings['AttachFile'] = 'Priloži datoteku';
		$strings['Maximum'] = 'max';
		$strings['NoScheduleAdministratorLabel'] = 'Nema administratora rasporeda';
		$strings['ScheduleAdministrator'] = 'Administrator rasporeda';
		$strings['Total'] = 'Total';
		$strings['QuantityReserved'] = 'Količina rasporeda';
		$strings['AllAccessories'] = 'Sva oprema';
		$strings['GetReport'] = 'Izvještaj';
		$strings['NoResultsFound'] = 'Nema rezultata';
		$strings['SaveThisReport'] = 'Spremi izvještaj';
		$strings['ReportSaved'] = 'Izvještaj spremljen!';
		$strings['EmailReport'] = 'Pošalji izvještaj emailom';
		$strings['ReportSent'] = 'Izvještaj poslan!';
		$strings['RunReport'] = 'Pokreni izvještaj';
		$strings['NoSavedReports'] = 'Nema spremljenih izvještaja.';
		$strings['CurrentWeek'] = 'Tekući tjedan';
		$strings['CurrentMonth'] = 'Tekući mjesec';
		$strings['AllTime'] = 'Sve vrijeme';
		$strings['FilterBy'] = 'Filtiraj po';
		$strings['Select'] = 'Odaberi';
		$strings['List'] = 'Lista';
		$strings['TotalTime'] = 'Ukupno vrijeme';
		$strings['Count'] = 'Broj';
		$strings['Usage'] = 'Upotreba';
		$strings['AggregateBy'] = 'Aggregate By'; // todo
		$strings['Range'] = 'Range'; // todo
		$strings['Choose'] = 'Odaberi';
		$strings['All'] = 'Sve';
		$strings['ViewAsChart'] = 'Vidi kao nacrt';
		$strings['ReservedResources'] = 'Rezervirani resursi';
		$strings['ReservedAccessories'] = 'Rezervirana oprema';
		$strings['ResourceUsageTimeBooked'] = 'Upotreba resursa - vrijeme rezervacije';
		$strings['ResourceUsageReservationCount'] = 'Upotreba resursa - broj rezervacije';
		$strings['Top20UsersTimeBooked'] = 'Top 20 korisnika - po vremenu';
		$strings['Top20UsersReservationCount'] = 'Top 20 korisnika - po broju rezervacija';
		$strings['ConfigurationUpdated'] = 'Konfiguracijska datoteka ažurirana';
		$strings['ConfigurationUiNotEnabled'] = 'This page cannot be accessed because $conf[\'settings\'][\'pages\'][\'enable.configuration\'] is set to false or missing.'; // todo
		$strings['ConfigurationFileNotWritable'] = 'The config file is not writable. Please check the permissions of this file and try again.'; // todo
		$strings['ConfigurationUpdateHelp'] = 'Refer to the Configuration section of the <a target=_blank href=%s>Help File</a> for documentation on these settings.'; // todo
		$strings['GeneralConfigSettings'] = 'postavke';
		$strings['UseSameLayoutForAllDays'] = 'Koristi isti izgled za sve dane';
		$strings['LayoutVariesByDay'] = 'Izgled varira po danima';
		$strings['ManageReminders'] = 'Podsjetnik';
		$strings['ReminderUser'] = 'Korisnički ID';
		$strings['ReminderMessage'] = 'Poruka';
		$strings['ReminderAddress'] = 'Adrese';
		$strings['ReminderSendtime'] = 'Vrijeme slanja';
		$strings['ReminderRefNumber'] = 'Referentni broj rezervacije';
		$strings['ReminderSendtimeDate'] = 'Datum podsjetnika';
		$strings['ReminderSendtimeTime'] = 'Vrijeme podsjetnika (HH:MM)';
		$strings['ReminderSendtimeAMPM'] = 'AM / PM';
		$strings['AddReminder'] = 'Dodaj podsjetnik';
		$strings['DeleteReminderWarning'] = 'Sigurni ste?';
		$strings['NoReminders'] = 'Nemate podsjetnika.';
		$strings['Reminders'] = 'Podsjetnici';
		$strings['SendReminder'] = 'Pošalji podsjetnik';
		$strings['minutes'] = 'minuta';
		$strings['hours'] = 'sati';
		$strings['days'] = 'dana';
		$strings['ReminderBeforeStart'] = 'prije početka';
		$strings['ReminderBeforeEnd'] = 'prije kraja';
		$strings['Logo'] = 'Logo';
		$strings['CssFile'] = 'CSS datoteka';
		$strings['ThemeUploadSuccess'] = 'Promjene su snimljene. Osvježite stranicu (F5)';
		$strings['MakeDefaultSchedule'] = 'Postavi kao zadani raspored';
		$strings['DefaultScheduleSet'] = 'Ovo je sada zadani raspored';
		$strings['FlipSchedule'] = 'Okrenite izgled rasporeda';
		$strings['Next'] = 'Sljedeći';
		$strings['Success'] = 'Uspješno';
		$strings['Participant'] = 'Sudionik';
		$strings['ResourceFilter'] = 'Filter resursa';
		$strings['ResourceGroups'] = 'Grupa resursa';
		$strings['AddNewGroup'] = 'Dodaj novu grupu';
		$strings['Quit'] = 'Izlaz';
		$strings['AddGroup'] = 'Dodaj grupu';
		$strings['StandardScheduleDisplay'] = 'Koristi standardni prikaz rasporeda';
		$strings['TallScheduleDisplay'] = 'Koristi povišeni prikaz rasporeda';
		$strings['WideScheduleDisplay'] = 'Koristi prošireni prikaz rasporeda';
		$strings['CondensedWeekScheduleDisplay'] = 'Koristi stisnuti prikaz rasporeda';
		$strings['ResourceGroupHelp1'] = 'Povuci i pusti resurse za reorganizaciju.';
		$strings['ResourceGroupHelp2'] = 'Desni klik na ime grupe resursa za dodatne opcije.';
		$strings['ResourceGroupHelp3'] = 'Povuci i pusti resurse za dodavanje u grupu.';
		$strings['ResourceGroupWarning'] = 'Ako koristite grupe resursa, svaki resurs mora biti dodan u najmanje jednu grupu. Nedodjeljeni resursi ne mogu se rezervirati.';
		$strings['ResourceType'] = 'tip resursa';
		$strings['AppliesTo'] = 'Odnosi se na';
		$strings['UniquePerInstance'] = 'Unique Per Instance';
		$strings['AddResourceType'] = 'Dodaj tip resursa';
		$strings['NoResourceTypeLabel'] = '(nije postavljen tip resursa)';
		$strings['ClearFilter'] = 'ukloni filter';
		$strings['MinimumCapacity'] = 'minimalni kapacitet';
		$strings['Color'] = 'Boja';
		$strings['Available'] = 'Dostupno';
		$strings['Unavailable'] = 'Nedostupno';
		$strings['Hidden'] = 'Skriven';
		$strings['ResourceStatus'] = 'Status resursa';
		$strings['CurrentStatus'] = 'Trenutni status';
		$strings['AllReservationResources'] = 'Svi rezervacijski resursi';
		$strings['File'] = 'Datoteka';
		$strings['BulkResourceUpdate'] = 'Bulk Resource Update'; // todo
		$strings['Unchanged'] = 'Nepromijenjeno';
		$strings['Common'] = 'Common'; // todo
		$strings['AdvancedFilter'] = 'Opcije';
		$strings['AllParticipants'] = 'All Participants'; // todo
		$strings['ResourceAvailability'] = 'Zauzetost resursa'; // todo
		$strings['UnavailableAllDay'] = 'Nedostupno cijeli dan';
		$strings['AvailableUntil'] = 'slobodno do';
		$strings['AvailableBeginningAt'] = 'Available Beginning At'; // todo
		$strings['AllowParticipantsToJoin'] = 'Allow Participants To Join'; // todo
		$strings['JoinThisReservation'] = 'Pridruži se ovoj rezervaciji';
		// End Strings

		// Install
		$strings['InstallApplication'] = 'Instaliraj Booked Scheduler (MySQL samo)';
		$strings['IncorrectInstallPassword'] = 'Žao nam je, lozinka je netočna!.';
		$strings['SetInstallPassword'] = 'Morate postaviti lozinku prije instaliranja.';
		$strings['InstallPasswordInstructions'] = 'In %s please set %s to a password which is random and difficult to guess, then return to this page.<br/>You can use %s';
		$strings['NoUpgradeNeeded'] = 'Nije potrebno ažurirati. Proces instalacije izbrisati ce postojece podatke i instalirati novu verziju!';
		$strings['ProvideInstallPassword'] = 'Molimo unesite instalacijsku lozinku.';
		$strings['InstallPasswordLocation'] = 'Može biti nađeno u %s u %s.';
		$strings['VerifyInstallSettings'] = 'Provjerite zadane postavke. Možete ih pronaći u %s.';
		$strings['DatabaseName'] = 'Ime baze';
		$strings['DatabaseUser'] = 'Korisnik baze';
		$strings['DatabaseHost'] = 'Host baze';
		$strings['DatabaseCredentials'] = 'Morate unijeti podatke MySQL korisnika koji ima pravo kreirati databazu. Ukoliko ne znate, kontaktirajte administratora.';
		$strings['MySQLUser'] = 'MySQL korisnik';
		$strings['InstallOptionsWarning'] = 'The following options will probably not work in a hosted environment. If you are installing in a hosted environment, use the MySQL wizard tools to complete these steps.';
		$strings['CreateDatabase'] = 'Kreiraj bazu';
		$strings['CreateDatabaseUser'] = 'Kreiraj korisnika baze';
		$strings['PopulateExampleData'] = 'Uvozi test podatke. Kreira administratorski račun admin/password i korisnički user/password';
		$strings['DataWipeWarning'] = 'Pažnja: Ovo ce obrisati sve postojeće podatke!';
		$strings['RunInstallation'] = 'Pokreni instalaciju';
		$strings['UpgradeNotice'] = 'Ažurirate verziju <b>%s</b> na verziju <b>%s</b>';
		$strings['RunUpgrade'] = 'Pokreni nadogradnju';
		$strings['Executing'] = 'Izvršavam';
		$strings['StatementFailed'] = 'Greška! Detalji:';
		$strings['SQLStatement'] = 'SQL upit:';
		$strings['ErrorCode'] = 'Error Code:';
		$strings['ErrorText'] = 'Error Text:';
		$strings['InstallationSuccess'] = 'Instalacija uspješno završena!';
		$strings['RegisterAdminUser'] = 'Register your admin user. This is required if you did not import the sample data. Ensure that $conf[\'settings\'][\'allow.self.registration\'] = \'true\' in your %s file.';
		$strings['LoginWithSampleAccounts'] = 'If you imported the sample data, you can log in with admin/password for admin user or user/password for basic user.';
		$strings['InstalledVersion'] = 'Radite u %s verziji Booked Scheduler';
		$strings['InstallUpgradeConfig'] = 'Preporučujemo da nadogradite vašu konfiguracijsku datoteku.';
		$strings['InstallationFailure'] = 'There were problems with the installation.  Please correct them and retry the installation.';
		$strings['ConfigureApplication'] = 'Konfiguriraj Booked Scheduler';
		$strings['ConfigUpdateSuccess'] = 'Vaša konfiguracijska datoteka je ažurna!';
		$strings['ConfigUpdateFailure'] = 'We could not automatically update your config file. Please overwrite the contents of config.php with the following:';
		$strings['SelectUser'] = 'Odaberi korisnika';
		// End Install

		// Errors
		//$strings['LoginError'] = 'Ime i lozinka ne odgovaraju';
		$strings['LoginError'] = 'Uspješno ste logirani kroz SSO, ali nemate pristup ovoj aplikaciji. Odjavite se <a href=logout.php>ovdje</a>';

		$strings['ReservationFailed'] = 'Vasa rezervacija ne može se napraviti';
		$strings['MinNoticeError'] = 'Ova rezervacija zahtijeva prethodnu obavijest. Najraniji datum i vrijeme koje može biti rezervirano je %s.';
		$strings['MaxNoticeError'] = 'Rezervacija se ne može napraviti tako daleko.  Krajnji datum je %s.';
		$strings['MinDurationError'] = 'Rezervacija mora trajati najmanje %s.';
		$strings['MaxDurationError'] = 'Rezervacija ne može trajati duže od %s.';
		$strings['ConflictingAccessoryDates'] = 'Nema dovoljno dodatne opreme:';
		$strings['NoResourcePermission'] = 'Nemate prava za pristup resursima.';
		$strings['ConflictingReservationDates'] = 'Postoje rezervacije u konfliktu za slijedeći datum:';
		$strings['StartDateBeforeEndDateRule'] = 'Datum i vrijeme pocetka mora biti prije datuma i vremena kraja.';
		$strings['StartIsInPast'] = 'Datum i vrijeme početka ne može biti u prošlosti.';
		$strings['EmailDisabled'] = 'Administrator je iskljucio email obavijesti.';
		$strings['ValidLayoutRequired'] = 'Slots must be provided for all 24 hours of the day beginning and ending at 12:00 AM.';
		$strings['CustomAttributeErrors'] = 'There are problems with the additional attributes you provided:';
		$strings['CustomAttributeRequired'] = '%s je obavezno polje.';
		$strings['CustomAttributeInvalid'] = 'Podaci uneseni za %s su neispravni.';
		$strings['AttachmentLoadingError'] = 'Sorry, there was a problem loading the requested file.';
		$strings['InvalidAttachmentExtension'] = 'You can only upload files of type: %s';
		$strings['InvalidStartSlot'] = 'Početno vrijeme i datum su neispravni';
		$strings['InvalidEndSlot'] = 'Završno vrijeme i datum su neispravni.';
		$strings['MaxParticipantsError'] = '%s može primiti samo %s ucesnika.';
		$strings['ReservationCriticalError'] = 'Greška pri snimanju rezervacije, ukoliko se nastavi kontaktirajte administratora.';
		$strings['InvalidStartReminderTime'] = 'Početno vrijeme podsjetnika je neispravno.';
		$strings['InvalidEndReminderTime'] = 'Krajnje vrijeme podsjetnika je neispravno';
		$strings['QuotaExceeded'] = 'Quota limit exceeded.';
		$strings['MultiDayRule'] = '%s ne dopusta rezervacije preko dana';
		$strings['InvalidReservationData'] = 'Problem sa zahtjevom za rezervaciju.';
		$strings['PasswordError'] = 'Lozinka mora sadrzavati najmanje %s slova i najmanje %s brojeva.';
		$strings['PasswordErrorRequirements'] = 'Lozinka mora sadržavati kombinaciju najmanje %s velikih i malih slova i %s brojeva.';
		$strings['NoReservationAccess'] = 'You are not allowed to change this reservation.'; // todo
		$strings['PasswordControlledExternallyError'] = 'Your password is controlled by an external system and cannot be updated here.'; // todo
		$strings['NoResources'] = 'You have not added any resources.'; // todo
		$strings['ParticipationNotAllowed'] = 'You are not allowed to join this reservation.'; // todo
		// End Errors

		// Page Titles
		$strings['CreateReservation'] = 'Kreiraj rezervaciju';
		$strings['EditReservation'] = 'Uredi rezervaciju';
		$strings['LogIn'] = 'Prijavi se';
		$strings['ManageReservations'] = 'Rezervacije';
		$strings['AwaitingActivation'] = 'Čekanje na aktivaciju';
		$strings['PendingApproval'] = 'Čekanje na odobrenje';
		$strings['ManageSchedules'] = 'Rasporedi';
		$strings['ManageResources'] = 'Resursi';
		$strings['ManageAccessories'] = 'Oprema';
		$strings['ManageUsers'] = 'Korisnici';
		$strings['ManageGroups'] = 'Grupe';
		$strings['ManageQuotas'] = 'Kvote';
		$strings['ManageBlackouts'] = 'Blackout vrijeme';
		$strings['MyDashboard'] = 'Moja kontrolna ploča';
		$strings['ServerSettings'] = 'Postavke servera';
		$strings['Dashboard'] = 'Kontrolna ploča';
		$strings['Help'] = 'Pomoć';
		$strings['Administration'] = 'Administracija';
		$strings['About'] = 'O nama';
		$strings['Bookings'] = 'Booking';
		$strings['Schedule'] = 'Raspored';
		$strings['Reservations'] = 'Rezervacije';
		$strings['Account'] = 'Račun';
		$strings['EditProfile'] = 'uredi moj profil';
		$strings['FindAnOpening'] = 'Pronađi otvaranje';
		$strings['OpenInvitations'] = 'Otvorene pozivnice';
		$strings['MyCalendar'] = 'Moj kalendar';
		$strings['ResourceCalendar'] = 'Kalendar resursa';
		$strings['Reservation'] = 'Nova rezervacija';
		$strings['Install'] = 'Instalacija';
		$strings['ChangePassword'] = 'Promjeni lozinku';
		$strings['MyAccount'] = 'Moj račun';
		$strings['Profile'] = 'Profil';
		$strings['ApplicationManagement'] = 'Postavke';
		$strings['ForgotPassword'] = 'Zaboravljena lozinka';
		$strings['NotificationPreferences'] = 'Postavke obavijesti';
		$strings['ManageAnnouncements'] = 'Obavijesti';
		$strings['Responsibilities'] = 'Odgovornosti';
		$strings['GroupReservations'] = 'Grupne rezervacije';
		$strings['ResourceReservations'] = 'Rezervacije resursa';
		$strings['Customization'] = 'Podešavanja';
		$strings['Attributes'] = 'Značajke';
		$strings['AccountActivation'] = 'Aktivacija računa';
		$strings['ScheduleReservations'] = 'Rezervacije rasporeda';
		$strings['Reports'] = 'Izvještaji';
		$strings['GenerateReport'] = 'Kreiraj novi izvještaj';
		$strings['MySavedReports'] = 'Spremljeni izvještaji';
		$strings['CommonReports'] = 'Zajednicki izvještaji';
		$strings['ViewDay'] = 'Vidi dan';
		$strings['Group'] = 'Grupa';
		$strings['ManageConfiguration'] = 'Konfiguracijske opcije';
		$strings['LookAndFeel'] = 'Izgled';
		$strings['ManageResourceGroups'] = 'Grupe resursa';
		$strings['ManageResourceTypes'] = 'Tipovi resursa';
		$strings['ManageResourceStatus'] = 'Statusi resursa';
		// End Page Titles

		// Day representations
		$strings['DaySundaySingle'] = 'N';
		$strings['DayMondaySingle'] = 'P';
		$strings['DayTuesdaySingle'] = 'U';
		$strings['DayWednesdaySingle'] = 'S';
		$strings['DayThursdaySingle'] = 'C';
		$strings['DayFridaySingle'] = 'P';
		$strings['DaySaturdaySingle'] = 'S';

		$strings['DaySundayAbbr'] = 'Ned';
		$strings['DayMondayAbbr'] = 'Pon';
		$strings['DayTuesdayAbbr'] = 'Uto';
		$strings['DayWednesdayAbbr'] = 'Sri';
		$strings['DayThursdayAbbr'] = 'Čet';
		$strings['DayFridayAbbr'] = 'Pet';
		$strings['DaySaturdayAbbr'] = 'Sub';
		// End Day representations

		// Email Subjects
		$strings['ReservationApprovedSubject'] = 'Rezervacija je odobrena';
		$strings['ReservationCreatedSubject'] = 'Rezervacija je kreirana';
		$strings['ReservationUpdatedSubject'] = 'Rezervacija je azurirana';
		$strings['ReservationDeletedSubject'] = 'Rezervacija je uklonjena';
		$strings['ReservationCreatedAdminSubject'] = 'Obavijest:  Rezervacija je kreirana';
		$strings['ReservationUpdatedAdminSubject'] = 'Obavijest:  Rezervacija je ažurirana';
		$strings['ReservationDeleteAdminSubject'] = 'Obavijest:  Rezervacija je uklonjena';
		$strings['ReservationApprovalAdminSubject'] = 'Notification: Reservation Requires Your Approval'; // todo
		$strings['ParticipantAddedSubject'] = 'Obavijest učesniku o rezervaciji';
		$strings['ParticipantDeletedSubject'] = 'Rezervacija uklonjena';
		$strings['InviteeAddedSubject'] = 'Rezervacijska pozivnica';
		$strings['ResetPassword'] = 'Zahtjev za izmjenu lozinke';
		$strings['ActivateYourAccount'] = 'Molimo aktivirajte svoj račun';
		$strings['ReportSubject'] = 'Vas izvještaj (%s)';
		$strings['ReservationStartingSoonSubject'] = 'Rezervacija za %s uskoro počinje';
		$strings['ReservationEndingSoonSubject'] = 'Rezervacija za %s uskoro ističe';
		$strings['UserAdded'] = 'Dodan je novi korisnik';
		// End Email Subjects

		$this->Strings = $strings;

		return $this->Strings;
	}

	/**
	 * @return array
	 */
	protected function _LoadDays()
	{
		$days = parent::_LoadDays();

		/***
		DAY NAMES
		All of these arrays MUST start with Sunday as the first element
		and go through the seven day week, ending on Saturday
		 ***/
		// The full day name
		$days['full'] = array('nedjelja', 'ponedjeljak', 'utorak', 'srijeda', 'četvrtak', 'petak', 'subota');
		// The three letter abbreviation
		$days['abbr'] = array('ned', 'Pon', 'Uto', 'Sri', 'Čet', 'Pet', 'Sub');
		// The two letter abbreviation
		$days['two'] = array('Ne', 'Po', 'Ut', 'Sr', 'Če', 'Pe', 'Su');
		// The one letter abbreviation
		$days['letter'] = array('N', 'P', 'U', 'S', 'Č', 'P', 'S');

		$this->Days = $days;

		return $this->Days;
	}

	/**
	 * @return array
	 */
	protected function _LoadMonths()
	{
		$months = parent::_LoadMonths();

		/***
		MONTH NAMES
		All of these arrays MUST start with January as the first element
		and go through the twelve months of the year, ending on December
		 ***/
		// The full month name
		$months['full'] = array('Siječanj', 'Veljaća', 'Ožujak', 'Travanj', 'Svibanj', 'Lipanj', 'Srpanj', 'Kolovoz', 'Rujan', 'Listopad', 'Studeni', 'Prosinac');
		// The three letter month name
		$months['abbr'] = array('Sij', 'Velj', 'Ožu', 'Tra', 'Svi', 'Lip', 'Srp', 'Kol', 'Ruj', 'Lis', 'Stu', 'Pro');

		$this->Months = $months;

		return $this->Months;
	}

	/**
	 * @return array
	 */
	protected function _LoadLetters()
	{
		$this->Letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

		return $this->Letters;
	}

	protected function _GetHtmlLangCode()
	{
		return 'hr';
	}
}