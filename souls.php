<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Ficha - D&D</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <div class="navbar">
            <img src="sun.png" alt="Sol" class="icon">
            <h1>D&D</h1>
            <img src="dice.png" alt="Dado" class="icon">
            <h1>Creation</h1>
            <img src="moon.png" alt="Lua" class="icon">
        </div>
    </header>
    <p></p>
    <br>


    <div class="container">
        <h1 class="form-header">Crie sua cadastro-ficha</h1>

         <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim(string: $_POST['nome']);
            $email = trim(string: $_POST['email']);
            $data_nascimento = trim( string: $_POST['data-nascimento']);
            $genero = trim(string: $_POST['genero']);
            $biografia = trim(string: $_POST['biografia']);
            
            $erro = '';

            
            if (empty($nome) || empty($email) || empty($data_nascimento) || empty($genero)) {
                $erro = "Todos os campos obrigatórios devem ser preenchidos.";
            } elseif (!filter_var(value: $email, filter: FILTER_VALIDATE_EMAIL)) {
   
                $erro = "Por favor, insira um e-mail válido.";
            } elseif (str_word_count(string: $nome) < 2) {
         
                $erro = "O nome deve conter pelo menos dois nomes!!";
            }

            if ($erro) {
                echo "<div class='alert error'>$erro</div>";
            } else {
                echo "<div class='alert success'>Cadastro concluído com sucesso!</div>";
            }
        }
        ?>

        <form action="<?php echo htmlspecialchars(string: $_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="nome">Nome completo:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="data-nascimento">Data de nascimento:</label>
                <input type="date" id="data-nascimento" name="data-nascimento" required>
            </div>

            <div class="form-group">
                <label for="genero">Gênero:</label>
                <select id="genero" name="genero" required>
                    <option value="">Selecione</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outros">Outros</option>
                </select>
            </div>

            <div class="form-group">
                <label for="biografia">Biografia:</label>
                <textarea id="biografia" name="biografia"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="submit-btn">Cadastrar</button>
            </div>
        </form>
    </div>

</body>
</html>

<style>


body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to bottom, #18122B, #2E195D);
    color: #243ea3;
    justify-content: center; 
    align-items: center; 
    height: 100vh;
    margin: 0;
}

h1 {
    color: #f0e6ff;
    margin: 0 10px;
    font-family: 'Cursive', sans-serif;
}

.container {
    background-color: #E8DFF5;
    padding: 30px;
    border-radius: 15px;
    width: 100%;
    max-width: 400px; 
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
    text-align: center;
    margin: 0 auto; 
}

.form-header {
    background-color: #C1B6E5;
    color: #4A3B85;
    font-size: 1.5rem;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    margin-bottom: 20px;
    cursor: default;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 1rem;
    color: #4A3B85;
}

input[type="text"], input[type="email"], input[type="date"], select, textarea {
    width: 95%;
    padding: 10px;
    border: 2px solid #C1B6E5;
    border-radius: 8px;
    background-color: #F5F1FA;
    font-size: 1rem;
    color: #333;
}

textarea {
    height: 80px;
}

.submit-btn {
    background-color: #7559B1;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    font-size: 1.2rem;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
}

.submit-btn:hover {
    background-color: #5E47A1;
}

/* Navbar */
header {
    background-color: #140a3d;
    padding: 20px;
    width: 100%;
    text-align: center;
    border-bottom: 3px solid #4A3B85;
}

.navbar {
    display: flex;
    justify-content: center;
    align-items: center;
}

.icon {
    width: 50px;
    margin: 0 10px;
}


</style>