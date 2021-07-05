<div class="content d-flex flex-wrap p-3 mt-2 mb-2 mr-3 rounded justify-content-center" style="min-height:90%; width:100%; color:black; background-color:rgba(255, 255, 255, 0.6);">
<?php if (! empty($datas) && is_array($datas)) : ?>


    <?php foreach ($datas as $datas_item):
        $size;
        switch($datas_item['level']){
            case 1: 
                $size=100;
                break;
            case 2:
                $size=130;
                break;
            case 3:
                $size=170;
                break;
            case 4:
                $size=210;
                break;
            case 5:
                $size=250;
                break;
            default:
                $size=100;
                break;
            }
        if($datas_item['level']<10): ?>
       
        <div class="rounded sponsor-container"  style="margin:5px; padding:2px; height:fit-content; min-width:25%; max-width:40%; text-align:center;">
        <div onclick="openModal('myModal'+<?php echo $datas_item['id'] ?>);">
            <h5><?= esc($datas_item['name']) ?></h5>
            <img src="<?= base_url(); ?>/images/<?= esc($datas_item['img'])?>" alt="logo" style="width:<?= $size ?>px; max-width:100%;">
            <p style="overflow:hidden; word-break: normal; max-height:5vh;"><?= esc($datas_item['info']) ?></p>
            <p style="color:blue;">... Részletek</p></div>
            <?php if(session()->get('username')=="admin"){
               echo '<form class="rounded" method="post" action="/sponsors/delete">
                       
                        <input type="hidden" value="'.$datas_item['id'].'" name="id">
                        
                        <button type="submit" class="btn btn-danger">Töröl</button>
                    
                    </form>';
                }
            ?>
        </div>
        <div id="myModal<?= $datas_item['id'] ?>" class="modal" style=" overflow-y:auto;">
            <span class="close cursor" onclick="closeModal('myModal'+<?php echo $datas_item['id'] ?>)">&times;</span>
            <div class="modal-content" style="text-align:center; word-wrap: break-word;">
            <?php $key = array_search($datas_item['id'], array_column($datas, 'id')); ?>
            <h5><?php echo $datas[$key]['name'] ?></h5>
            <img src="<?= base_url(); ?>/images/<?= esc($datas_item['img'])?>" alt="logo" style="margin-left: auto; margin-right: auto; width:300px; max-width:90%; padding:5px;">
            <p><?php echo $datas[$key]['info'] ?></p>
            </div>
        </div>
        <?php endif; endforeach; ?>


<?php else : ?>

    <h3>Nem találtunk adatot</h3>

    <h5>Adatbázis lekérdezési problémába ütköztünk, nézzen vissza később!</h5>

<?php endif; ?>
</div>
