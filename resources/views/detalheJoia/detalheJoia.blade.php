<head>
    <link rel="stylesheet" href="css/styles.css">
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
                <input type="text" id="preco" name="preco"
                    value="{{ old('preco', number_format($joia->preco, 2, ',', '.')) }}" required>
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
                <textarea id="descricao" name="descricao" rows="4"
                    required>{{ old('descricao', $joia->descricao) }}</textarea>
            </div>

            <div class="button-container">
                <button type="submit" class="btn-save">Salvar Alterações</button>
            </div>
        </form>

        <div class="button-container">
            <a href="/" class="btn-back">Voltar</a>
        </div>
    </div>
    <style>
        /* Reset básico de margens e padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da página */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        /* Container principal */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            box-sizing: border-box;
        }

        /* Títulos */
        .header-title {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .header-subtitle {
            font-size: 16px;
            font-weight: 400;
            color: #555;
            margin-bottom: 20px;
        }

        /* Estilo para os campos do formulário */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        /* Campos de entrada */
        input[type="text"],
        input[type="number"],
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

        /* Foco nos campos */
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        button,
        .btn-save,
        .btn-back {
            padding: 12px 25px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: center;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-save {
            background-color: #007bff;
            color: white;
            margin-bottom: 10px;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background-color: #5a6368;
        }

        button:focus,
        .btn-save:focus,
        .btn-back:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.6);
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .header-title {
                font-size: 24px;
            }

            .header-subtitle {
                font-size: 14px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .btn-save,
            .btn-back {
                width: 100%;
            }
        }
    </style>
</main>