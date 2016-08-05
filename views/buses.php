
        <form action="form.php" method="get">
        Bus Nr 
        <select name="busNumber">
          <option value="any">any</option>
        <?php foreach ($buses as $bus): ?>
          <option value="<?= $bus["Nr"] ?>"><?= $bus["Nr"] ?></option>
        <?php endforeach ?>
        
        </select>
        <button class="btn btn-default" type="submit">OK</button>
        </form>
      