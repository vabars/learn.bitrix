$(document).ready(function() {
	$('.block').on('click', '.extremum-click', function() {
		$(this).siblings('.extremum-slide').slideToggle(0);
	});
});