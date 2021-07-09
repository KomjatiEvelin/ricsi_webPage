<div class="homecontent p-3 mt-2 mb-2 mr-3 rounded" style="min-height:90%; width:100%; color:black; background-color:rgba(202, 209, 219, 0.5);">
<div class="card text-center m-2 align-middle" style="color: black; background-color:rgba(202, 209, 219, 0.5); align-self:center;">
        <div class="card-body">
            <h3 class="card-text" style="font-size:2.2vh;">Új szponzor felvétele</h3>
            <form class="card p-2 m-3 rounded" method="post" enctype="multipart/form-data" action="/sponsors/create">
                <div class="form-group">
                    <label for="nameBox" style="font-size:1.8vh;">Név</label>
                    <input type="text" class="form-control" name="name" placeholder="Szponzor neve" required>
                </div>
                <div class="form-group">
                    <label for="levelBox" style="font-size:1.8vh;">Szint</label>
                    <input type="number" class="form-control" name="level" placeholder="Milyen szintű támogató?" min="1" max="5" required>
                </div>
                <div class="form-group">
                    <label for="fileBox" style="font-size:1.8vh;">Logo</label>
                    <input type="file" class="form-control" name="logo" required>
                </div>
                <div class="form-group">
                    <label for="infoBox" style="font-size:1.8vh;">Rövid leírás</label>
                    <textarea class="form-control" name="info" placeholder="Rövid leírás (nem kötelező)"></textarea>
                </div>
                <button type="submit" class="btn btn-dark" style="font-size:1.8vh;">Hozzáad</button>
            </form>
        </div>
</div>
