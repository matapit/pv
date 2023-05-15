<?php
include('assets/layout/admin.php');


?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">STRUCTURES</h1>
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
    <form action="index.php?page=adminRegistUser" method= 'post'>
    <label>nom</label>
    <input class="form-control" type="text" name="nom"><br>
    <label>email</label>
    <input class="form-control" type="email" name="email"><br>
    <label>mot de passe</label>
    <input class="form-control" type="password" name="mot_de_passe"><br>
    <label for="categorie">categorie</label>
    <select class="form-control" name="admin" id="admin">
      <option value="administrateur">administrateur</option>
      <option value="employe">employé</option>
    </select>
  <div class="mx-auto" style="width: 200px;">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>


<form action="" method="post" enctype="multipart/form-data">
  <br>
    
    
    <input type="submit">
    </p>
    </form>
</div>


          <h4>DERNIER PV</h4>
          
          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead> 
            <tr>
              <td>modifier</td>
              <td><a href="listeArticle.php?filtre='codes'">name<a></td>
              <td><a href="listeArticle.php?filtre='n_dens'">description</a></td>
              <td><a href="listeArticle.php?filtre='designation'">admin</a></td>
              <td><a href="listeArticle.php?filtre='espece_des_unites'">date_creatio</td>
              <td><a href="listeArticle.php?filtre='quantite'">date_modification</td>
              
            </tr>
          </thead>
              <tbody>
                <?php
                 while ($donnees = $req->fetch())
                 {
                   $admin= '';
                  $req1 = $bdd->prepare('SELECT name FROM users WHERE id =? ');
                  $req1->execute(array($_SESSION['id_user']));
                  $rep = $req1->fetch();
                  if ($rep != false ) {
                    $admin = $rep['name'];

                  }

                  // $contenu .= $donnees['name'].';'.$donnees['description'].';'.$admin.';'.$donnees['created_at'].';'.$donnees['updated_at'].'; \n';
       
       
                 echo '<tr>';
                 echo '<td><a href=""><a href="modifier.php?id='.$donnees['id'].'"> <img src="images/crayon.png" title="modifier"></a></td>';
                 echo '<td>'.$donnees['name'].'</td>' ;
                 echo '<td>'.$donnees['description'].'</td>' ;
                 echo '<td>'.$admin.'</td>' ;
                 echo '<td>'.$donnees['created_at'].'</td>';
                 echo '<td>'.$donnees['updated_at'].'</td>' ;
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