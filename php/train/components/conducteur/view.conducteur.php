<?php class ViewConducteur {


function menu(){
	?>
	<p><a class="btn" href="controller.php?">View list</a>
	<a class="btn btn-primary" href="controller.php?&task=add">Add Conducteur</a>
	<?php
}


function pagination($numberOfPages, $curentPage, $link){
	//if($numberOfPages >1){
		echo '<div class="pagination"><ul>';
		for($i=1; $i<=$numberOfPages; $i++){
			if($i == $curentPage){
				?>
				<li class="active"><a href="<?=$link?>page=<?=$i?>"><?=$i?></a></li>
				<?php
			}
			else{
				?>
				<li><a href="<?=$link?>page=<?=$i?>"><?=$i?></a></li>
				<?php
			}
		}
		echo '</ul></div>';
	//}
}

function form($data){

	?>
	<div>
		<form class="form-horizontal" method="POST" action="<?=$_SERVER['REQUEST_URI']?>">
		<fieldset>
		<legend>Add a Conducteur</legend>


	
	<div class="control-group">

		<label class="control-label">Id Conducteur:</label>
		<div class="controls">
		<input type="text" name="id_conducteur" id="id_conducteur" size="10" value="<?=$data['id_conducteur']?>"/>
		</div>
	</div>
	<div class="control-group">

		<label class="control-label">Prenom:</label>
		<div class="controls">
		<input type="text" name="prenom" id="prenom" size="10" value="<?=$data['prenom']?>"/>
		</div>
	</div>
	<div class="control-group">

		<label class="control-label">Nom:</label>
		<div class="controls">
		<input type="text" name="nom" id="nom" size="10" value="<?=$data['nom']?>"/>
		</div>
	</div>
		<div class="control-group">
		<input type="hidden" name="id" id="id" value="<?=$data['id']?>"/>
		<input type="submit" name="Envoyer" title="Envoyer" value="Save" class="btn btn-primary">
		<button class="btn" type="reset">Anuler</button>
		</div>



	</fieldset>
	</form>
	</div>
	<?php
	}
	

function displayList($data, $link='', $orderBy='', $order='desc'){



	?>

	<table class="table table-bordered">
	<thead>
	<tr>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=1;


	foreach ($data as $element){
		?>
		<tr>
	
			<td><a href="controller.php?&task=view&id=<?php echo $element['id']?>" class="btn">View</a></td>
			<td><a href="controller.php?&task=edit&id=<?php echo $element['id']?>" class="btn btn-primary">Edit</a></td>
			<td><a href="controller.php?&task=del&id=<?php echo $element['id']?>" class="btn btn-danger">Del</a></td>
		</tr>
		<?php
	}?>
	</tbody>
	</table>
	<?php



		?>
	<tfoot>
	<tr>
	<td colspan="6" class="phppistolsTFooter"></td>
	</tr>
	</tfoot>

	</table>
	<?php
}


	function displayDetails($element){

	

	$i=1;

	if (is_array($element)){
	?>
	<div class="warper">

		<label>id_conducteur</label><?php echo $element['id_conducteur']?><br>
		<label>prenom</label><?php echo $element['prenom']?><br>
		<label>nom</label><?php echo $element['nom']?><br>
	


	<?php
}



}

}
	