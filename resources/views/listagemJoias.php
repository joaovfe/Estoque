<header>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</header>

<div class="container">
    <h2>Listagem de Joias</h2>

    <!-- Botão para adicionar uma nova joia -->
    <a href="#" class="btn btn-primary mb-3">Adicionar Joia</a>

    <!-- Container com borda para a listagem -->
    <div class="jewelry-list-container">
        <div class="jewelry-item">
            <span class="jewelry-name">Joia de Ouro</span>
            <div class="jewelry-actions">
                <a href="#" class="btn btn-info btn-sm">Ver</a>
                <a href="#" class="btn btn-warning btn-sm">Editar</a>
                <a href="#" class="btn btn-danger btn-sm">Excluir</a>
            </div>
        </div>
        <div class="jewelry-item">
            <span class="jewelry-name">Anel de Diamante</span>
            <div class="jewelry-actions">
                <a href="#" class="btn btn-info btn-sm">Ver</a>
                <a href="#" class="btn btn-warning btn-sm">Editar</a>
                <a href="#" class="btn btn-danger btn-sm">Excluir</a>
            </div>
        </div>
        <!-- Adicione mais itens conforme necessário -->
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
    </div>
</div>
