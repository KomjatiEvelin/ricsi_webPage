<div class="card text-center m-2 align-middle" style="color: black; background-color:rgba(202, 209, 219, 0.5); align-self:center;">
        <div class="card-body">
            <h3 class="card-text" style="font-size:2.2vh;">Új évszám hozzáadása a galériához</h3>
            <form class="card p-2 m-3 rounded" method="post" action="/galery/addyear">
                <div class="form-group">
                    <label for="yearBox" style="font-size:1.8vh;">Év</label>
                    <input type="number" class="form-control" name="year" placeholder="Mikor készült?" min="2000" required>
                </div>
                <div class="form-group">
                    <label for="infoBox" style="font-size:1.8vh;">Rövid leírás</label>
                    <textarea class="form-control" name="text" placeholder="Rövid leírás (nem kötelező)"></textarea>
                </div>
                <button type="submit" class="btn btn-dark" style="font-size:1.8vh;">Hozzáad</button>
            </form>
        </div>
</div>