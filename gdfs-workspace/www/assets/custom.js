function exibirResultado(dados) {
	console.log(dados);
	const { endereco_partida, endereco_destino, hora, total } = dados;
	const cidade = $('#cidade_id option:selected').text();
	const categoria = $('#categoria_id option:selected').text();
	const strResultado = `Em ${cidade}, ${categoria} , de ${endereco_partida} para ${endereco_destino}, às ${hora}: R$ ${total}. `;

	$('#historico').append(
		`<p class="text-monospace text-success">${strResultado}</p>`
	);
}

$(document).ready(() => {
	$('form').on('submit', e => {
		e.preventDefault();

		const data = {
			categoria_id: $('#categoria_id option:selected').val(),
			cidade_id: $('#cidade_id option:selected').val(),
			endereco_partida: $('#endereco_partida').val(),
			endereco_destino: $('#endereco_destino').val(),
		};

		$.ajax({
			url: '/api/calculo.php',
			type: 'POST',
			dataType: 'json',
			data: data,
			success: function (data) {
				exibirResultado(data);
			},
			error: function (xhr, exception) {
				console.log(exception);
			},
		});
	});
});


