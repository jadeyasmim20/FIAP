<!-- <h1>ADICIONAR USUÁRIO</h1>
<form method="POST" action="adicionar_action.php">
    <label>
        Nome:<br/>
        <input type="text" name="name" required />
    </label><br/><br/>

    <label>
        Data de Nascimento:<br/>
        <input type="date" name="data_nascimento" required/>
    </label><br/><br/>

    <label>
        CPF:<br/>
        <input type="text" name="cpf" required />
    </label><br/><br/>

    <label>
        E-mail:<br/>
        <input type="email" name="email" />
    </label><br/><br/>

    <input type="submit" value="Adicionar" />
</form> -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
</head>
<body>
    <h1>ADICIONAR USUÁRIO</h1>
    <form method="POST" action="adicionar_action.php">
        <label for="name">
            Nome:<br/>
            <input type="text" id="name" name="name" required />
        </label><br/><br/>

        <label for="data_nascimento">
            Data de Nascimento:<br/>
            <input type="date" id="data_nascimento" name="data_nascimento" required />
        </label><br/><br/>

        <label for="cpf">
            CPF:<br/>
            <input type="text" id="cpf" name="cpf" required />
        </label><br/><br/>

        <label for="email">
            E-mail:<br/>
            <input type="email" id="email" name="email" />
        </label><br/><br/>

        <input type="submit" value="Adicionar" />
    </form>
</body>
</html>
