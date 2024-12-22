$(document).ready(function() {
    const date = new Date();
    const table = $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excelHtml5', title: 'Lista de Clientes', filename: 'Clientes' },
            { extend: 'csvHtml5', title: 'Lista de Clientes', filename: 'Clientes' },
            {
                extend: 'pdfHtml5',
                title: 'Lista de Clientes',
                filename: 'Clientes',
                orientation: 'landscape',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        responsive: true,
        scrollX: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
        },

    });

    // Inicializa o Select2 com um placeholder
    $('.select2').select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });

    // Ao clicar no botão "Editar", abra o modal e carregue os dados do usuário
    $(document).on('click', '.btn-edit', function() {
        const userId = $(this).data('id');

        // Fazer uma requisição AJAX para buscar os dados do usuário
        $.ajax({
            url: '', // Endereço da sua API para buscar o usuário
            type: 'GET',
            data: { id: userId },
            success: function(response) {
                // Supondo que você retorna os dados do usuário em JSON
                $('#userId').val(response.id);
                $('#userEmail').val(response.email);
                $('#userName').val(response.nome);

                // Abre o modal
                $('#exampleModal').modal('show');
            },
            error: function() {
                alert('Erro ao buscar dados do usuário.');
            }
        });
    });

    // Enviar o formulário de edição do usuário
    $('#editUserForm').on('submit', function(e) {
        e.preventDefault();

        // Dados do formulário
        const formData = {
            id: $('#userId').val(),
            email: $('#userEmail').val(),
            nome: $('#userName').val()
        };

        // Fazer requisição AJAX para salvar as edições
        $.ajax({
            url: 'updateUser.php', // Endereço da sua API para atualizar o usuário
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Usuário atualizado com sucesso!');
                    $('#exampleModal').modal('hide'); // Fecha o modal
                    table.ajax.reload(); // Recarrega a tabela
                } else {
                    alert('Erro ao atualizar usuário.');
                }
            },
            error: function() {
                alert('Erro ao conectar com o servidor.');
            }
        });
    });
});

$(document).ready(function() {
    const date = new Date();
    $('#myUsersTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {extend: 'excelHtml5'},

        ]

    });



})

