<table class="table table-hover">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de postule</th>
            <th>CV</th>
            
        </tr>
    </thead>
    <tbody>
        <?php

        $connecte = $_SESSION['connecte'];
        $offre_of_recruteur = $connecte['offre_id'];
        $cvs                = getCvsByRecruteur($offre_of_recruteur);
        $i = 0;
        foreach ($cvs as $cv) {
            $user = getUserById($cv['candidat_id']);
            $nom  = $user['fname'];
            $prenom  = $user['lname'];
        ?>
            <tr>
               <td><?= $nom ?></td>
               <td><?= $prenom ?></td>
               <td><?= $cv['date_postule'] ?></td>
              
               <td>
                   
                  <a class="btn btn-primary" target="_blank" href="../pdf/<?= $user['cv_path'] ?>">voir cv</a>
               </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>