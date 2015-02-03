$ (function () {
	$ ('#login').submit (function (e) {
		e.preventDefault ();
		$.ajax ({
			url : '/index.php/testUpload',
			type : 'post',
			//data : $ (this).serialize (),
			success : function (data) {
				$ ('#echo').html (data);
			}	
		});
		return false;
	});
});