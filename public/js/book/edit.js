$(function() {
	$('#publication').datepicker({
		format: 'yyyy-mm-dd',
		endDate: new Date()
	});

	$('.update').click(function() {
		var price = $('#price').val();

		if (price.length == 0) {
			alert('Price is requied');

			return false;
		}

		if (isNaN(price)) {
			alert('Price is required as numeric format');

			return false;
		}

		if (parseFloat(price) <= 0.00) {
			alert('Price must be greater than zero');

			return false;
		}

		$('#book-form').submit();
	});
});