<div class="sponsorbar pl-2 pr-2 mr-2" style="color:grey; height:fit-content;" >

<?php 
    $db=0;
    foreach ($datas as $datas_item): 
    if($datas_item['level']>5&&$db<2):
    ?> 

    <div class="rounded" id="card<?php echo $datas_item['id'];?>" style="margin:5px; padding:3px; color:black; background-color:rgba(202, 209, 219, 0.5); width:100%; height:fit-content; overflow-y:auto; word-break:normal;" onclick="myFunction2(<?php echo $datas_item['id']; ?>);">
        <h6 style="text-align:center; padding-top:5px; font-weight:bold;"><?= esc($datas_item['name']) ?></h6>
        <div id="img<?php echo $datas_item['id'];?>" class="rounded" style="display:none; background-image:url(<?= base_url(); ?>/images/<?= esc($datas_item['img'])?>); background-size:cover; background-repeat:no-repeat; background-position:center; width:100px; height:120px; float:left; margin-left:10px; margin-right:10px;">
        </div>
        <p id="sponsor<?php echo $datas_item['id'];?>" style="display:none;"><?= esc($datas_item['info']) ?></p>
        
        <?php if(session()->get('username')=="admin"){
               echo '<button id="editBtn'.$datas_item['id'].'" type="submit" style="display:none;" class="btn btn-danger" onclick="openModalMobil('.$datas_item["id"].');" user-id="'.$datas_item["id"].'">Szerkeszt</button>';
               echo '<form class="rounded" method="post" action="/sponsors/deleteSuper">   
                      <input type="hidden" value="'.$datas_item['id'].'" name="id">
                      <button type="submit" style="display:none;" id="delBtn'.$datas_item['id'].'" class="btn btn-danger">Töröl</button>
                    </form>';
              }
        ?>

            
    </div>

        <div id="mymobilModal<?= $datas_item['id'] ?>" class="modal">
            <span class="close cursor" onclick="closeModalMobil(<?php echo $datas_item['id'] ?>)">&times;</span>
            <div class="modal-content">
            <?php $key = array_search($datas_item['id'], array_column($datas, 'id')); ?>
            <h5><?php echo $datas[$key]['name'] ?> szerkesztése</h5>
            <form class="rounded" method="post" enctype="multipart/form-data" action="/sponsors/update">
            <input type="hidden" value="<?php echo $datas_item['id']; ?>" name="id">
            <input type="text" value="<?php echo $datas_item['name']; ?>" name="name">
            <div class="form-group">
                    <label for="fileBox" style="font-size:1.8vh;">Kép</label>
                    <input type="file" class="form-control" name="image">
                </div>
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
  var z = document.getElementById("editBtn"+id);
  var w = document.getElementById("delBtn"+id);
  if (x.style.display === "block") {
    x.style.display = "none";
    y.style.display = "none";

    if(z!=null&&w!=null){
      z.style.display = "none";
      w.style.display = "none";
    }
    document.getElementById("card1").style.height="fit-content";
    document.getElementById("card2").style.height="fit-content";
  } else {
    x.style.display = "block";
    y.style.display = "block";

   if(z!=null&&w!=null){
      z.style.display = "block";
      w.style.display = "block";
    }
    document.getElementById("card2").style.height="fit-content";
  }

}

</script>