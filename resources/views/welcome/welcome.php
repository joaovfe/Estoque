<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<main>
<div class="container">
    <h2 class="header-title">Lista de Joias Disponíveis</h2>
    <p class="header-subtitle">Confira todas as joias disponíveis</p>

    <!-- Botão para adicionar uma nova joia -->
    <div class="button-container">
        <a href="#" class="btn-add">+ Adicionar Joia</a>
    </div>

    <!-- Tabela de listagem -->
    <div class="table-container">
        <table class="jewelry-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Material</th>
                    <th>Tipo</th>   
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($listagem_joias as $joia): ?>
                    <tr>
                        <td><?= $joia['nome']; ?></td>
                        <td><?= $joia['material']; ?></td>
                        <td><?= $joia['descricao']; ?></td>
                        <td>R$ <?= number_format($joia['preco'], 2, ',', '.'); ?></td>
                        <td>
                            <!-- Botões de ação -->
                            <!-- <button class="btn-edit" onclick="editItem(<?= $joia['id_item']; ?>)">Editar</button>
                            <button class="btn-delete" onclick="deleteItem(<?= $joia['id_item']; ?>)">Excluir</button> -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <div class="pagination-container">
        <nav>
            <ul class="pagination">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
            </ul>
        </nav>
    </div>
</div>
</main>
<script>
    function redirectToDetails(jewelId) {
        window.location.href = `/detalhes/${jewelId}`;
    }
</script>