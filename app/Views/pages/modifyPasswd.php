<div class="card text-center m-2 align-middle" style="color: black; background-color:rgba(202, 209, 219, 0.5); align-self:center;">
        <div class="card-body">
            <h3 class="card-text" style="font-size:2.2vh;">Jelszó módosítása</h3>
            <form class="card p-2 m-3 rounded" method="post" enctype="multipart/form-data" action="">
            <div class="form-group">
                    <label for="pwdBox1" style="font-size:1.8vh;">Jelenlegi jelszó</label>
                    <input type="password" class="form-control" name="oldPwd" required>
                </div>
                <div class="form-group">
                    <label for="pwdBox2" style="font-size:1.8vh;">Új jelszó</label>
                    <input type="password" class="form-control" name="newPwd" required>
                </div>
                <div class="form-group">
                    <label for="pwdBox3" style="font-size:1.8vh;">Új jelszó ismét</label>
                    <input type="password" class="form-control" name="newPwdRepeat" required>
                </div>
                <button type="submit" class="btn btn-dark" style="font-size:1.8vh;">Feltölt</button>
            </form>
        </div>
</div>
