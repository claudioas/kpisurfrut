<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script>
      let base_url = '<?php echo base_url() ?>'
    </script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/materialize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/kpisurfrut.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper" style="background-color: red">
          <a href="#!" class="brand-logo center card-title">KPI Surfrut 2018</a>
          <ul class="right hide-on-med-and-down">
          </ul>
        </div>
      </nav>
    </div>


<br>
    <div class="container">





      <div class="row" id="rowKpi1">
        <div class="col s12 m12 l12">
          <div class="card darken-5">
            <div class="card-content">
              <div id="kpi1" style="height: 500px; width: 100%;"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card darken-5">
            <div class="card-content">
              <div id="kpi2" style="height: 500px; width: 100%;"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card darken-5">
            <div class="card-content">
              <div id="kpi3" style="height: 500px; width: 100%;"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card darken-5">
            <div class="card-content">
              <div id="kpi4" style="height: 500px; width: 100%;"></div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </body>
  <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>js/canvasjs.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>js/materialize.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>js/kpi1.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>js/home.js"></script>
</html>
