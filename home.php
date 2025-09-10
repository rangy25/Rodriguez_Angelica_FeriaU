<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

$usuario = ucfirst(strtolower($_SESSION['usuario']));
$rol     = isset($_SESSION['rol']) ? ucfirst($_SESSION['rol']) : "Usuario";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio - Feria de Universidades</title>
  <link rel="stylesheet" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/responsive.css"/>
  <style>
    body {
      background: linear-gradient(135deg, #3a0ca3, #4361ee);
      color: #333;
    }
    .bienvenida-card {
      background: #fff;
      border-radius: 20px;
      padding: 40px;
      margin: 30px auto;
      max-width: 800px;
      text-align: center;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    .bienvenida-card h1 {
      font-size: 2.5rem;
      font-weight: 800;
      color: #3a0ca3;
    }
    .bienvenida-card h1 span {
      color: #4361ee;
    }
    .bienvenida-card h2 {
      font-size: 1.2rem;
      font-weight: 600;
      margin-top: 10px;
      color: #444;
    }
    .info-box {
      background: #f9fafc;
      border-radius: 15px;
      padding: 25px;
      margin: 20px 0;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      text-align: left;
    }
    .info-box h3 {
      color: #3a0ca3;
      font-weight: bold;
    }
    .btn-custom {
      border-radius: 25px;
      padding: 12px 25px;
      margin: 10px;
      font-weight: 600;
    }
    /* Mensaje especial de registro */
    .alert-bienvenida {
      margin: 20px auto;
      max-width: 800px;
      text-align: center;
      font-size: 1.2rem;
      font-weight: 600;
      background: #d1f7d6;
      color: #0f5132;
      border: 2px solid #badbcc;
      border-radius: 10px;
      padding: 15px;
    }
  </style>
</head>
<body>
  <!-- Encabezado -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand d-flex align-items-center" href="home.php">
          <img src="img/logoFeria.jpg" alt="Logo Feria" style="height:50px; margin-right:10px;">
          <span>Feria de Universidades</span>
        </a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <span class="nav-link font-weight-bold text-success">
                HOLA, <?php echo $usuario; ?> (<?php echo $rol; ?>) 👋
              </span>
            </li>
            <li class="nav-item">
              <a class="btn btn-danger ml-lg-2" href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <!-- 👇 Mensaje especial si viene de un registro -->
  <?php if (isset($_SESSION['registro_exitoso'])): ?>
    <div class="alert-bienvenida">
      🎉 ¡Tu registro fue exitoso! Bienvenido a la Feria de Universidades 2025, 
      <b><?php echo $usuario; ?></b> 👋
    </div>
    <?php unset($_SESSION['registro_exitoso']); ?>
  <?php endif; ?>

  <!-- Tarjeta de bienvenida -->
  <div class="bienvenida-card">
    <h1>👋 Bienvenido <span><?php echo $usuario; ?></span></h1>
    <h2>Tu rol: <?php echo $rol; ?></h2>
    <p class="lead">Has ingresado a tu espacio personalizado de la <b>Feria de Universidades 2025</b>.</p>
    
    <!-- Resumen -->
    <div class="info-box">
      <h3>🎓 Resumen</h3>
      <p>Más de <b>50 universidades</b> nacionales e internacionales participan en esta feria. 
      Aquí encontrarás información sobre becas, programas de intercambio y asesorías vocacionales.</p>
    </div>

    <!-- Próximos eventos -->
    <div class="info-box">
      <h3>🗓️ Próximos eventos</h3>
      <ul>
        <li><b>15 Septiembre:</b> Conferencia sobre becas internacionales</li>
        <li><b>20 Septiembre:</b> Feria virtual en nuestra plataforma online</li>
        <li><b>25 Septiembre:</b> Taller de orientación vocacional</li>
      </ul>
    </div>

    <!-- Enlaces rápidos -->
    <div class="info-box text-center">
      <h3>🔗 Enlaces rápidos</h3>
      <a href="service.html" class="btn btn-success btn-custom">📌 Servicios</a>
      <a href="contact.html" class="btn btn-info btn-custom">📩 Contacto</a>
      <a href="index.php" class="btn btn-primary btn-custom">🏠 Página principal</a>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer_bg">
    <section class="container-fluid footer_section text-center py-3">
      <p>© 2025 Feria de Universidades - Colegio San José de Guanentá</p>
    </section>
  </footer>
</body>
</html>







