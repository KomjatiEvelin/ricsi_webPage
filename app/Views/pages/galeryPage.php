<div class="content d-flex flex-wrap p-3 mt-2 mb-2 mr-3 rounded justify-content-center" style="min-height:90%; width:100%; color:black; background-color:rgba(255, 255, 255, 0.5);">
<?php if (! empty($images) && is_array($images)) :
foreach ($years as $years_item): ?>
    <h3 style="width:100%; text-align:center; height:fit-content; font-size:3vh;">
    <?php echo $years_item['year']; ?>
    <?php if(session()->get('username')=="admin"){
            echo '<form class="rounded" method="post" action="/galery/deleteYear">    
                    <input type="hidden" value="'.$years_item['year'].'" name="year">
                    <button type="submit" class="btn btn-danger">Évszám törlése</button>
                  </form>';
                }
            ?>
    </h3>
    <h6 style="width:100%; text-align:center; height:fit-content; font-size:2vh;"><?php if($years_item['text']!=null) echo $years_item['text'];?></h6>
   
    <?php
    $db=0;
    foreach ($images as $images_item): 
        $db++;
    if($years_item['year']==$images_item['year']):?>
    <div style="height:fit-content; width: fit-content;"> 
    
    <img onclick="openModal();currentSlide(<?php echo $db ?> )" src="<?= base_url(); ?>/galeryImages/<?= esc($images_item['name'])?>" alt="<?= esc($images_item['name'])?>" style="width:10vw; height:10vh; margin:3px;">
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
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content" style=" height:90%; width:90%;">
  <?php foreach ($images as $images_item): ?>
    <div class="mySlides" style=" max-height:90%; max-width:90%; margin-left:auto; margin-right:auto; margin-top:auto; margin-bottom:auto;">
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <img src="<?= base_url();?>/galeryImages/<?= esc($images_item['name'])?>" style="max-width:100%; max-height:100%;">
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    
  <?php endforeach; ?>
   
  </div>
</div>
</div>

<style>

.modal {
  display: none;
  z-index: 1;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background-color: black;
}

/* Modal Content */
.modal-content {
  background-color: black;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}

.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
  background-color: rgba(255,255,255,0.8);
}

.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

</style>

<?php else : ?>
    <h5>Jelenleg nincsenek képek feltöltve, nézzen vissza később!</h5>

<?php endif; ?>
</div>

<script>
// Open the Modal
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
 
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  
  slides[slideIndex-1].style.display = "block";
  
}
</script>