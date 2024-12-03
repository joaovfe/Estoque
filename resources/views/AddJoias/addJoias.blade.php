<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Adicionar Joia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/styles.css">
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
        .container {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin: 50px auto;
            padding: 30px;
            box-sizing: border-box;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .btn {
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6368;
        }

        .btn:focus {
            outline: none;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        input[type="number"],
        select {
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</body>

</html>