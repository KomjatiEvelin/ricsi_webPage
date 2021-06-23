<style>
   
    
    #mobilenav{
        display:none;
    }
    #mobilenav a {
        color: black;
        padding: 14px 16px;
        display: block;
        font-weight:bold;
    }


    #hamburger-icon {
        width:70px;
        height:50px;
        position:relative;
        display:block;
    }
    
    #hamburger-icon  .line {
            display:block;
            background-color:white;
            width:60%;
            height:10%;
            position:absolute;
            left:0;
            border-radius:4px;
    }
            
    #hamburger-icon .line-1 {
        top:0;
    }
    #hamburger-icon .line-2 {
        top:30%;
    }
    
    #hamburger-icon .line-3 {
        top:60%;
    }

    @media only screen and (max-width: 800px) {
        #desktopnav{
            display:none;
        }

        #mobilenav{
            display: block;
        }
        
    }
}
</style>
<div class=" ml-2 mr-2 navbar rounded navbar-light bg-light" id="desktopnav" style="font-size:2.2vh;">
    <a style="text-decoration:none; color:black;" href="/home">Kezdőlap</a>
    <a style="text-decoration:none; color:black;" href="/mystory" target="_self">Történetem</a>
    <a style="text-decoration:none; color:black;" href="/sport" target="_self">A sportágról</a>
    <a style="text-decoration:none; color:black;" href="/credentials" target="_self">Ajánlások</a>
    <a style="text-decoration:none; color:black;" href="/sponsors" target="_self">Szponzorok</a>
    <a style="text-decoration:none; color:black;" href="/contact" target="_self">Kapcsolat</a>
    <a style="text-decoration:none; color:black;" href="/galery" target="_self">Galéria</a>
    <?php if(session()->get('username')=="admin"){
                echo '<a style="text-decoration:none; color:black;" href="/logout" target="_self">Kijelentkezés</a>';
                echo '<a style="text-decoration:none; color:black;" href="/upload" target="_self">Feltöltés</a>';
        }

    ?>
</div>

<div id="mobilenav" >
    <div class="p-1 ml-2 mr-2 rounded bg-light" style="color:black; text-align:center;" href="javascript:void(0);" onclick="myFunction();">
       <h5>Menü</h5>
    </div>
    <div id="links" style="display: none; background-color:rgba(202, 209, 219, 0.5);">
        <a style="text-decoration:none;" href="/home">Kezdőlap</a>
        <a style="text-decoration:none;" href="/mystory" target="_self">Történetem</a>
        <a style="text-decoration:none;" href="/sport" target="_self">A sportágról</a>
        <a style="text-decoration:none;" href="/credentials" target="_self">Ajánlások</a>
        <a style="text-decoration:none;" href="/sponsors" target="_self">Szponzorok</a>
        <a style="text-decoration:none;" href="/contact" target="_self">Kapcsolat</a>
        <a style="text-decoration:none;" href="/galery" target="_self">Galéria</a>
        <?php if(session()->get('username')=="admin"){
                    echo '<a style="text-decoration:none; color:black;" href="/logout" target="_self">Kijelentkezés</a>';
                    echo '<a style="text-decoration:none; color:black;" href="/upload" target="_self">Feltöltés</a>';
            }

        ?>
    </div>
    
</div>

<script>
function myFunction() {
  var x = document.getElementById("links");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

}

</script>

