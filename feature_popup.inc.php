
    <div class="popup" id="popup">
        <img id="pImg" src="assets/images/popup/tick.png">
        <h2 id="pTitle">Thank You!</h2>
        <p id="pText">Your details have been successfully submitted. Thanks!</p>
        <button type="button" onclick="closePopup()">OK</button>
    </div>


    <script>
        let popup = document.getElementById("popup");

        function openPopup(){
            popup.classList.add("open-popup");
        }
        function closePopup(){
            popup.classList.remove("open-popup");
        }

        function setPopup(type, text){
            if (type == 2){
                document.getElementById("pImg").src="assets/images/popup/cross.png";
                document.getElementById("pTitle").innerHTML = "Whoops!";
            } 
            
            document.getElementById("pText").innerHTML = text;

            openPopup();
        }

    </script>
 