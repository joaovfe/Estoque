<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<main>
    <div class="container">
        <h2 class="header-title">Lista de Joias Disponíveis</h2>
        <p class="header-subtitle">Confira todas as joias disponíveis</p>

        <div class="button-container">
            <a href="/AdicionarJoia" class="btn-add">+ Adicionar Joia</a>
            <a href="/lancamentos" class="btn-lancamentos">Ver Lançamentos</a>
            </div>

        <!-- Tabela de listagem -->
        <div class="table-container">
            <table class="jewelry-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Material</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listagem_joias as $joia)
                        <tr>
                            <td>{{ $joia->nome }}</td>
                            <td>{{ $joia->material }}</td>
                            <td>{{ $joia->descricao }}</td>
                            <td>{{ $joia->status }}</td>
                            <td>R$ {{ number_format($joia->preco, 2, ',', '.') }}</td>
                            <td>
                            <a href="{{ route('detalheJoia', ['id' => $joia->id_item]) }}" class="btn-edit">Editar</a>
                            
                            <button class="btn-delete" onclick="deleteItem({{ $joia->id_item }})">Excluir</button>
                                <!-- Formulário de exclusão -->
                                <form id="delete-form-{{ $joia->id_item }}" action="/deleteJoia" method="POST"
                                    style="display:none;">
                                    @csrf
                                    <input type="hidden" name="id_item" value="{{ $joia->id_item }}">
                                </form>
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

function deleteItem(id) {
    var form = document.getElementById('delete-form-' + id);
    if (form) {
        if (confirm('Tem certeza que deseja excluir esta joia?')) {
            form.submit(); 
        }
    } else {
        alert('Formulário não encontrado!');
    }
}
</script>