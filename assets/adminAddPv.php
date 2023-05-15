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


    <div class="card" >
    <form action="index.php?page=adminRegistPv" method="post">

    




  <div class="form-group">
    <label for="exampleFormControlInput1" >Code</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="XXXX"name="code">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" >n-dens</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="XXXX"name="n_dens">
  </div>
  <div class="form-group">
  <label for="designation">designation</label>
    <input type="text" class="form-control"  id="designation" name="designation" placeholder="designation">
 
  </div>
  <div class="form-group">
  <label for="espece_des_unites">espece des unité</label>
  <input type="text" class="form-control"  name="espece_des_unites" id="espece_des_unites" placeholder="N">
  </div>
  <div class="form-group">
    <label for="date">date d'affectation</label>
    <input type="date" class="form-control" name="date" id="date" placeholder="date">
    
  </div>
  <div class="form-group">
  <label for="quantite">quantité</label>
    <input type="number" class="form-control" name="quantite"  id="quantite" placeholder="xxx">
  </div>
  <div class="form-group">
  <label for="prix">prix unitaire</label>
    <input type="number" class="form-control" name="prix"  id="prix" placeholder="xxxcfa">
  </div>
  
  <div class="form-group">
  <div class="form-group">
    <label for="exampleFormControlSelect2">structure</label>
    <select multiple class="form-control" name="structure" id="structure">

      <?php

while ($donnees = $req1->fetch())
{
  

 
echo '<option value= '.$donnees['id'].'>'.$donnees['name'].'</td>' ;

}

    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
  <div class="mx-auto" style="width: 200px;">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>


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

  </body>
</html>