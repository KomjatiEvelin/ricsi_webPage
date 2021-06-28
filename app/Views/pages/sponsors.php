<div class="content d-flex flex-wrap p-3 mt-2 mb-2 mr-3 rounded justify-content-center" style="min-height:90%; width:100%; color:black; background-color:rgba(255, 255, 255, 0.6);">
<?php if (! empty($datas) && is_array($datas)) : ?>


    <?php foreach ($datas as $datas_item):
        $size;
        switch($datas_item['level']){
            case 1: 
                $size=20;
                break;
            case 2:
                $size=25;
                break;
            case 3:
                $size=30;
                break;
            case 4:
                $size=35;
                break;
            case 5:
                $size=40;
                break;
            default:
                $size=20;
                break;
            }
        if($datas_item['level']<10): ?>
       
        <div class="rounded"  style="margin:5px; padding:2px; height:fit-content; width:25%; text-align:center;">
        <div onclick="openModal('myModal'+<?php echo $datas_item['id'] ?>);">
            <h5 style="font-size:2.3vh;"><?= esc($datas_item['name']) ?></h5>
            <img src="<?= base_url(); ?>/images/<?= esc($datas_item['img'])?>" alt="logo" style="width:<?= $size ?>%;">
            <p style="font-size:1.6vh; overflow:hidden; word-break: break-all; height:5vh;"><?= esc($datas_item['info']) ?></p>
            <p style="color:blue; font-size:1.6vh;">... Részletek</p></div>
            <?php if(session()->get('username')=="admin"){
               echo '<form class="rounded" method="post" action="/sponsors/delete">
                       
                        <input type="hidden" value="'.$datas_item['id'].'" name="id">
                        
                        <button type="submit" class="btn btn-danger">Töröl</button>
                    
                    </form>';
                }
            ?>
            
        </div>
        <div id="myModal<?= $datas_item['id'] ?>" class="modal">
            <span class="close cursor" onclick="closeModal('myModal'+<?php echo $datas_item['id'] ?>)">&times;</span>
            <div class="modal-content" style="text-align:center;">
            <?php $key = array_search($datas_item['id'], array_column($datas, 'id')); ?>
            <h5><?php echo $datas[$key]['name'] ?></h5>
            <img src="<?= base_url(); ?>/images/<?= esc($datas_item['img'])?>" alt="logo" style="margin-left: auto; margin-right: auto; width:15%;">
            <p><?php echo $datas[$key]['info'] ?></p>
            </div>
        </div>
        <?php endif; endforeach; ?>


<?php else : ?>

    <h3>Nem találtunk adatot</h3>

    <h5>Adatbázis lekérdezési problémába ütköztünk, nézzen vissza később!</h5>

<?php endif; ?>
</div>
