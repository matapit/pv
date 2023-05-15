<?php
include('assets/layout/admin.php');


?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

          <h2>DERNIER PV</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead> 
            <tr>
              <td>modifier</td>
              <td><a href="listeArticle.php?filtre='codes'">code<a></td>
              <td><a href="listeArticle.php?filtre='n_dens'">n_dens</a></td>
              <td><a href="listeArticle.php?filtre='designation'">designation</a></td>
              <td>description</td>
              <td><a href="listeArticle.php?filtre='espece_des_unites'">espece des unités</td>
              <td><a href="listeArticle.php?filtre='quantite'">quantité</td>
              <td><a href="listeArticle.php?filtre='prix_unitaire'">prix unitaire</td>
              <td><a href="listeArticle.php?filtre='date_affectation'">date d'affectation</td>
              <td><a href="listeArticle.php?filtre='structure'">structure</td>
            </tr>
          </thead>
              <tbody>
                <?php
                 while ($donnees = $req->fetch())
                 {

                  $admin= '';
                  $req1 = $bdd->prepare('SELECT name FROM structures WHERE id =? ');
                  $req1->execute(array($donnees['structure_id']));
                  $rep = $req1->fetch();
                  if ($rep != false ) {
                    $struc = $rep['name'];

                  }



       
       
                 echo '<tr>';
                 echo '<td><a href=""><a href="modifier.php?id='.$donnees['id'].'">  <span data-feather="edit">edit</span></a></td>';
                 echo '<td>'.$donnees['codes'].'</td>' ;
                 echo '<td>'.$donnees['n_dens'].'</td>' ;
                 echo '<td>'.$donnees['designation'].'</td>' ;
                 echo '<td>'.$donnees['description'].'</td>';
                 echo '<td>'.$donnees['unite'].'</td>' ;
                 echo '<td>'.$donnees['quantity'].'</td>';
                 echo '<td>'.$donnees['unit_price'].'</td>' ;
                 echo '<td>'.$donnees['affectation'].'</td>';
                 echo '<td>'.$struc.'</td>' ;
                 echo '</tr>';
                 }
       
                ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>    
  </body>
</html>