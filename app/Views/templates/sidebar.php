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
               echo '<form class="rounded" method="post" action="/sponsors/update">
                       
                        <input type="hidden" value="'.$datas_item['id'].'" name="id">
                        
                        <button type="submit" class="btn btn-danger">Szerkeszt</button>
                    
                    </form>';
                }
            ?>
        </div>
    </div>
<?php $db++;
    endif;
    endforeach; ?>
 </div>