<form action="save_offre.php" method="post">
    <label for="">Séléctionner une offre: </label>
    <select name="offre" id="" class="form-control">
        <option value="0">Veuillez séléctionner votre offre</option>
        <?php 
            $offres = getOffres();
            foreach($offres as $offre){
                ?>
                <option value="<?= $offre['id'] ?>"><?= $offre['libelle'] ?></option>
                <?php
            }
        ?>
    </select>
    <button type="submit" class="btn btn-outline-primary btn-sm btn-block mt-2">Confirmer</button>
</form>