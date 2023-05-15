<?php
include('assets/layout/user.php');


?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


          


          <div class="card  grey lighten-5">
        <div class="card-content ">
          <span class="card-title"><h2 id="criteriarecherche"><span class="ico_search"></span> Critères de recherche</h2></span>
          <p><form method="post" >
                    
                <div class="form-group">
  <label for="quantite">quantité</label>
    <input type="number" class="form-control" name="quantite"  id="quantite" placeholder="xxx">
  </div>



    <div class="form-group">
                  <label for='date_min'>date min</label>
                 <input class="form-control" name="date_min" id="date_min" type="date" value="2010-01-01"> 
    </div>
                <div class="form-group">
                  <label for="date_max">date max</label>
                  <input class="form-control" name="date_max" type="date" value="2030-12-31"> 
                </div>
                <div class="form-group">
                  <label for="min">quantité min</label>
                 <input class="form-control" name="min" id="min" type="number" value="0">
                </div>
                <div class="form-group">
                  <label for="max">quantité max</label>
                  <input class="form-control" name="max" id="max" type="number" value="1000000">
                </div>
                <div class="form-group">
                  <label>prix min</label>
                  <input class="form-control" name="prix_min" type="number" value="0">
                </div>
                <div class="form-group">
                  <label>prix max</label>
                  <input class="form-control" name="prix_max" type="number" value="1000000000">
                </div>
                <div class="form-group">
                  <label> Uploader </label>
                  <input class="form-control" name="uploader" type="text" value="" >
                </div>
      
                <div class="form-group">
                  <label>structure</label>
                  
                  <!-- Catégorie -->
            
                        <select multiple class="form-control" name="structure">
                        <option value="0" selected>--Please choose an option--</option>
                        <?php
                            
                            while ($donnees = $req1->fetch())
                                {
  

 
                                    echo '<option value= '.$donnees['id'].'>'.$donnees['name'].'</option>' ;

                                }

                                ?>
                        </select>
                                
                  </div>
              
              </tbody></table>
            </div>
            <div class="card-action">
         <input type="submit" name="sub" class="waves-effect waves-light btn" name="search" value = "recherche" >
        </div>
            </form>
          </p>
        </div>
        
      





    

          
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">RESULTATS</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary"><a class="waves-effect waves-light btn-large right" href="excel/excel<?= $date?>.csv">Export</a></button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

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
                 $contenu .= $donnees['codes'].';'.$donnees['n_dens'].';'.$donnees['designation'].';'.$donnees['description'].';'.$donnees['unite'].';'.$donnees['quantity'].';'.$donnees['unit_price'].';'.$donnees['affectation'].';'.$struc."\n";
                 
                 }
       


                 
                 $fichier = fopen('excel/excel'.$date.'.csv', 'w');
                 fputs($fichier, $contenu);
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