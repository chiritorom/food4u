$("#nc-login form").on("submit", function(e) {
	e.preventDefault();
	var me = $(this);
	var form_login = me.serialize();

	$.ajax({
		url: me.attr("action"),
		method: me.attr("method"),
		data: form_login,
		success: function(resp) {
			if(resp == "true") {
				window.location.href = "admin/dashboard";
			} else {
				alert("Usuario y/o contraseña incorrecta.");
			}
		}
	});
	
});