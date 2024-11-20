<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<main>
    <div class="container">
        <h2 class="header-title">Lista de Joias Disponíveis</h2>
        <p class="header-subtitle">Confira todas as joias disponíveis</p>

        <div class="button-container">
            <a href="/AdicionarJoia" class="btn-add">+ Adicionar Joia</a>
        </div>

        <!-- Tabela de listagem -->
        <div class="table-container">
            <table class="jewelry-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Material</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listagem_joias as $joia)
                        <tr>
                            <td>{{ $joia->nome }}</td>
                            <td>{{ $joia->material }}</td>
                            <td>{{ $joia->descricao }}</td>
                            <td>R$ {{ number_format($joia->preco, 2, ',', '.') }}</td>
                            <td>

                                <button class="btn-edit" onclick="">Editar</button>
                                <button class="btn-delete" onclick="">Excluir</button> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination-container">
            <nav>
                <ul class="pagination">
                    {{ $listagem_joias->links() }}
                </ul>
            </nav>
        </div>
    </div>
</main>

<script>
</script>
