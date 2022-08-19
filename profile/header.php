
<header class="[ flex ] [ flex_direction_column ]">
    
    <nav class="[ flex ] [ align_center ] [ justify_space_between ] [ header_spacing ]">
        <a herf="#"><img src="../images/logo.png" class="cookbook_logo" alt="logo"></a>
        <ol class="flex align_center">
            <li><a href="../#">Home</a></li>
            <li><a href="../discover/#">Discover</a></li>
            <li><a id="contact" onclick="contactDirect()">Contacts</a></li>
            <li><span class="profile_pic"><a href="#"><img src="../profile/<?php echo $defaultProfile;?>" alt="profile picture"></a></span><a href="<?php echo $login;?>"><?php echo $profileName; ?></a></li>
        </ol>
    </nav>
</header>
