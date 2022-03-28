## INSTALAÇÃO

A aplicação deve ser executada em um servidor php 5.6 ou superior a partir do diretório public/index.php<br><br>

Banco de dados deve ser criado um banco com o nome "busca-cep" com a collaction "utf8mb4_general_ci" com as seguintes configurações:<br>
    <ul>
        <li>DB_HOST=127.0.0.1</li>
        <li>DB_PORT=3306</li>
        <li>DB_DATABASE=busca-cep</li>
        <li>DB_USERNAME=root</li>
        <li>DB_PASSWORD=</li>
    </ul><br>
Após feito isso, deve-se executar o seguinte comando:<br>
<ul>
        <li>PHP ARTISAN MIGRATE</li>
    </ul>
