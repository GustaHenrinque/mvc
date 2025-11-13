<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Lista de Produtos</title>
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
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
        }

        h1 {
            color: var(--primary);
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .subtitle {
            color: var(--gray);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .card-header {
            background: var(--primary);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-success {
            background: var(--success);
        }

        .btn-success:hover {
            background: #3ab0d9;
        }

        .btn-danger {
            background: var(--danger);
        }

        .btn-danger:hover {
            background: #e11570;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: var(--light-gray);
        }

        th {
            padding: 16px 12px;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 2px solid var(--light-gray);
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid var(--light-gray);
        }

        tr:hover {
            background: rgba(67, 97, 238, 0.05);
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            color: white;
            transition: var(--transition);
            text-decoration: none;
        }

        .edit-btn {
            background: var(--success);
        }

        .edit-btn:hover {
            background: #3ab0d9;
            transform: scale(1.1);
        }

        .delete-btn {
            background: var(--danger);
        }

        .delete-btn:hover {
            background: #e11570;
            transform: scale(1.1);
        }

        .price {
            font-weight: 600;
            color: var(--primary);
        }

        .category {
            display: inline-block;
            padding: 4px 12px;
            background: var(--light-gray);
            border-radius: 20px;
            font-size: 0.85rem;
            color: var(--gray);
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            th, td {
                padding: 10px 8px;
            }
            
            .actions {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Gerenciamento de Produtos</h1>
            <p class="subtitle">Gerencie seu inventário de produtos de forma simples e eficiente</p>
        </header>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Lista de Produtos</h2>
                <a href='index.php?acao=adicionar' class="btn">
                    <i class="fas fa-plus"></i> Adicionar Produto
                </a>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?= $linha['id'] ?></td>
                            <td><?= $linha['nome'] ?></td>
                            <td class="price">R$ <?= number_format($linha['preco'], 2, ',', '.') ?></td>
                            <td><span class="category"><?= $linha['categoria'] ?></span></td>
                            <td>
                                <div class="actions">
                                    <a href='index.php?acao=editar&id=<?= $linha['id'] ?>' class="action-btn edit-btn" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href='index.php?acao=excluir&id=<?= $linha['id'] ?>' class="action-btn delete-btn" title="Excluir" onclick='return confirm("Excluir produto?")'>
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Adicionando interatividade para destacar linhas da tabela
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>