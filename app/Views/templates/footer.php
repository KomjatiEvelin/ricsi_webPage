</div>
</div>
<div class="footer p-2 m-2 rounded text-white" style="background-color:rgba(33, 37, 41,0.8); flex: 0 0 10%;">
  <div style="width:fit-content; margin-left:auto; margin-right:auto;" >
  <?php if (! empty($datas) && is_array($datas)) : 
    
    $footer=array();
    foreach($datas as $item){
      if($item['level']>=3&&$item['level']<10){
       array_push($footer,$item);
      }
    }
    
    $db=count($footer)>10?10:count($footer);
    
     for($i=0; $i<$db/2;$i++): ?>
      <img class="logo-footer" src="<?= base_url(); ?>/images/sponsor_logos/<?= esc($footer[$i]['img'])?>" alt="szponzor logo" style="max-width:7vw; max-height:60px; padding:0.2vw; float:left;">
      <?php  endfor; ?>
    <p class="p-1 m-0 text-center footer-text" style="float:left; margin-left: 25px!important; margin-right:25px!important;">Dumity Richárd<br>&copy;2021</p>
    <?php 
     for($i=$db/2; $i<$db; $i++): ?>
      <img class="logo-footer" src="<?= base_url(); ?>/images/sponsor_logos/<?= esc($footer[$i]['img'])?>" alt="szponzor logo" style="max-width:7vw; max-height:60px; padding:0.2vw; float:left;">
      <?php endfor; endif; ?>
    </div>
</div>
</div>
</body>

<style>

  html *{
    font-family: Georgia, serif;
  }
  @media only screen and (max-width: 1000px) {
      
    #maincontainer{
      width:100%!important;
      margin:5px;
    }

    #maincontainer::-webkit-scrollbar {
      display: none;
    }

    #maincontainer {
      -ms-overflow-style: none;  /* IE and Edge */
      scrollbar-width: none;  /* Firefox */
    }

    .logo-footer{
      display:none;
    }

    #first-img{
      width:150px!important;
    }

    .contact-card{
      clear:both;
    }

    @media (orientation: landscape) {
      .sponsorbar{
        display:none!important;
      }

      .footer{
        font-size:10px;
      }

      #mobilenav{
        overflow-y:auto!important;
      }

      .header-text{
        font-size:20px!important;
      }
    }

  }

  

  .modal {
    display: none;
    z-index: 1;
    padding-top: 50px;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.8);
  }


  .modal-content {
    position: relative;
    margin: auto;
    padding: 10px;
    width: 60%;
    background-color: rgba(255,255, 255, 0.8);
  }

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

  .mySlides {
    display: none;
  }

  .sponsorbar{
    display:none;
  }

  @media only screen and (max-width: 1000px) {
    .sponsorbar{
          display:block;
      }
  }

    #mobilenav{
        display:none;
    }
    #mobilenav a {
      
      color: black;
      padding: 14px 16px;
      display: block;
      font-weight:bold;
    }

    #hamburger span
    {
      display: block;
      width: 33px;
      height: 4px;
      margin: 5px;
      position: relative;
      background: white;
      border-radius: 3px;
      
      z-index: 1;
  
    }

    #hamburger{
      position: absolute;
      top:0;
      right:0;
      margin:20px;
    }

    @media only screen and (max-width: 1000px) {
        #desktopnav{
            display:none;
        }

        #mobilenav{
            display: block;
        }
        
    }

    .card-body::-webkit-scrollbar {
      display: none;
    }

    .card-body {
      -ms-overflow-style: none;  /* IE and Edge */
      scrollbar-width: none;  /* Firefox */
    }

    @media only screen and (max-width: 1000px) {
        .sidebar{
              display:none;
          }

        .sponsor-container{
             max-width:90%!important;
        }

        .modal-content {
          width: 85%;
        }
    }

    

</style>

<script>
// Open the Modal
function openModal(id) {
  let modalName=id;
  document.getElementById(modalName).style.display = "block";
}

// Close the Modal
function closeModal(id) {
  let modalName=id;
  document.getElementById(modalName).style.display = "none";
}
</script>

</html>