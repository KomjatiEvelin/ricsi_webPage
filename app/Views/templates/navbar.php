<div class=" ml-2 mr-2 navbar rounded navbar-light" id="desktopnav" style="font-size:18px; font-weight:bold; background-color:rgba(255, 255, 255,0.8);">
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

<div id="mobilenav">
    <div class="p-1 ml-2 mr-2 rounded " id="hamburger" style="color:black; text-align:center; width: fit-content;" onclick="openModal('menuModal');">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <div id="menuModal" class="modal" style="overflow-y:auto; text-align:center;">
            <span class="close cursor" onclick="closeModal('menuModal');">&times;</span>
            <div class="modal-content"  id="links" >
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
    
</div>
