 function abrirModal(
            idTreino,
            idTreinoExercicio,
            nomeTreino,
            dataInicio,
            horario,
            series,
            repeticoes,
            carga,
            idCliente,
            idFuncionario,
            idExercicio
        ) {

            document.getElementById('modalEditar').style.display = 'block';

            document.getElementById('id_treino').value = idTreino;
            document.getElementById('id_treino_exercicio_modal').value = idTreinoExercicio;

            document.getElementById('nome_treino_modal').value = nomeTreino;

            document.getElementById('data_modal').value = dataInicio;

            document.getElementById('horario_modal').value = horario;

            document.getElementById('series_modal').value = series;

            document.getElementById('repeticoes_modal').value = repeticoes;

            document.getElementById('carga_modal').value = carga;

            document.getElementById('id_cliente_modal').value = idCliente;

            document.getElementById('id_funcionario_modal').value = idFuncionario;

            document.getElementById('id_exercicio_modal').value = idExercicio;
        }

        function fecharModal() {
            document.getElementById('modalEditar').style.display = 'none';
        }

        window.onclick = function(event) {

            let modal = document.getElementById('modalEditar');

            if (event.target === modal) {
                fecharModal();
            }
        }