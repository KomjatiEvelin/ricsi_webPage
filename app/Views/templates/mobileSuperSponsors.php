<div class="sponsorbar p-0 mr-2" style="color:grey; height:fit-content;" >

<?php 
    $db=0;
    foreach ($datas as $datas_item): 
    if($datas_item['level']>5&&$db<2):
    ?> 

    <div class="rounded" id="card<?php echo $datas_item['id'];?>" style="margin:5px; padding:3px; color:black; background-color:rgba(202, 209, 219, 0.5); width:100%; height:fit-content; overflow-y:auto; word-break: break-all;" onclick="myFunction2(<?php echo $datas_item['id']; ?>);">
        <h5 style="text-align:center; font-size:2.2vh;"><?= esc($datas_item['name']) ?></h5>
        <div id="img<?php echo $datas_item['id'];?>" class="rounded" style="display:none; background-image:url(<?= base_url(); ?>/images/<?= esc($datas_item['img'])?>); background-size:cover; background-repeat:no-repeat; background-position:center; width:15vw; height:15vh; float:left; margin:2px;">
        </div>
        <p id="sponsor<?php echo $datas_item['id'];?>" style="display:none;" style="font-weight:bold; font-size:1.8vh; "><?= esc($datas_item['info']) ?></p>
        
        <?php if(session()->get('username')=="admin"){
               echo '<button type="submit" class="btn btn-danger" onclick="openModalMobil('.$datas_item["id"].');" user-id="'.$datas_item["id"].'">Szerkeszt</button>';
               echo '<form class="rounded" method="post" action="/sponsors/deleteSuper">
                       
               <input type="hidden" value="'.$datas_item['id'].'" name="id">
               
               <button type="submit" class="btn btn-danger">Töröl</button>
           
           </form>';
     }
            ?>

            
    </div>

        <div id="mymobilModal<?= $datas_item['id'] ?>" class="modal">
            <span class="close cursor" onclick="closeModalMobil(<?php echo $datas_item['id'] ?>)">&times;</span>
            <div class="modal-content">
            <?php $key = array_search($datas_item['id'], array_column($datas, 'id')); ?>
            <h5><?php echo $datas[$key]['name'] ?> szerkesztése</h5>
            <form class="rounded" method="post" action="/sponsors/update">
            <input type="hidden" value="<?php echo $datas_item['id']; ?>" name="id">
            <input type="text" value="<?php echo $datas_item['name']; ?>" name="name">
            <div class="form-group">
                    <label for="infoBox" style="font-size:1.8vh;">Rövid leírás</label>
                    <textarea class="form-control" name="text"><?php echo $datas_item['info']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-dark" style="font-size:1.8vh;">Ment</button>
            </form>      
            
            
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

.sponsorbar{
    display:none;
}
@media only screen and (max-width: 800px) {
    .sponsorbar{
          display:block;
      }
}

</style>
<script>
// Open the Modal
function openModalMobil(id) {
  let modalName="mymobilModal"+id;
  document.getElementById(modalName).style.display = "block";
}

// Close the Modal
function closeModalMobil(id) {
  let modalName="mymobilModal"+id;
  document.getElementById(modalName).style.display = "none";
}

function myFunction2(id) {
  var x = document.getElementById("sponsor"+id);
  var y = document.getElementById("img"+id);
  if (x.style.display === "block") {
    x.style.display = "none";
    y.style.display = "none";
    document.getElementById("card1").style.height="fit-content";
    document.getElementById("card2").style.height="fit-content";
  } else {
    x.style.display = "block";
    y.style.display = "block";
    document.getElementById("card2").style.height="fit-content";
  }

}

</script>