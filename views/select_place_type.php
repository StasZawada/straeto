<form action="form.php" method="get">
<input type="hidden" name="busNumber" value="<?=$bus["Nr"]?>">
please choose alarm location for bus number <strong> <?= $bus["Nr"]  ?> </strong>to
<select name="direction">
<option value="<?= $bus["to1"]  ?>"><?= $bus["to1"]  ?></option>
<option value="<?= $bus["to2"]  ?>"><?= $bus["to2"]  ?></option>
</select><br>

<button class="btn btn-default" type="submit" name="place_type" value="busStop">bus stop</button><br> or <br>
<button class="btn btn-default" type="submit" name="place_type" value="otherLoc">other location</button>