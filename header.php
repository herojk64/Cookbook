
<header class="[ flex ] [ flex_direction_column ]">
    
    <nav class="[ flex ] [ align_center ] [ justify_space_between ] [ header_spacing ]">
        <a herf="#"><img src="./images/logo.png" class="cookbook_logo" alt="logo"></a>
        <ol class="flex align_center">
            <li><a href="#">Home</a></li>
            <li><a href="./discover/#">Discover</a></li>
            <li><a id="contact" onclick="contactDirect()">Contacts</a></li>
            <li><span class="profile_pic"><a href="#"><img src="./profile/<?php echo $defaultProfile;?>" alt="profile picture"></a></span><a href="<?php echo $login;?>"><?php echo $profileName;?></a></li>
        </ol>
    </nav>
    <form class="[ search_section ]" role="Search" novalidate>
        <div class="[ flex ] [ flex_direction_column ] ">
        <h1>Explore The World Of Recipe</h1>
        <span class="[ flex ]">
        <p>Search <img src="./images/Arrow.png" alt="arrow"></p>
        <input onkeydown="searchEngine(this.value)" onkeyup="searchEngine(this.value)" type="text" name="search" id="search"  placeholder="Enter to search recipe">
        <div class="[ search_display ]" id="search_display">

        </div>
        <button onclick="searchSections(this.parentElement.children[1].value);"  type="button"><img src="./images/search.svg" alt="search logo"></button>
        </span>
        </div>
    </form>
</header>