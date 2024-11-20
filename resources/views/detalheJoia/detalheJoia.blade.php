<head>
</head>
<main>
    <div class="container">
        <h2 class="header-title">Editar Joia</h2>
        <p class="header-subtitle">Edite os detalhes da joia</p>

        <form action="{{ route('detalheJoia', $joia->id_item) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome da Joia</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $joia->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" id="preco" name="preco" value="{{ old('preco', number_format($joia->preco, 2, ',', '.')) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label><br>
                <input type="radio" id="ativo" name="status" value="1" {{ $joia->id_status == 1 ? 'checked' : '' }}>
                <label for="ativo">Ativo</label>

                <input type="radio" id="desativado" name="status" value="2" {{ $joia->id_status == 2 ? 'checked' : '' }}>
                <label for="desativado">Desativado</label>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" rows="4" required>{{ old('descricao', $joia->descricao) }}</textarea>
            </div>

            <div class="button-container">
                <button type="submit" class="btn-save">Salvar Alterações</button>
            </div>
        </form>

        <div class="button-container">
            <a href="/" class="btn-back">Voltar</a>
        </div>
    </div>
</main>
