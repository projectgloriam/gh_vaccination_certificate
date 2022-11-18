        <script>
            function logout() {
                document.getElementById("logout").submit();
            }

            function setSmtpAuth(e) { // take the event as parameter
                e.preventDefault(); // stop the submission

                // Get the modal
                var modal = document.getElementById("emailAuthModal");  

                modal.style.display = "block";

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

                var smtpButton = document.getElementById("smtpButton");

                smtpButton.onclick = function(event) {
                    e.preventDefault(); //Play safe
                    var smtpEmail = document.getElementById("smtpEmail").value;
                    var smtpPassword = document.getElementById("smtpPassword").value;

                    if(smtpEmail=="" || smtpPassword==""){
                        alert("Please fill your Gmail email and password");
                    } else {
                        newUserForm.submit();
                    }
                }
            }

            var newUserForm = document.getElementById("newUser");
            newUserForm.addEventListener('submit', setSmtpAuth);
        </script>
    </body>
</html>