document.getElementById("resetPassword").addEventListener("submit", function(event) {
    event.preventDefault(); 

    
    document.getElementById("resetPasswordMessage").style.display = "block";

    
    this.reset();
});



