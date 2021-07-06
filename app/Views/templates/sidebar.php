<div class="sidebar p-0 mr-2" style="color:grey; height:100%; width:20%; overflow-y: hidden; flex:100%;">

<?php 
    $db=0;
    foreach ($datas as $datas_item): 
    if($datas_item['level']>5&&$db<2):
    ?> 

    <div class="card" style="margin:10px; height:45%; color:black; background-color:rgba(202, 209, 219, 0.2); ">
        <div class="card-body" style="overflow-y:auto; height:80%;">
        <h5 style="text-align:center; font-weight:bold;"><?= esc($datas_item['name']) ?></h5>
        <div class="rounded" style="background-image:url(<?= base_url(); ?>/images/sponsor_logos/<?= esc($datas_item['img'])?>); background-size:cover; background-repeat:no-repeat; background-position:center; width:6vw; height:12vh; float:left; margin:4px; margin-right:8px;">
        </div>
        <h5><?= esc($datas_item['info']) ?></h5>
       
        </div>

        <?php if(session()->get('username')=="admin"){
               echo "<button type=\"submit\" class=\"btn btn-danger\" onclick=\"openModal('myModal'+".$datas_item["id"].");\">Szerkeszt</button>";
                
                echo '<form class="rounded" method="post" action="/sponsors/deleteSuper">
                       
                        <input type="hidden" value="'.$datas_item['id'].'" name="id">
                        
                        <button type="submit" class="btn btn-danger">Töröl</button>
                    
                    </form>';
              }
            ?>
       
        <div id="myModal<?= $datas_item['id'] ?>" class="modal">
            <span class="close cursor" onclick="closeModal('myModal'+<?php echo $datas_item['id'] ?>)">&times;</span>
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
    </div>
<?php $db++;
    endif;
    endforeach; ?>
 </div>
