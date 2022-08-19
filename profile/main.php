<main class="[ profile_main ] [ flex ] [ flex_direction_column ]">
    <span class="profile_name"><label>Name:</label><span><?php echo $_SESSION['name'] ?></span></span>
    <button type="button" onclick="dispPass();">Change Password</button>
    <form onsubmit="changePass(); return false;" class="[ input_icon ][ flex ] [ flex_direction_column ] [ profile_password ]" id="profile_password" data-value="none" novalidate>
        <input type="password" name="curpassword" id="curpassword" class="" placeholder="Enter your current password">
        <input type="password" name="password" id="password" class="" placeholder="Enter your new password">
        <input type="password" name="cpassword" id="cpassword" class="" placeholder="Enter your comform password">
        <button type="submit">Change</button>
    </form>

    <button type="button" onclick="dispFeed();">Feedback</button>

    <form onsubmit="submitFeedback(); return false;" class="[ flex ] [ flex_direction_column ] [ justify_content_center ] [ align_center ] [ feedback ]" id="feedback_form" data-type="none" novalidate>
    <textarea name="feedback" id="feedback" cols="30" rows="10" max="200" placeholder="Only 200 words allowed"></textarea>
    <button type="submit">Change</button>
    </form>

    <button onclick="logOut();" class="[ logout_btn ]">Logout</button>
</main>