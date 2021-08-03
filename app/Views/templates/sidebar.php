<div class="sidebar p-0 mr-2" style="color:grey; height:100%; width:15%; overflow: hidden; flex:100%;">

<?php 
    $db=0;
    foreach ($datas as $datas_item): 
    if($datas_item['level']>5&&$db<2):
    ?> 

    <div class="card flip-box" style="margin-top:25px; height:45%; color:white; background-color:rgba(0, 0, 0, 0); border:0pt;">
        <div class="card-body flip-box-inner" style="height:100%; width:100%; background-color:rgba(0, 0, 0, 0.5);">
            <div class="flip-box-front" style="text-align:center; height:350px; max-height:90%; max-width:90%; padding:2px; overflow:hidden;">
                <h5 id="card-title" style="font-size:2vh; padding:1px;">Kiemelt támogatónk</h5>
                <h5 style="font-size:2.3vh; font-weight:bold; padding:1px;"><?= esc($datas_item['name']) ?></h5>
                <div class="rounded-lg" style="background-image:url(<?= base_url(); ?>/images/sponsor_logos/<?= esc($datas_item['img'])?>); background-size:cover; background-repeat:no-repeat; background-position:center; height:80%; width:90%; margin:2px; margin-left:auto; margin-right:auto; ">
                </div>
            </div>
            <div class="flip-box-back" style="height:90%; width:90%; world-break:normal; overflow-y:auto;">
                <h5 style="font-size:2vh; color:white; padding:5px; margin:2px;"><?= esc($datas_item['info']) ?></h5>
            </div>
       
        </div>

        <?php if(session()->get('username')=="admin"){
               echo "<button type=\"submit\" class=\"btn btn-danger\" onclick=\"openModal('myModal'+".$datas_item["id"].");\">Szerkeszt</button>";
                
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