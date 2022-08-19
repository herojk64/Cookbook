

<main class="[ login_main ] [ flex ]">
    <form onsubmit="loginCheck(); return false;" method="POST" class="[ flex ] [ flex_direction_column ]" novalidate>
        <h4>Welcome</h4>
        <h1>Login to you'r account</h1>
        <p>Do not have account yet? <a href="../register/#">Register</a></p>
        <p class="error_msg" id="error_msg">Error Message: Either email or password is incorrect.</p>
    <span class=" incont flex flex_direction_column">
        
        <span class="input_icon">
        
        <input type="email" name="email" id="email" class="email" placeholder="Enter your email">
        <img src="../images/email.svg" alt="email icon">
        </span>
        
        
        <span class="input_icon">
            
        <input type="password" name="password" id="password" class="password" placeholder="Enter your password">
        <img src="../images/password.svg" alt="eye icon">
        </span>
        

    </span>
        
        <span class="input_btns flex align_center justify_content_center">
            <button type="button" class="forgotBtn" id="forgotBtn">Forgot Password</button>
            <button type="submit" class="LoginBtn" id="LoginBtn">Login</button>
        </span>
</form>
</main>

<?php
    
?>