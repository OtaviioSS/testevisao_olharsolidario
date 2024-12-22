

<body style="min-height: 100vh;">
<div class="text-center my-5">
    <h1>Lista de Clientes</h1>
</div>

<div style="min-height: 100vh;" class="container">
    <div class="row mt-5">
        <div class="table-responsive">

            <section class="panel border p-3">
                <table id="myTable" name="myTable" class="table table-striped table-bordered display nowrap">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>WhatsApp</th>
                        <th>Data do Teste</th>
                        <th>Hora do Teste</th>
                        <th>Teste de Acuidade Direito</th>
                        <th>Teste de Astigmatismo Direito</th>
                        <th>Teste de Contraste Direito</th>
                        <th>Teste de Acuidade Esquerdo</th>
                        <th>Teste de Astigmatismo Esquerdo</th>
                        <th>Teste de Contraste Esquerdo</th>
                        <th>Resultado Geral</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $consulta = $this->connection->query("SELECT * FROM clientes ");
                    foreach ($consulta as $row) : ?>
                        <tr>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['idade']; ?></td>
                            <td><a target="_blank" href="<?php echo "https://wa.me/" . $row['whatsapp']; ?>"><?php echo $row['whatsapp']; ?></a></td>
                            <td><?php echo (new DateTime($row['data_teste']))->format('d/m/Y'); ?></td>
                            <td><?php echo (new DateTime($row['hora_teste']))->format('H:i'); ?></td>
                            <td><?php echo $row['teste_acuidade_direito']; ?></td>
                            <td><?php echo $row['teste_astigmatismo_direito']; ?></td>
                            <td><?php echo $row['teste_contraste_direito']; ?></td>
                            <td><?php echo $row['teste_acuidade_esquerdo']; ?></td>
                            <td><?php echo $row['teste_astigmatismo_esquerdo']; ?></td>
                            <td><?php echo $row['teste_contraste_esquerdo']; ?></td>
                            <td><?php echo $row['resultado_geral']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</div>
</body>

</html>
