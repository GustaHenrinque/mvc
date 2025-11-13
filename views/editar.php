<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Editar Produto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #7209b7;
            --success: #4cc9f0;
            --danger: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            color: var(--primary);
            font-size: 2.2rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .subtitle {
            color: var(--gray);
            font-size: 1rem;
        }

        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin-bottom: 25px;
        }

        .card-header {
            background: var(--primary);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--light-gray);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            width: 100%;
            font-size: 1rem;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-secondary {
            background: var(--gray);
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .btn-success {
            background: var(--success);
        }

        .btn-success:hover {
            background: #3ab0d9;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
        }

        .back-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .input-icon .form-control {
            padding-left: 45px;
        }

        .price-input {
            position: relative;
        }

        .price-input::before {
            content: "R$";
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-weight: 600;
        }

        .price-input .form-control {
            padding-left: 45px;
        }

        @media (max-width: 576px) {
            .container {
                padding: 0 15px;
            }
            
            .card-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Editar Produto</h1>
        </header>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Informações do Produto</h2>
            </div>
            <div class="card-body">
                <form method='POST'>
                    <div class="form-group">
                        <label for="nome">Nome do Produto</label>
                        <div class="input-icon">
                            <i class="fas fa-box"></i>
                            <input type='text' id="nome" name='nome' class="form-control" value='<?= $dados['nome'] ?>' required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <div class="price-input">
                            <input type='number' id="preco" step='0.01' name='preco' class="form-control" value='<?= $dados['preco'] ?>' required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <div class="input-icon">
                            <i class="fas fa-tag"></i>
                            <input type='text' id="categoria" name='categoria' class="form-control" value='<?= $dados['categoria'] ?>' required>
                        </div>
                    </div>
                    
                    <button type='submit' class="btn btn-success">
                        <i class="fas fa-save"></i> Atualizar Produto
                    </button>
                </form>
            </div>
        </div>
        
        <div class="back-link">
            <a href='index.php'>
                <i class="fas fa-arrow-left"></i> Voltar para a lista de produtos
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const precoInput = document.getElementById('preco');
            
            precoInput.addEventListener('blur', function() {
                let value = parseFloat(this.value);
                if (!isNaN(value)) {
                    this.value = value.toFixed(2);
                }
            });
            
            document.getElementById('nome').focus();
        });
    </script>
</body>
</html>