
function may(obj,id)
	{
		obj = obj.toUpperCase();
			document.getElementById(id).value=obj;
	};


$('#buscar').keyup(function(event)
	{
		var contenido = new RegExp($(this).val(),'i');
		$('tr').hide();
		$('tr').filter(function()
		{
			return contenido.test($(this).text());
		}).show();
	});

//funcion suma
$("#nick").change(function()
				{
					$.post('ajax_validacion_nick.php',
					{
						nick:$('#nick').val(),
						beforeSend: function()
										{
											$('.validacion').html('Espere un momento por favor..')
										}
				},
				function(respuesta)
				{
					$('.validacion').html(respuesta);
					});
					
				});

$("#Nombre").change(function()
				{
					$.post('ajax_validacion_producto.php',
					{
						Nombre:$('#Nombre').val(),
						beforeSend: function()
										{
											$('.validacion').html('Espere un momento por favor..')
										}
				},
				function(respuesta)
				{
					$('.validacion').html(respuesta);
					});
					
				});
$("#cliente").change(function()
				{
					$.post('ajax_validacion_cliente.php',
					{
						cliente:$('#cliente').val(),
						beforeSend: function()
										{
											$('.validacion').html('Espere un momento por favor..')
										}
				},
				function(respuesta)
				{
					$('.validacion').html(respuesta);
					});
					
				});

$("#venta").change(function()
				{
					$.post('ajax_validacion_venta.php',
					{
						venta:$('#venta').val(),
						beforeSend: function()
										{
											$('.validacion').html('Espere un momento por favor..')
										}
				},
				function(respuesta)
				{
					$('.validacion').html(respuesta);
					});
					
				});
$("#detalleventa").change(function()
				{
					$.post('ajax_validacion_detalleventa.php',
					{
						detalleventa:$('#detalleventa').val(),
						beforeSend: function()
										{
											$('.validacion').html('Espere un momento por favor..')
										}
				},
				function(respuesta)
				{
					$('.validacion').html(respuesta);
					});
					
				});

