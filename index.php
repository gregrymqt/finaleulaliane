<?php
session_start();

if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include_once('conexaoIrm.php');

    // Prepare a consulta para proteger contra injeção SQL
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE email_u = :email");
    $stmt->execute(['email' => $email]);

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Verificação de senha com hashing
        if (password_verify($senha, $row['senha_u'])) {
            // Salva as informações na sessão
            $_SESSION['cd'] = $row['cd_u'];
            $_SESSION['email'] = $row['email_u'];
            // Redireciona para a página de produtos
            header('Location: produtos.php');
            exit;
        } else {
            // Caso a senha esteja errada
            echo "<script>alert('Nome de usuário ou senha incorreto');</script>";
        }
    } else {
        // Caso o e-mail não exista
        echo "<script>alert('Nome de usuário ou senha incorreto');</script>";
    }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IrmandadeSports</title>
  <link rel="stylesheet" href="cssindex.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script type="text/javascript"
    src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=dkiJPDtZ-S0-bTOsaxx0iXC7RpPENuaYBES7ra_pgFLXKXcxTFVMB-d_6dwzXyh9dZpyM_wRZfw3Jwfe9BQrd43-9RypdRSPMxIn5K88dSt7uE0aiRMg1LGP-W2ZiwdVyJKmRJN30e6Man-3yEqyrsBAVegXyrdriS45NzuxHtnvrriZDMajlSsJkqSdrKGdPp_mveXlXjPH7IqBrfS7jt6w3sZimUyori3_kJ5Erus"
    charset="UTF-8"></script>
</head>

<body>


  <header class="container-fluid custom-container" style="background-color: #010408;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #010307">
      <div class="container-fluid d-flex justify-content-between">
        <div class="d-flex align-items-center">
          <img class="rounded-circle"
            src="https://img.freepik.com/vetores-premium/icone-de-design-do-logotipo-da-letra-is_679026-798.jpg"
            width="35" height="30">
          <a class="navbar-brand ms-2" style="font-family: 'Courier New', Courier, monospace;">
            <h5>IrmandadeSports</h5>
          </a>
        </div>
        <div class="d-flex">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link active" href="#sobrenos">Sobre Nós</a></li>

              <form class="d-flex" role="search">
                <button type="button" class="btn text-white btn-outline-success" data-bs-toggle="modal"
                  data-bs-target="#exampleModal">Login</button>
              </form>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>



  <!-- inicio modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email institucional</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha" required>
                    </div>
                    <div id="cadastro" class="text-center">
                        <font size="3">Caso não tenha cadastro
                            <label style="color:blue" data-bs-toggle="modal" data-bs-target="#back" id="logar">clique aqui!</label>
                        </font>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Sair</button>
                        <input type="submit" class="btn btn-outline text-light" style="background-color:#1D67BF" value="Entrar" name="Entrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 
  <!-- fim do modal -->


  <!-- carousel -->
  <div class="container-fluid" id="carousel">
  </div>
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2100">
        <img src="https://imgnike-a.akamaihd.net/branding/home-sbf/touts/Banner-cosmic-speed-25-11-desk.jpg"
          class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2100">
        <img src="imagens/adidas.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2100">
        <img src="imagens/puma.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- carousel fim -->
  <br>
  <br>

  <!-- imagem das logos -->
  <div class="container text-center " style="z-index: 1000; 
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
  padding: 10px 0; 
  ">
    <div class="row">
      <div class="col">
        <img style="height: 10px; width: 10px; " src="https://cdn-icons-png.flaticon.com/512/731/731962.png" alt="">
        <p class="fw-bold text-white"><a href="#produtoa" style="text-decoration: none; color: black;">Adidas</a></p>
      </div>
      <div class="col order-5">
        <img style="height: 10px; width: 10px; "
          src="https://cdn.icon-icons.com/icons2/3914/PNG/512/puma_logo_icon_248754.png" alt="">
        <p class="fw-bold"><a href="#produtop" style="text-decoration: none;color: black;">Puma</a></p>
      </div>
      <div class="col order-1">
        <img style="height: 10px; width: 10px; " src="https://cdn-icons-png.flaticon.com/256/732/732084.png" alt="">
        <p class="fw-bold"><a href="#produton" style="text-decoration: none;color: black;">Nike</a></p>
      </div>
    </div>
  </div>


  <hr> <br>


  <p style="text-align: center; " id="produton" class="fs-2">Nike</p>



  <!-- cards dos produtos -->
  <div class="container text-center ">
    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="https://imgnike-a.akamaihd.net/360x360/0262063XA8.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nike Cortez 23</h5>
            <p class="card-text">R$ 712,49</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>

      <div class="col ">
        <div class="card" style="width: 18rem;">
          <img src="https://imgnike-a.akamaihd.net/360x360/0250605AA7.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Camiseta Nike Sportswear Tech Pack Masculina</h5>
            <p class="card-text">R$ 313,49 </p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="https://imgnike-a.akamaihd.net/360x360/028820IDA11.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nike x MMW</h5>
            <p class="card-text">R$ 1130,49 </p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br>

  <div class="container text-center">
    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="https://imgnike-a.akamaihd.net/360x360/0258437TA8.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Shorts Nike Court Dri-FIT Slam Masculino</h5>
            <p class="card-text">R$ 398,99 no</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="https://imgnike-a.akamaihd.net/360x360/029494A1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Chuteira Nike Air Zoom Mercurial Vapor 16 Elite SE Campo</h5>
            <p class="card-text">R$ 2374,99</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="https://imgnike-a.akamaihd.net/360x360/0119171DA1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Jaqueta Nike Sportswear Windrunner Masculina</h5>
            <p class="card-text">R$ 569,99</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <br><br>

  <p style="text-align: center;" id="produtoa" class="fs-2">Adidas</p>




  <div class="container text-center">
    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/642b636c4a9f4b5a847b78c9405da159_9366/Shorts_Treino_De_Poliamida_Preto_JC6442_01_laydown.jpg"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Shorts Treino De Poliamida</h5>
            <p class="card-text">R$119,99</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/ed29d1744afa4d8ea83077de3f7bb287_9366/Tenis_Adizero_EVO_SL_Branco_JH6208_01_00_standard.jpg"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Tênis Adizero EVO SL</h5>
            <p class="card-text">R$999,99</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/483297264cb84b0695d43cc46ab963fd_9366/Calca_Adibreak_Vermelho_IP0620_21_model.jpg"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Calça Adibreak</h5>
            <p class="card-text">R$399,99</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br><br>


  <div class="container text-center">
    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/db0788321e4649f79150844e0136afe3_9366/Shorts-saia_80s_Marrom_JC6170_21_model.jpg"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Shorts-saia '80s</h5>
            <p class="card-text">R$149,99</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/ac40a58e1ad74b4a8d63beb83771f38b_9366/Jaqueta_Malha_Arsenal_x_adidas_by_Stella_McCartney_Azul_IA1494_HM1.jpg"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Jaqueta Malha Arsenal x adidas by Stella McCartney</h5>
            <p class="card-text">R$1.299,99</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/785a89bc21fd4ae796f2f45264a44235_9366/Legging_7-8_Own_the_Run_Azul_IX2859_21_model.jpg"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Legging 7/8 Own the Run</h5>
            <p class="card-text">R$399,99</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <br><br>

  <p style="text-align: center; " id="produtop" class="fs-2">Puma</p>





  <div class="container text-center">
    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa/global/108123/01/sv01/fnd/BRA/w/1000/h/1000/fmt/png"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Chuteira Society com Velcro Future 7 Play Neymar Jr Infantil</h5>
            <p class="card-text">R$239,90</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa/global/775066/01/mod01/fnd/BRA/w/1000/h/1000/fmt/png"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Camisa PSV Eindhoven 24/25 HOME Juvenil</h5>
            <p class="card-text">R$399,90</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa/global/627965/01/fnd/BRA/w/1000/h/1000/fmt/png"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Calça PUMA x ROCKET LEAGUE Juvenil</h5>
            <p class="card-text">R$399,90</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
    </div>
  </div>



  <br><br>

  <br><br id="sobrenos">



  <div class="container text-center">
    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa/global/396347/51/sv01/fnd/BRA/w/1000/h/1000/fmt/png"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Tênis PUMA Caven 2.0 AC BDP Infantil</h5>
            <p class="card-text">R$299,90</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa/global/775089/02/mod01/fnd/BRA/w/640/h/640/fmt/png"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Camisa Manchester City 24/25 AWAY Juvenil</h5>
            <p class="card-text">R$399,90</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img
            src="https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa/global/932699/06/fnd/BRA/w/1000/h/1000/fmt/png"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Meia Infantil Cano Longo Kit (3 pares)</h5>
            <p class="card-text">R$39,90</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary ">Compre
              já!</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- fim dos cards -->
  <hr>

  <!-- Sobre nós -->

  <p style="text-align: center;" class="fs-2">Sobre Nós</p>
  <div class="container text-center">
    <div class="row align-items-center">
      <div class="col-6">

        <h5 id="sobrenos">
          Em um ambiente cheio de computadores e códigos, um curso de informática foi o

          ponto de partida para a
          história de dois amigos que transformaram a amizade em um negócio promissor. O que começou como conversas
          informais sobre tecnologia entre aulas e projetos acabou evoluindo para a fundação de uma empresa de revenda
          de
          roupas esportivas.
          Tudo começou com interesses compartilhados. Ygor e Lucas, ambos apaixonados por esportes e inovação,
          perceberam
          que tinham mais em comum do que a programação. Durante os intervalos do curso, discutiam sobre como o
          mercado
          de
          de
          roupas esportivas crescia com a popularidade do estilo esportivo uma combinação de conforto e performance
          que conquistava consumidores de todas as idades.</h5>
      </div>
      <div class="col-6">
        <img src="imagens/Imagem do WhatsApp de 2024-12-01 à(s) 15.06.25_256ab180.jpg" id="imag" alt="" alt="">

      </div>
    </div>
  </div>


  <br><br>

  <footer style="background-color: rgb(121, 124, 124);">
    <br>
    <div class="container-fluid" style="background-color: rgb(0, 0, 0);">
      <div class="row align-items-center" style="background-color: rgb(0, 0, 0);">
        <!-- Coluna Siga-nos -->
        <div class="col-4 text-start text-white">
          <h5 class="text-white" id="contato">Siga-nos:</h5>
          <p class="text-white">
            <img
              src="https://d1muf25xaso8hp.cloudfront.net/https://img.criativodahora.com.br/2024/01/criativo-65946738a901dMDIvMDEvMjAyNCAxNmg0Mg==.jpg?w=1000&h=&auto=compress&dpr=1&fit=max"
              width="24" height="24"> Instagram: @Irmandadesports<br>
            <img src="https://i.pinimg.com/736x/70/f9/36/70f936294a1f0f3949a9205df9340d5e.jpg" width="24" height="24">
            Facebook: @Irmandadesports<br>
            <img
              src="https://e7.pngegg.com/pngimages/551/579/png-clipart-whats-app-logo-whatsapp-logo-whatsapp-cdr-leaf-thumbnail.png"
              width="24" height="24"> Whatsapp: +55 (11)4002-8922<br>
            <img src="https://cdn-icons-png.flaticon.com/512/281/281769.png" width="25" height="20"> Email:
            Irmandadesports@gmail.com
          </p>
        </div>

        <!-- Coluna Atendimento ao Cliente -->
        <div class="col-4 text-center">
          <h5 class="text-white">Atendimento ao Cliente</h5>
          <p>
            <a class="dropdown-item text-white" href="https://www.reclameaqui.com.br/" target="_blank">Reclame Aqui!</a>
          </p>
        </div>

        <!-- Direitos Autorais -->
        <div class="col-4 text-end">
          <p class="text-white">
            &copy; 2024 Ygor Matsumoto & Lucas Vicente. Todos os direitos reservados.
          </p>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#logar').click(function (event) {
        event.preventDefault(); // Impede o envio do formulário
          window.location.href = "CadastroUsuario.php"; // Redireciona para outra página
       
        });
      });
   
      
  </script>

 


</body>


</html>