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

btnPopup.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
    cleanForms();
});

iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});

function cleanForms(){
    document.getElementById("formLogin").reset();
    document.getElementById("formRegister").reset();
}

// js code to show/hide password and change icon
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
