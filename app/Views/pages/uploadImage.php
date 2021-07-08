<div class="card text-center m-2 align-middle" style="color: black; background-color:rgba(202, 209, 219, 0.5); align-self:center;">
        <div class="card-body">
            <h3 class="card-text" style="font-size:2.2vh;">Kép feltöltése a galériába</h3>
            <form class="card p-2 m-3 rounded" method="post" enctype="multipart/form-data" action="/galery/upload">
                <div class="form-group">
                    <label for="yearBox" style="font-size:1.8vh;">Év</label>
                    <br/>
                    <select name="year" required>
                    <?php foreach ($years as $years_item): ?>
                            <option value="<?php echo $years_item['year']; ?>"><?php echo $years_item['year']; ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fileBox" style="font-size:1.8vh;">Kép</label>
                    <input type="file" class="form-control" name="image[]" multiple="multiple" required>
                </div>
                <div class="form-group">
                    <label for="infoBox" style="font-size:1.8vh;">Rövid leírás</label>
                    <textarea class="form-control" maxlength="100" name="info" placeholder="Rövid leírás max. 100 karakter (nem kötelező)"></textarea>
                </div>
                <button type="submit" class="btn btn-dark" style="font-size:1.8vh;">Feltölt</button>
            </form>
        </div>
</div>
