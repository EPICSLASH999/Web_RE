<?php defined('APP') or die('Direct script access denied!'); ?>

<div id="divLogin" class="divLogin">
    <div class="wrapper class_login">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>
        <!-- LOGIN FORM -->
        <div class="form-box login">
            <h2>Login</h2>
            <form onsubmit="login.submit(event)" autocomplete="off" action="#" id ="formLogin">
                <div class="input-box">
                    <input type="email" autocomplete="off" name="email" required>
                    <label>Email</label>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="password" autocomplete="new-password" name="password" required>
                    <label>Password</label>
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>
                <div class="remember-forgot">
                    <!--<label><input type="checkbox"> 
                    Remember me</label>-->
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <!-- REGISTER FORM -->
        <div class="form-box register">
            <h2>Registration</h2>
            <form onsubmit="signup.submit(event)" method="post" autocomplete="off" id="formRegister">
                <div class="input-box">
                    <input type="text" autocomplete="off" name="username" required>
                    <label>Username</label>
                    <i class="uil uil-user"></i>
                </div>
                <div class="input-box">
                    <input type="email" autocomplete="off" name="email" required>
                    <label>Email</label>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="password" name="password" autocomplete="new-password" required>
                    <label>Password</label>
                    <i class="uil uil-lock icon"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="password" name="retype_password" autocomplete="new-password" required>
                    <label>Confirm Password</label>
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> 
                    I agree to the terms & conditions</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    /* START OF CODE FOR LOGIN&REGISTER POPUPS EVENTS */
    const wrapper = document.querySelector('.wrapper');
    const loginLink = document.querySelector('.login-link');
    const registerLink = document.querySelector('.register-link');
    const btnPopup = document.querySelector('.btnLogin-popup');
    const iconClose = document.querySelector('.icon-close');

    registerLink.addEventListener('click', ()=> {
        wrapper.classList.add('active');
        cleanForms();
    });

    loginLink.addEventListener('click', ()=> {
        wrapper.classList.remove('active');
    });
    
    // If there is no acttive sesion.
    // The button exists, so its true.
    if (btnPopup) 
    {
        btnPopup.addEventListener('click', ()=> {
            wrapper.classList.add('active-popup');
            cleanForms();
        });
    }

    iconClose.addEventListener('click', ()=> {
        wrapper.classList.remove('active-popup');
    });

    function cleanForms(){
        document.getElementById("formLogin").reset();
        document.getElementById("formRegister").reset();
    }

        /* START OF CODE FOR SHOW/HIDE PASSWORD AND EYE-ICON */
        const container = document.querySelector('.wrapper'),
        pwShowHide = document.querySelectorAll('.showHidePw'),
        pwFields = document.querySelectorAll('.password');


        pwShowHide.forEach(eyeIcon => {
            
            eyeIcon.addEventListener("click", ()=>{
                
                pwFields.forEach(pwField =>{
                    if (pwField.type === "password"){
                        pwField.type = "text";

                        pwShowHide.forEach(icon =>{
                            icon.classList.replace("uil-eye-slash", "uil-eye");
                        })
                    } else{
                        pwField.type = "password";

                        pwShowHide.forEach(icon =>{
                            icon.classList.replace("uil-eye", "uil-eye-slash");
                        })
                    }
                })
            })
        })
        /* END OF CODE FOR SHOW/HIDE PASSWORD AND EYE-ICON */
        
    /* END OF CODE FOR LOGIN&REGISTER POPUPS EVENTS */

    /* START OF CODE FOR LOGIN */
    var login = {

        show: function(){
            document.querySelector('.wrapper').classList.add('active-popup');
        },
        
        hide: function(){
            document.querySelector(".wrapper").classList.remove('active-popup');
        },

        submit: function(e){
            e.preventDefault();
            let inputs = e.currentTarget.querySelectorAll("input");
            let form = new FormData();

            for (var i = inputs.length - 1; i >= 0; i--) {
                form.append(inputs[i].name, inputs[i].value);
            }

            form.append('data_type', 'login');
            var ajax = new XMLHttpRequest();

            ajax.addEventListener('readystatechange',function(){

                if(ajax.readyState == 4)
                {
                    if(ajax.status == 200){

                        let obj = JSON.parse(ajax.responseText);
                        
                        if(!obj.success){
                            setPopup(2, obj.message);
                        } else{
                            //alert(obj.message);
                        }
                        

                        if(obj.success)
                            window.location.reload();

                        
                    }else{
                        alert("Please check your internet connection");
                    }
                }
            });

            ajax.open('post','ajax.inc.php', true);
            ajax.send(form);
        },

    };
    /* END OF CODE FOR LOGIN */

    /* START OF CODE FOR REGISTER */
    var signup = { 

        show: function(){
            document.querySelector(".js-signup-modal").classList.remove('hide');
            document.querySelector(".js-login-modal").classList.add('hide');
        },

        hide: function(){
            document.querySelector(".js-signup-modal").classList.add('hide');
        },

        submit: function(e){

            e.preventDefault();
            let inputs = e.currentTarget.querySelectorAll("input");
            let form = new FormData();

            for (var i = inputs.length - 1; i >= 0; i--) {
                form.append(inputs[i].name, inputs[i].value);
            }

            form.append('data_type', 'signup');
            var ajax = new XMLHttpRequest();

            ajax.addEventListener('readystatechange',function(){

                if(ajax.readyState == 4)
                {
                    if(ajax.status == 200){

                        //console.log(ajax.responseText);
                        let obj = JSON.parse(ajax.responseText);
                        if(!obj.success){
                            setPopup(2, obj.message);
                        } else{
                            //alert(obj.message);
                        }

                        if(obj.success)
                            window.location.reload();

                        
                    }else{
                        alert("Please check your internet connection");
                    }
                }
            });

            ajax.open('post','ajax.inc.php', true);
            ajax.send(form);
        },


    };
    /* START OF CODE FOR REGISTER */


</script>