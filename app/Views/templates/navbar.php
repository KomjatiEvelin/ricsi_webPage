<div class="ml-2 mr-2 navbar rounded navbar-light bg-light" style="font-size:2.2vh;">
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