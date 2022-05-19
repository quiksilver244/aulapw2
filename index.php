<?php
    $con = new mysqli('localhost', 'root','', 'pw1');

    if ( isset( $_GET['btnCadastrar'])){
        $Nome = $_GET ['txtNome'];
        $Email = $_GET ['txtEmail'];
        $Tel = $_GET ['txtTel'];
        $UF = $_GET [ 'txtUF'];
        $Cidade = $_GET ['txtCidade'];
        $Endereco = $_GET ['txtEndereco'];
        $Cadastrar = $_GET ['btnCadastrar'];

        $cmdSql = "INSERIR VALORES DE DADOS "('$Nome','$Email','$Tel', '$UF', '$Cidade', '$Edereco', '$Cadastrar');

        $con ->  ( $cmdSql );
    }

    $resultado = $con -> query ( 'Selecionar * dos dados' );    
    $dados = false ;
    if ( $resultado -> num_rows > 0 ){
        $dados = $resultado -> fetch_all ();       
    }

    
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome 5 Icons -->
    <script src="https://kit.fontawesome.com/75c15e52c5.js" crossorigin="anonymous"></script>

    <title>Cadastro de clientes</title>
</head>

<body>
    <h1 style="text-align:center">Atividade interdisciplinar PW-2 com BD-2</h1>
    <ul>
        
        <li><h2>Tarefas a serem executadas. </h2></li>
        <ol>
            <li>Crie uma base de dados no MySql com o nome de “atividade_pw_bd”;</li>
            <li>Restaure o backup “atividade_pw_bd.sql” para a base de dados que você criou;</li>
            <li>Na base de dados há uma tabela chamada “cliente”, utilize-a para cadastrar os dados envidados do formulário php para o banco mysql;</li>
            <li>Aproveitando que a interface já está pronta, sua função é apenas conectar o PHP ao MySql e criar as estruturas necessárias para cadastrar e consultar os dados;</li>
            <li>Exiba na tabela que se encontra abaixo do formulário cada um dos clientes cadastrados;</li>
            <li>Os botões (Editar e Deletar) do exemplo, são apenas estéticos; não se preocupe com eles;</li>
            <li>A &lt;tr&gt; (linha) é apenas um exemplo, apague-a e carregue os dados apenas a partir do banco.</li>    
                
        </ol>
    </ul>
    <hr>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Clientes</a>
            <div class="d-flex">
                <input id="txtConsulta" class="form-control me-2" type="search" placeholder="Consultar"
                    aria-label="Search">
                <button id="btnIr" class="btn btn-outline-success" type="submit">Ir</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <form method="get" class="row g-3">

            <div class="col-md-4">
                <label for="inputNome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="inputNome" name="txtNome">
            </div>

            <div class="col-md-4">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="txtEmail">
            </div>

            <div class="col-md-4">
                <label for="inputTel" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="inputTel" name="txtTel">
            </div>

            <div class="col-md-2">
                <label for="inputUF" class="form-label">Estado</label>
                <select id="inputUF" name="txtUF" class="form-select">
                    <option selected>Escolha...</option>
                    <option value="AC">Acre</option>	
                    <option value="AL">Alagoas</option>	
                    <option value="AP">Amapá</option>	
                    <option value="AM">Amazonas</option>	
                    <option value="BA">Bahia</option>	
                    <option value="CE">Ceará</option>	
                    <option value="ES">Espírito Santo</option>	
                    <option value="GO">Goiás</option>	
                    <option value="MA">Maranhão</option>	
                    <option value="MT">Mato Grosso</option>	
                    <option value="MS">Mato Grosso do Sul</option>	
                    <option value="MG">Minas Gerais</option>	
                    <option value="PA">Pará</option>	
                    <option value="PB">Paraíba</option>	
                    <option value="PR">Paraná</option>	
                    <option value="PE">Pernambuco</option>	
                    <option value="PI">Piauí</option>	
                    <option value="RJ">Rio de Janeiro</option>	
                    <option value="RN">Rio Grande do Norte</option>	
                    <option value="RS">Rio Grande do Sul</option>	
                    <option value="RO">Rondônia</option>	
                    <option value="RR">Roraima</option>	
                    <option value="SC">Santa Catarina</option>	
                    <option value="SP">São Paulo</option>	
                    <option value="SE">Sergipe</option>	
                    <option value="TO">Tocantins</option>	
                    <option value="DF">Distrito Federal</option>	
                </select>
            </div>
            
            <div class="col-md-4">
                <label for="inputCidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="inputCidade" name="txtCidade">
            </div>
            <div class="col-md-6">
                <label for="inputEndereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="inputEndereco" name="txtEndereco" placeholder="Rua, Avenida, ....">
            </div>            
            <div class="col-12">
                <button id="btnCadastrar" type="submit" class="btn btn-primary" name="btnCadastrar">Cadastrar</button>
            </div>
        </form>

        <hr>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">UF</th>
                <th scope="col">Cidade</th>
                <th scope="col">Endereço</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <?php
                if ( $dados ){
                    $total = 0 ;
                    foreach ( $dados  as  $linhas ) {
                        echo  '<tr>
                                <td>' . $linhas [ 0 ]. '</td>
                                <td>' . $linhas [ 1 ]. '</td>
                                <td>' . $linhas [ 2 ]. '</td>
                                <td>' . $linhas [ 3 ]. '</td>
                                <td>' . $linhas [ 4 ]. '</td>
                                <td>' . $linhas [ 5 ]. '</td>
                                <td>' . $linhas [ 6 ]. '</td>
                            </tr>' ;
                            $total += $linhas [ 6 ];
                    }
                    echo '<tr>
                            <td colspan="6"><p class="textRight">Total</p></td>
                            <td>R$' . $total . '</td>
                        </tr>' ;
                }
            ?>
            <tbody>
            <!-- Está tr (linha) é apenas um exemplo, apague-a e carregue os dados apenas a partir do banco.  -->
              <tr>
                <th scope="row">Eliton Camargo</th>
                <td>elitoncamargo@gmail.com</td>
                <td>(00)00000-0000</td>
                <td>SP</td>
                <td>Tietê</td>
                <td>Rua Que Você quiser, 70</td>
                <td><i class='far fa-edit' style='font-size:20px;color:rgb(17, 0, 255)'></i></td>
                <td><i class='far fa-trash-alt' style='font-size:20px;color:red'></i></td>
              </tr>
             
            </tbody>
          </table>

    </div>


</body>

</html>

