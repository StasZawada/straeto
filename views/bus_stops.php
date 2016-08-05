<form action="form.php" method="get">
 Bus Nr <strong> <?= $_GET["busNumber"] ?></strong><br>
 
<input type="hidden" name="busNumber" value="<?=$_GET["busNumber"]?>">
<input type="hidden" name="direction" value="<?=$_GET["direction"]?>">
select bus stop<br>
<select name="stop">
  <?php foreach ($stops as $stop): ?>
          <option value="<?= $stop["id"] ?>"><?= $stop["stop"] ?></option>
        <?php endforeach ?>
  
 
</select>
<button class="btn btn-default" type="submit">OK</button>
</form>