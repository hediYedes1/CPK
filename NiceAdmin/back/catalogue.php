<?PHP
include "../controller/CatalogueC.php";
$produitparpage = 3;
$CatalogueC=new CatalogueC();
$pagesTotales=$CatalogueC->pagetotale($produitparpage);
$listeEmployes=$CatalogueC->afficherCatalogue();
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$produitparpage;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashboard JTS</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <script type="text/javascript" src="../js/controle.js"></script>
   <style type="text/css">
    body {
  font-family: 'Open Sans', sans-serif;
}

h1, h2, h3, h4, h5, h6 {
  font-weight: 300;
}

p {
  color: #999;
}

strong {
  color: #333;
}

#wrapper {
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
  text-align: center;
  padding: 30px 0;
}

.page-head-image {
  
}

.page-head-image img {
  border-radius: 50%;
}

#form-trabalhe {
  margin-top: 30px;
  text-align: left;
}

label {
  font-weight: normal;
  margin-top: 15px;
}

input {
  border: 2px solid #CCC !important;
  height: 35px;
  border-radius: 3px;
  max-width: 100%;
}

.input-group-addon {
  border: 2px solid #CCC !important;
  border-right: 0px !important;
}

.btn {
  border: 0;
  border-radius: 3px;
  margin-top: 20px;
}

.form-group {
  margin-bottom: 0;
  text-align: left;
}
  </style>

</script>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        
      </div>
      
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Commmandes</span>
              </a>
            <ul class="sub">
              <li><a href="commandes.html">Commandes</a></li>
              <li><a href="factures.html">Factures</a></li>
              <li><a href="panier.html">Panier</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Produits</span>
              </a>
            <ul class="sub">
              <li><a href="stock.php">Stock</a></li>
              <li><a href="Recherchestock.php">Recherche</a></li>
              <li><a href="catalogue.php">Catalogue</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>SAV</span>
              </a>
            <ul class="sub"> 
             <li><a href="recherche.php">Recherche</a></li>
              <li><a href="reclamation.php">Reclamations</a></li>
              <li><a href="rendezvous.php">Rendez-vous</a></li>
              <li><a href="tri.php">tri</a></li>
              

              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Clients</span>
              </a>
            <ul class="sub">
               <li><a href="clients.php">Clients</a></li>
              <li><a href="recherche.php">Recherche</a></li>
              <li><a href="historique.php">Historique</a></li>      
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Livraisons</span>
              </a>
            <ul class="sub">
              <li><a href="livdispo.html">Livraisons disponibles</a></li>
              <li><a href="livreurs.html">Livreurs</a></li>
              <li><a href="suivi.html">Suivi</a></li>
            </ul>
          </li>
           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Paiement</span>
              </a>
            <ul class="sub">
              <li><a href="commandes.html">Paiement par carte bancaire</a></li>
              <li><a href="factures.html">Paiement par chèque</a></li>
              <li><a href="panier.html">Paiement à la livraison</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Publicité</span>
              </a>
            <ul class="sub">
              <li><a href="pub.php">Publicité</a></li>
              
              
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>Catalogue</h3>
            </div>
            
              
            <!--custom chart end-->
            
                  
                <!-- /grey-panel -->
              
              <!-- /col-md-4-->
              
              <!-- /col-md-4-->
              <!-- DIRECT MESSAGE PANEL -->
              
              <!-- /col-md-4 -->
              
            <!-- /row -->
            
              </div>
              <!-- /col-md-4 -->
              <!--  PROFILE 02 PANEL -->
              
                  
                <!-- /panel -->
              </div>
              <!--/ col-md-4 -->
             
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <div class="col-lg  ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              
            <!--NEW EARNING STATS -->
            
            <!--new earning end-->
            <!-- RECENT ACTIVITIES SECTION -->
            
            <!-- USERS ONLINE SECTION -->
         <div id="wrapper" class="container">
  
  
  
  <h1>Catalogue</h1>
 

    <form id="form-work" class="" action="../views/ajoutCatalogue.php" method="GET" name="f" onsubmit="return verif()">
      
      <fieldset>
      
   
        <div class="form-group">
            <div class="col-md-6">
              <label class="control-label" for="surname">Id article</label>
              <input name="id_article" class="form-control" placeholder="id_article" type="text" >
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label" for="tel">Type</label>
              <select name="type" class="form-control">
                <option>choisir le type ..</option>
                <option>Art</option>
                <option>Culture</option>
              </select>
            </div>
             <div class="form-group">
            <div class="col-md-6">
              <label class="control-label" for="tel">Image</label>
              <div class="input-group">
                <input name="image" class="form-control" placeholder="image" type="file">
              </div>
            </div>
             <div class="form-group">
            <div class="col-md-6">
              <label class="control-label" for="tel">Nom</label>
              <div class="input-group">
                <input name="nom" class="form-control" placeholder="nom" type="nom">
              </div>
            </div>
            <div class="form-group">
            <div class="col-md-6">
              <label class="control-label" for="tel">Prix</label>
              <div class="input-group">
                <input name="prix" class="form-control" placeholder="prix" type="prix">
              </div>
            </div>
             <div class="form-group">
            <div class="col-md-6">
              <label class="control-label" for="tel">Description</label>
              <div class="input-group">
                <input name="description" class="form-control" placeholder="description" type="description">
              </div>
            </div>

            <div class="form-group">
            <div class="col-md-6">
              <label class="control-label" for="tel">quantite</label>
              <div class="input-group">
                <input name="quantite" class="form-control" placeholder="quantite" type="quantite">
              </div>
            </div>

          </div>


          <br>
           <br>

          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn-lg btn-block info">Ajouter</button>
              
            </div>
          </div>  
            <td><a href="../index.html" style="text-decorations:none; color:white; margin-left: 250px";  class="btn btn-warning">
            Retour au Front</a></td>   
      </fieldset> 
    </form>
</div>

<table class="table table-hover table-fixed">

  <!--Table head-->
  <thead>
    <tr>
      <th>id article</th>
      <th>Type</th>
        <th>Image</th>
        <th>Nom</th>
        <th>Prix</th>
         <th>Description</th>
         <th>quantite</th>

    </tr>
  </thead>
  <!--Table head-->

  <!--Table body-->
  <tbody>

   <?PHP

$Catalogue = $CatalogueC->pagination($produitparpage,$depart);
      while($row = $Catalogue->fetch()) {
  ?>
  <tr>
  <td><?PHP echo $row['id_article']; ?></td>
  <td><?PHP echo $row['type']; ?></td>
  <td><img src="../img/<?php echo $row['image'];?>" width="100" height="100"></td>
  <td><?PHP echo $row['nom']; ?></td>
  <td><?PHP echo $row['prix']; ?></td>
  <td><?PHP echo $row['description']; ?></td>
  <td><?PHP echo $row['quantite']; ?></td>

  
 
  <td><form method="POST" action="../views/supprimerCatalogue.php">
  
  <input type="submit" name="supprimer"  class="btn btn-danger"  value="supprimer">
  <input type="hidden" value="<?PHP echo $row['id_article']; ?>" name="id_article">
  </form>
  </td>
 <td><a href="modifierCatalogue.php?id=<?PHP echo $row['id_article']; ?>" style="text-decorations:none; color:white;"  class="btn btn-warning">
  Modifier</a></td>
  </tr>
  <?PHP
}
?>
<?php
      for($i=1;$i<=$pagesTotales;$i++) {
         if($i == $pageCourante) {
            
            ?> 
         
            <button style="width: 50px;height: 50px;position: relative;left: 38%;top:-50%;" value=" <?PHP echo $i.' ';  ?> "> <?PHP echo $i.' ';  ?> </button> 
         <?PHP
         } else { ?>
           <button style="width: 50px;height: 50px;position: relative;left: 38%;top:-50%;"> <?php echo '<a href="catalogue.php?page='.$i.'">'.$i.'</a> '; ?>  </button>
      <?php
         }
      }
      ?>
   
  </tbody>
  <!--Table body-->

</table>
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });*/
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
