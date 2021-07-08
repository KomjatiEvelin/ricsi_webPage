<div class="card text-center m-2 align-middle" style="color: black; background-color:rgba(202, 209, 219, 0.5); align-self:center;">
        <div class="card-body">
            <h3 class="card-text" style="font-size:2.2vh;">Videó feltöltése a galériába</h3>
            <form class="card p-2 m-3 rounded" method="post" enctype="multipart/form-data" action="/galery/uploadVideo">
                <div class="form-group">
                    <label for="fileBox" style="font-size:1.8vh;">Videó</label>
                    <input type="file" class="form-control" name="video" required>
                </div>
                <div class="form-group">
                    <label for="infoBox" style="font-size:1.8vh;">Rövid leírás</label>
                    <textarea class="form-control" maxlength="100" name="info" placeholder="Rövid leírás max. 100 karakter (nem kötelező)"></textarea>
                </div>
                <button type="submit" class="btn btn-dark" style="font-size:1.8vh;">Feltölt</button>
            </form>
        </div>
</div>
