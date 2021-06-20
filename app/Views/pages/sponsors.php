<div class="content d-flex flex-wrap p-3 mt-2 mb-2 mr-3 rounded justify-content-center" style="min-height:90%; width:100%; color:black; background-color:rgba(255, 255, 255, 0.6);">
<?php if (! empty($datas) && is_array($datas)) : ?>


    <?php foreach ($datas as $datas_item):
        if($datas_item['level']<10): ?>
       
        <div class="rounded" style="margin:5px; padding:2px; height:fit-content; width:25%; text-align:center; ">
        <a href="#" style="text-decoration:none; color:black;">
            <h5 style="font-size:2.3vh;"><?= esc($datas_item['name']) ?></h5>
            <img src="<?= base_url(); ?>/images/<?= esc($datas_item['img'])?>" alt="logo" style="width:<?=esc($datas_item['level'])>2? "40%": "25%"; ?>;">
            <p style="font-size:1.6vh;"><?= esc($datas_item['info']) ?></p>
            <p style="color:blue; font-size:1.6vh;">... Részletek</p>
            <?php if(session()->get('username')=="admin"){
               echo '<form class="rounded" method="post" action="/sponsors/delete">
                       
                        <input type="hidden" value="'.$datas_item['id'].'" name="id">
                        
                        <button type="submit" class="btn btn-danger">Töröl</button>
                    
                    </form>';
                }
            ?>
            </a>
        </div>
        <?php endif; endforeach; ?>

<?php else : ?>

    <h3>No Data</h3>

    <h5>Unable to find any data for you.</h5>

<?php endif; ?>
</div>