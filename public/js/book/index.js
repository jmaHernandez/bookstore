$(function() {
	$('.search').click(function() {
		var price = $('#price').val();

		if (price.length) {
			if (isNaN(price)) {
				alert('Price is required as numeric format');

				return false;
			}

			if (parseFloat(price) <= 0.00) {
				alert('Price must be greater than zero');

				return false;
			}
		}

		$('#search-form').submit();
	});
});