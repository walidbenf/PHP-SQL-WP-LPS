<section id="works" class="s-works target-section">

  <div class="row section-header" data-aos="fade-up">
      <div class="col-full">
          <h3 data-num="03" class="subhead">Expériences</h3>
          <h1 class="display-1">
          Expériences
          </h1>
      </div>
  </div>
<center><table class="experiences">
    <thead>
        <tr>
            <th>Entreprise</th>
            <th>Poste</th>
            <th>Date</th>
            <th>Tâches</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($experiences as $experience) : ?>
        <tr>
            <td><?php echo htmlentities($experience->entreprise);?></td>
            <td><?php echo htmlentities($experience->poste);?></td>
            <td><?php echo htmlentities($experience->date);?></td>
            <td><?php echo htmlentities($experience->tache);?></td>
            <td>
                <a href="index.php?op=delete&id=<?php echo $experience->id_experience; ?>">
                    Supprimer
                </a>
            </td>
            <td>
                <a href="index.php?op=update&id=<?php echo $experience->id_experience; ?>">
                    Modifier
                </a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</center>

</div>
</div>
<div class="text-center">
<a href="index.php?op=new">Ajouter un nouveau travail</a>
</div>





</section> <!-- end s-works2 -->
