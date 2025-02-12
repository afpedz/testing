

<link rel="stylesheet" href="../style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<form method="post" id="registerform">
    <h2 style="text-align: center;">Create an account</h2>
    <input type="text" name="username" required placeholder="Username">
    <input type="password" name="password" required placeholder="Password">
    <input type="hidden" name="action" value="register">
    <button type="submit">Register</button>
</form>
<p class="footer">Already have an account? <a href="login.php" style="text-decoration: none;">Login here</a></p>

<script>
$(document).ready(function() {
    $("#registerform").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "../model/auth.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    alert(response.message);
                    window.location.href = "../view/login.php"; 
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert("An error occurred. Please try again.");
            }
        });
    });
});
</script>