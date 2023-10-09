<div class="menu">
    <ul>
        <li <?php if ($page == "Home") echo "class='active'"; ?>> <a href="/Home">Home</a></li>
        <li <?php if ($page == "Restaurant") echo "class='active'"; ?>> 
            <?php isset($_SESSION['login']) ? $link = "/Restaurants" : $link = "/Login"; ?>
            <a href=<?php echo $link; ?>>Restaurant</a>
        </li>
        <li <?php if ($page == "Profile") echo "class='active'"; ?>>
            <?php isset($_SESSION['login']) ? $link = "/Profile" : $link = "/Login"; ?>
            <a href=<?php echo $link; ?>>Profile</a> 
        </li>
    </ul>
</div>