$(document).ready(function() {
	$('.arrDelete').change(function (e) {
		var n = 0;
		$.each($('.arrDelete'), function(index, value) {
			if ($(this).prop('checked') == true) {
				n += 1;
			}
		});
		if (n > 0) {
			$('#del').prop('disabled', false)
		}
        else {
			$('#del').prop('disabled', true);
        }
	});
    $('#arrDeleteAll').change(function (e) {
        if ($('#arrDeleteAll').prop('checked') == true) {
            $('.arrDelete').prop('checked', true);
            $('#del').prop('disabled', false);
        }
        else {
            $('.arrDelete').prop('checked', false);
            $('#del').prop('disabled', true);
        }
    });
});
