<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Adicionar Joia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <h1>Adicionar Joia</h1>
        <form id="form-add-joia">
            <!-- Tipo de Material -->
            <div class="form-group">
                <label for="tipo_material">Tipo de Material:</label>
                <input type="text" id="tipo_material" name="tipo_material" class="form-control"
                    placeholder="Ex: Ouro, Prata" required>
            </div>

            <!-- Descrição -->
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" class="form-control" placeholder="Descrição do item"
                    required></textarea>
            </div>

            <!-- Nome da Joia -->
            <div class="form-group">
                <label for="nome_joia">Nome da Joia:</label>
                <input type="text" id="nome_joia" name="nome_joia" class="form-control" placeholder="Ex: Anel de Ouro"
                    required>
            </div>

            <!-- Preço -->
            <div class="form-group">
                <label for="preco">Preço (R$):</label>
                <input type="number" id="preco" name="preco" class="form-control" step="0.01" placeholder="Ex: 1500.00"
                    required>
            </div>

            <!-- Categoria -->
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select id="categoria" name="categoria" class="form-control" required>
                    <option value="">Selecione a categoria</option>
                    <?php foreach ($categorias as $categoria): ?>
                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nome }}</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="">Selecione o status</option>
                    <?php foreach ($status as $statu): ?>
                    <option value="{{ $statu->id_status }}">{{ $statu->status_nome }}</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Botões -->
            <div class="form-group">
                <button type="button" id="btn-salvar" class="btn btn-primary">Salvar</button>
                <!-- Botão Voltar -->
                <button type="button" id="btn-voltar" class="btn btn-secondary">Voltar</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('btn-salvar').addEventListener('click', function () {
            // Dados do formulário
            const tipoMaterial = document.getElementById('tipo_material').value;
            const descricao = document.getElementById('descricao').value;
            const nomeJoia = document.getElementById('nome_joia').value;
            const preco = document.getElementById('preco').value;
            const categoria = document.getElementById('categoria').value; // ID da categoria
            const status = document.getElementById('status').value; // ID do status

            if (!tipoMaterial || !descricao || !nomeJoia || !preco || !categoria || !status) {
                alert('Por favor, preencha todos os campos.');
                return;
            }

            // Envio via fetch
            fetch("/addJoia", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    material: tipoMaterial,
                    descricao: descricao,
                    nome: nomeJoia,
                    preco: preco,
                    id_categoria: categoria,
                    id_status: status, 
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);  
                        document.getElementById('form-add-joia').reset();
                    } else {
                        alert('Erro ao adicionar joia.');
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro ao salvar a joia.');
                });
        });

        // Função para voltar à página anterior
        document.getElementById('btn-voltar').addEventListener('click', function () {
            window.history.back();
        });
    </script>

    <style>
        .form-group {
            margin-bottom: 15px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6368;
        }
    </style>
</body>

</html>
