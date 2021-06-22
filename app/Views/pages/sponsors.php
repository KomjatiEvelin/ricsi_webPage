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
        <div onclick="openModal(<?php echo $datas_item['id'] ?>);">
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
            <span class="close cursor" onclick="closeModal(<?php echo $datas_item['id'] ?>)">&times;</span>
            <div class="modal-content">
            <?php $key = array_search($datas_item['id'], array_column($datas, 'id')); ?>
            <h5><?php echo $datas[$key]['name'] ?></h5>
            <img src="<?= base_url(); ?>/images/<?= esc($datas_item['img'])?>" alt="logo" style="width:<?= $size ?>%;">
            <p><?php echo $datas[$key]['info'] ?></p>
            </div>
        </div>
        <?php endif; endforeach; ?>


<?php else : ?>

    <h3>No Data</h3>

    <h5>Unable to find any data for you.</h5>

<?php endif; ?>
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