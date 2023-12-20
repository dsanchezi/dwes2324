<?php
require_once __DIR__ . '/../../src/utils/utils.class.php';
?>
<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="#page-top"><span>[PHOTO]</span></a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">
        <?php 
        if (Utils::esOpcionMenuActiva('/')==true || Utils::esOpcionMenuActiva('/')==true)
          echo '<li class="active lien">'; 
        else echo '<li class="lien">';
        ?>
          <a href="/"><i class="fa fa-home sr-icons"></i> Home</a>
        </li>
        <?php 
        if (Utils::esOpcionMenuActiva('/galeria')==true )
          echo '<li class="active lien">'; 
        else echo '<li class="lien">';
        ?>
          <a href="/galeria"><i class="fa fa-bookmark sr-icons"></i> Galería </a>
        </li>
        <?php 
        if (Utils::esOpcionMenuActiva('/asociados')==true )
          echo '<li class="active lien">'; 
        else echo '<li class="lien">';
        ?>
          <a href="/asociados"><i class="fa fa-bookmark sr-icons"></i> Asociados </a>
        </li>
        <?php 
        if (Utils::esOpcionMenuActiva('/about')==true )
          echo '<li class="active lien">'; 
        else echo '<li class="lien">';
        ?>
          <a href="/about"><i class="fa fa-bookmark sr-icons"></i> About</a>
        </li>
        <?php 
        if (Utils::esOpcionMenuActiva('/blog')==true )
          echo '<li class="active lien">'; 
        else echo '<li class="lien">';
        ?>
          <a href="/blog"><i class="fa fa-file-text sr-icons"></i> Blog</a>
        </li>
        <?php 
        if (Utils::esOpcionMenuActiva('/contact')==true )
          echo '<li class="active lien">'; 
        else echo '<li class="lien">';
        ?>
          <a href="/contact"><i class="fa fa-phone-square sr-icons"></i> Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End of Navigation Bar -->
