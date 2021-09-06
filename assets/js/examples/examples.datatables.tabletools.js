
/*Main users*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#main-users');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#main-users_wrapper');

		$table.DataTable().buttons().container().prependTo( '#main-users_wrapper .dt-buttons' );

		$('#main-users_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);




/*Failed Users*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#failed-users');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#failed-users_wrapper');

		$table.DataTable().buttons().container().prependTo( '#failed-users_wrapper .dt-buttons' );

		$('#failed-users_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);



/*Trial Users*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#trial-users');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#trial-users_wrapper');

		$table.DataTable().buttons().container().prependTo( '#trial-users_wrapper .dt-buttons' );

		$('#trial-users_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);



/*feeling-formal*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#feeling-formal');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#feeling-formal_wrapper');

		$table.DataTable().buttons().container().prependTo( '#feeling-formal_wrapper .dt-buttons' );

		$('#feeling-formal_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);




/*FeedBack*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#feedback');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#feedback_wrapper');

		$table.DataTable().buttons().container().prependTo( '#feedback_wrapper .dt-buttons' );

		$('#feedback_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);






/*Main Download*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#main-download');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#main-download_wrapper');

		$table.DataTable().buttons().container().prependTo( '#main-download_wrapper .dt-buttons' );

		$('#main-download_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);






/*main-upload-details*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#main-upload-details');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#main-upload-details_wrapper');

		$table.DataTable().buttons().container().prependTo( '#main-upload-details_wrapper .dt-buttons' );

		$('#main-upload-details_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);






/*closed-tabs*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#closed-tabs');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#closed-tabs_wrapper');

		$table.DataTable().buttons().container().prependTo( '#closed-tabs_wrapper .dt-buttons' );

		$('#closed-tabs_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);







/*Notes*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#notes');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#notes_wrapper');

		$table.DataTable().buttons().container().prependTo( '#notes_wrapper .dt-buttons' );

		$('#notes_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);





/*Videos*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#videos');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#videos_wrapper');

		$table.DataTable().buttons().container().prependTo( '#videos_wrapper .dt-buttons' );

		$('#videos_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*Suggested Answers Request*/
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#suggested');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#suggested_wrapper');

		$table.DataTable().buttons().container().prependTo( '#suggested_wrapper .dt-buttons' );

		$('#suggested_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*Trailupload */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#Trailupload');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#Trailupload_wrapper');

		$table.DataTable().buttons().container().prependTo( '#Trailupload_wrapper .dt-buttons' );

		$('#Trailupload_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*Trail Download */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#trail-download');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#trail-download_wrapper');

		$table.DataTable().buttons().container().prependTo( '#trail-download_wrapper .dt-buttons' );

		$('#trail-download_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*Trail Dashboard */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#trail-dashboard');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#trail-dashboard_wrapper');

		$table.DataTable().buttons().container().prependTo( '#trail-dashboard_wrapper .dt-buttons' );

		$('#trail-dashboard_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*resultspanel */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#resultspanel');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#resultspanel_wrapper');

		$table.DataTable().buttons().container().prependTo( '#resultspanel_wrapper .dt-buttons' );

		$('#resultspanel_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);


/*View requests */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#viewrequests');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#viewrequests_wrapper');

		$table.DataTable().buttons().container().prependTo( '#viewrequests_wrapper .dt-buttons' );

		$('#viewrequests_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);



/*promocodes */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#promocodes');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#promocodes_wrapper');

		$table.DataTable().buttons().container().prependTo( '#promocodes_wrapper .dt-buttons' );

		$('#promocodes_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*passguarantee */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#passguarantee');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#passguarantee_wrapper');

		$table.DataTable().buttons().container().prependTo( '#passguarantee_wrapper .dt-buttons' );

		$('#passguarantee_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*managepromocodes */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#managepromocodes');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#managepromocodes_wrapper');

		$table.DataTable().buttons().container().prependTo( '#managepromocodes_wrapper .dt-buttons' );

		$('#managepromocodes_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);


/*addplans */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#addplans');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#addplans_wrapper');

		$table.DataTable().buttons().container().prependTo( '#addplans_wrapper .dt-buttons' );

		$('#addplans_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*cptplans */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#cptplans');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#cptplans_wrapper');

		$table.DataTable().buttons().container().prependTo( '#cptplans_wrapper .dt-buttons' );

		$('#cptplans_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*ipccplans */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#ipccplans');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#ipccplans_wrapper');

		$table.DataTable().buttons().container().prependTo( '#ipccplans_wrapper .dt-buttons' );

		$('#ipccplans_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);


/*finalplans */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#finalplans');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#finalplans_wrapper');

		$table.DataTable().buttons().container().prependTo( '#finalplans_wrapper .dt-buttons' );

		$('#finalplans_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);




/*ipccnew */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#ipccnew');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#ipccnew_wrapper');

		$table.DataTable().buttons().container().prependTo( '#ipccnew_wrapper .dt-buttons' );

		$('#ipccnew_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);


/*addbookshere */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#addbookshere');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#addbookshere_wrapper');

		$table.DataTable().buttons().container().prependTo( '#addbookshere_wrapper .dt-buttons' );

		$('#addbookshere_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);




/*bookinghistory */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#bookinghistory');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#bookinghistory_wrapper');

		$table.DataTable().buttons().container().prependTo( '#bookinghistory_wrapper .dt-buttons' );

		$('#bookinghistorye_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*managevideos */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#managevideos');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#managevideos_wrapper');

		$table.DataTable().buttons().container().prependTo( '#managevideos_wrapper .dt-buttons' );

		$('#managevideos_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);



/*e-brouchers */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#e-brouchers');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#e-brouchers_wrapper');

		$table.DataTable().buttons().container().prependTo( '#e-brouchers_wrapper .dt-buttons' );

		$('#e-brouchers_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);

/*addschedulefiles */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#addschedulefiles');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#addschedulefiles_wrapper');

		$table.DataTable().buttons().container().prependTo( '#addschedulefiles_wrapper .dt-buttons' );

		$('#addschedulefiles_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);




/*mainpopup */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#mainpopup');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#mainpopup_wrapper');

		$table.DataTable().buttons().container().prependTo( '#mainpopup_wrapper .dt-buttons' );

		$('#mainpopup_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);




/*mainpopup */
(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('.user_datatable');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [ 'print', 'excel', 'pdf' ]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('.user_datatable_wrapper');

		$table.DataTable().buttons().container().prependTo( '.user_datatable_wrapper .dt-buttons' );

		$('.user_datatable_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);





































