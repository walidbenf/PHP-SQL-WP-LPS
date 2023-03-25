  <form action="depot.php" method="post" enctype="multipart/form-data">
      <label for="nom">Nom</label><br>
      <input type="nom" name="nom" id="nom" class="form-control"><br> <br>
      <input type="hidden" name="MAX_FILE_SIZE" value="3000" />
      <input type="file" name="fileToUpload" id="fileToUpload"> <br> <br>
      <input type="submit" class="btn btn-secondary" value="Envoyer">
  </form>
