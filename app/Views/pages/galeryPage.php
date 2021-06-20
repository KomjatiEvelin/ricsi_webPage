<div class="content d-flex flex-wrap p-3 mt-2 mb-2 mr-3 rounded justify-content-center" style="min-height:90%; width:100%; color:black; background-color:rgba(255, 255, 255, 0.5);">
<?php if (! empty($images) && is_array($images)) :
foreach ($years as $years_item): ?>
    <h3 style="width:100%; text-align:center; height:fit-content; font-size:3vh;">
    <?php echo $years_item['year']; ?>
    </h3>
    <h6 style="width:100%; text-align:center; height:fit-content; font-size:2vh;"><?php if($years_item['text']!=null) echo $years_item['text'];?></h6>
    <?php
    foreach ($images as $images_item): 
    if($years_item['year']==$images_item['year']):?>
    <div style="height:fit-content; width: fit-content;"> 
    <img src="<?= base_url(); ?>/galeryImages/<?= esc($images_item['name'])?>" alt="<?= esc($images_item['name'])?>" style="width:10vw; height:10vh; margin:3px;">
       <?php if(session()->get('username')=="admin"){
            echo '<form class="rounded" method="post" action="/galery/delete">    
                    <input type="hidden" value="'.$images_item['id'].'" name="id">
                    <input type="hidden" value="'.$images_item['name'].'" name="name">
                    <button type="submit" class="btn btn-danger">Töröl</button>
                  </form>';
                }
            ?>
    </div>
           
<?php  endif; endforeach; endforeach;?>

<?php else : ?>
    <h5>Jelenleg nincsenek képek feltöltve, nézzen vissza később!</h5>

<?php endif; ?>
</div>