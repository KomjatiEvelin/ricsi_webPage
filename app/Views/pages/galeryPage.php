<div class="content p-3 mt-2 mb-2 mr-3 rounded justify-content-center" style="min-height:90%; width:100%; color:black; background-color:rgba(255, 255, 255, 0.5);">
<?php if (! empty($years) && is_array($years)) :
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
    
    
    <h6 style="width:100%; text-align:center; height:fit-content; font-size:2vh;">
    <?php if($years_item['text']!=null) echo $years_item['text'];?></h6>
    <hr style="border-top:1px solid black; width:70%;">
   
    <div style="height:fit-content; width: 100%; vertical-align:middle; text-align:center">
      <?php
        $db=0;
  
        foreach ($images as $images_item): 
          $db++;
          if($years_item['year']==$images_item['year']):?>
          
            <img onclick="openModal('myImageModal');currentSlide(<?php echo $db ?> )" src="<?= base_url(); ?>/galeryImages/<?= esc($images_item['name'])?>" alt="<?= esc($images_item['name'])?>" style="width:10vw; height:5vw; margin:3px;">
            <?php if(session()->get('username')=="admin"){
                    echo '<form method="post" action="/galery/delete">    
                            <input type="hidden" value="'.$images_item['id'].'" name="id">
                            <input type="hidden" value="'.$images_item['name'].'" name="name">
                            <button type="submit" class="btn btn-danger">Töröl</button>
                          </form>';
                  }
          endif; 
        endforeach; 
      endforeach; ?>
    </div>
</div>

<div id="myImageModal" class="modal">
  <span class="close cursor" onclick="closeModal('myImageModal')">&times;</span>
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

<?php else : ?>
    <h5>Jelenleg nincsenek képek feltöltve, nézzen vissza később!</h5>

<?php endif; ?>
</div>

<style>

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

<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
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