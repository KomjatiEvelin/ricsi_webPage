</div>
</div>
<div class="footer p-2 m-2 rounded bg-dark text-white flex: 0 0 20%;">
    <p class="p-1 m-0 text-center">Dumity Richárd<br>&copy;2021</p>
</div>
</div>
</body>

<style>
  @media only screen and (max-width: 800px) {
      
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
    width: 80%;
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

  @media only screen and (max-width: 800px) {
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

    @media only screen and (max-width: 800px) {
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

    @media only screen and (max-width: 800px) {
        .sidebar{
              display:none;
          }

        .sponsor-container{
             max-width:90%!important;
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