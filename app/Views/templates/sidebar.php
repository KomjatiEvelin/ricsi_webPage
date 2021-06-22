<div class="sidebar p-0 mr-2" style="color:grey; height:100%; width:20%; overflow-y: hidden; flex:100%;">

<?php 
    $db=0;
    foreach ($datas as $datas_item): 
    if($datas_item['level']>5&&$db<2):
    ?> 

    <div class="card" style="margin:10px; color:black; background-color:rgba(202, 209, 219, 0.2); ">
        <div class="card-body">
        <h5 style="text-align:center; font-size:2.2vh;"><?= esc($datas_item['name']) ?></h5>
        <div class="rounded" style="background-image:url(<?= base_url(); ?>/images/<?= esc($datas_item['img'])?>); background-size:cover; background-repeat:no-repeat; background-position:center; width:8vw; height:15vh; float:left; margin:4px;">
        </div>
        <p style="font-weight:bold; font-size:1.8vh;"><?= esc($datas_item['info']) ?></p>
        <?php if(session()->get('username')=="admin"){
               echo '<button type="submit" class="btn btn-danger" onclick="openModal('.$datas_item["id"].');" user-id="'.$datas_item["id"].'">Szerkeszt</button>';
                }
            ?>
        </div>
        <div id="myModal<?= $datas_item['id'] ?>" class="modal">
            <span class="close cursor" onclick="closeModal(<?php echo $datas_item['id'] ?>)">&times;</span>
            <div class="modal-content">
            <?php $key = array_search($datas_item['id'], array_column($datas, 'id')); ?>
            <h5><?php echo $datas[$key]['name'] ?> szerkesztése</h5>
            <form class="rounded" method="post" action="/sponsors/update">
            <input type="hidden" value="<?php echo $datas_item['id']; ?>" name="id">
            <input type="text" value="<?php echo $datas_item['name']; ?>" name="nameBox">
            <div class="form-group">
                    <label for="infoBox" style="font-size:1.8vh;">Rövid leírás</label>
                    <textarea class="form-control" name="info"  value="<?php echo $datas_item['info']; ?>"></textarea>
                </div>
                <button type="submit" class="btn btn-dark" style="font-size:1.8vh;">Ment</button>
            </form>      
            
            
            </div>
        </div>
    </div>
<?php $db++;
    endif;
    endforeach; ?>
 </div>

 <style>


/* The Modal (background) */
.modal {
  display: none;
  z-index: 1;
  padding-top: 100px;
  width: 50%;
  height: 50%;
  overflow: hidden;
  background-color: rgba(0, 0, 0, 0.8);
}

/* Modal Content */
.modal-content {
  position: relative;
  margin: auto;
  padding: 0;
  width: 90%;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
}

</style>
<script>
// Open the Modal
function openModal(id) {
  let modalName="myModal"+id;
  document.getElementById(modalName).style.display = "block";
}

// Close the Modal
function closeModal(id) {
  let modalName="myModal"+id;
  document.getElementById(modalName).style.display = "none";
}
</script>