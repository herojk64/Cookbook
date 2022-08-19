<main class="register_main">
    <form onsubmit="userRegister(); return false;" id="registerForm"  method="POST" class="[ flex ] [ flex_direction_column ]" novalidate><!--  onsubmit="userRegister(); return false;" -->
        <h4>Start for free</h4>
        <h1>Create new account</h1>
        <p>Already a member? <a href="../login/#">Login</a></p>
      
            
            <span class="reg_reset">
                <input type="text" name="fname" id="fname" placeholder="First name" required>
            <input type="text" name="lname" id="lname" placeholder="Last name" required>
</span>
            
            <span><input type="email" name="email" id="email" placeholder="Email" required></span>
            
            <span><input type="password" name="password" id="password" placeholder="Password" required></span>
            
            <span class="reg_btn"><button type="submit" class="submit" id="submit">Create account</button>
            </span>
           
</form>

</main>