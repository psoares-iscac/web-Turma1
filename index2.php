<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
</head>
<body style="height:1000px;">
    
    <?php
        require('includes/menu.php');
    ?>

    <!-- CAROUSEL -->
    <div class="container w-50 mb-3">

        <div id="apresentacao" class="carousel slide" data-bs-ride="carousel">
            
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#apresentacao" data-bs-slide-to="0"  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#apresentacao" data-bs-slide-to="1" class="active" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#apresentacao" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>


            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img src="imgs/imagem1.jpg" alt="" class="d-block w-100">
                </div>
                <div class="carousel-item active">
                    <img src="imgs/imagem2.jpg" alt="" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="imgs/imagem3.jpg" alt="" class="d-block w-100">
                </div>
            </div>
        </div>
    </div>
    

    <div class="container-fluid bg-body-tertiary">
        <div class="row">
            <!-- formulário -->
            <div class="col-12 col-md-5 col-lg-4">    
                <div class="p-3"  >
                    <div class="display-6 mb-2">Contacte-nos</div>
                    <form id="f-contactos" action="lixo.html" method="GET">

                        <div class="form-floating mb-2">
                            <input id="f-email" name="fEmail" type="email" 
                            class="form-control" placeholder="introduza o seu email" 
                            required>
                            <label for="f-email">Email</label>
                        </div>
                        <div class="mb-2">
                            <textarea id="f-msg" name="fMsg" rows="3" 
                            class="form-control" placeholder="introduza a sua mensagem"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-outline-dark " type="submit">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col d-md-none d-lg-block">&nbsp;</div>
            <!-- tabela -->
            <div class="col-12 col-md-7 col-lg-4">
                <div class="display-6 mb-2">Top artistas</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Likes</th>
                            <th>Artista</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="top-artista" data-artista="Sven Woods">
                            <td>#234.000</td>
                            <td>Sven Woods</td>
                            <td><img src="imgs/avatares/avatar2.png" alt="" 
                                style="width:2rem;"></td>
                        </tr>
                        <tr class="top-artista" data-artista="Juliette">
                            <td>#134.000</td>
                            <td>Juliette Carson</td>
                            <td><img src="imgs/avatares/avatar1.png" alt="" 
                                style="width:2rem;"></td>
                        </tr>
                        <tr class="top-artista" data-artista="Justin">
                            <td>#98.000</td>
                            <td>Justin Nobody</td>
                            <td><img src="imgs/avatares/avatar3.png" alt="" 
                                style="width:2rem;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        
    <!-- TABELA COM DADOS DINÂMICOS 1 -->
    <table class="table" id="tabela-1">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>&nbsp;</th>
        </thead>
        <tbody id="tbody-1">
        </tbody>
    </table>


    <!-- TABELA COM DADOS DINÂMICOS 2 -->
    <table class="table" id="tabela-2">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>&nbsp;</th>
        </thead>
        <tbody id="tbody-2">
        </tbody>
    </table>


    <!-- MODAL -->
    <div id="modal-user" class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Utilizador</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
                <div id="modal-nome"></div>
                <div id="modal-email"></div>
                <div id="modal-descricao"></div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>



    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        const modalUser = new bootstrap.Modal(document.getElementById('modal-user'));

        const users = [
            {
                "id": 1,
                "nome": "Maria Albertina",
                "email": "maria.albertina@example.com",
                "descricao": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
                "foto": "avatar1.png"
            },
            {
                "id": 2,
                "nome": "João Lucas",
                "email": "joao.lucas@example.com",
                "descricao": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
                "foto": "avatar2.png"
            }];

        const tabela = document.getElementById('tbody-1');    

        users.forEach( user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.nome}</td>
                <td>${user.email}</td>
                <td><img src="imgs/avatares/${user.foto}" style="width:35px;"></td>
            `;
            tabela.appendChild(row);
        })
        

        /* click em artistas do top */
        document.querySelectorAll('tr.top-artista').forEach(function(el){ 
            el.addEventListener('click', function(){
                let artista = el.dataset.artista;
                console.log('artista', artista);
                alert('vou fazer qq coisa');
            })
        });

        /* função para carregar dados de utilizadores */
        function carregarDados(){
            fetch('utilizadores.json')
                .then(response => {
                    if(!response.ok){
                        throw new Error('Erro ao carregar ficheiro!!');
                    }
                    return response.json();
                })
                .then(data => {
                    const tabela = document.getElementById('tbody-2');    

                    data.forEach( user => {
                        const row = document.createElement('tr');
                        row.addEventListener('click', function(){
                            document.getElementById('modal-nome').textContent = user.nome;
                            document.getElementById('modal-email').textContent = user.email;
                            document.getElementById('modal-descricao').textContent = user.descricao;
                            modalUser.show();
                        })
                        row.innerHTML = `
                            <td>${user.nome}</td>
                            <td>${user.email}</td>
                            <td><img src="imgs/avatares/${user.foto}" style="width:35px;"></td>
                        `;
                        tabela.appendChild(row);
                    })
                })
                .catch(error => {
                    console.log('Ocorreu um erro', error);
                })
        }



        setTimeout(carregarDados, 2000);

    </script>
</body>
</html>