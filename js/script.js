function verComentarios(idJogador) {
    const comentariosDiv = document.getElementById('comentarios-' + idJogador);

    if (comentariosDiv.style.display === 'none' || comentariosDiv.style.display === '') {
        comentariosDiv.style.display = 'block';


        fetch(`php/readComentario.php?id_jogador=${idJogador}`)
            .then(response => response.json())
            .then(comentarios => {
                let comentariosHtml = '';
                comentarios.forEach(comentario => {
                    comentariosHtml += `
                        <div class="comentario">
                            <p><strong>${comentario.data_comentario}</strong>: ${comentario.texto_comentario}</p>
                        </div>
                    `;
                });
                comentariosDiv.innerHTML = comentariosHtml;
            })
            .catch(error => console.error('Erro ao carregar os comentários:', error));
    } else {
        comentariosDiv.style.display = 'none';
    }
}

function abrirModalComentario(idJogador) {
    document.getElementById('id_jogador').value = idJogador;
}