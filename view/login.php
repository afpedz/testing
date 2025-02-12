

<link rel="stylesheet" href="../style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<form method="post" id="loginform">
    <h2 style="text-align: center;">Sign in</h2>
    <input type="text" name="username" required placeholder="Username">
    <input type="password" name="password" required placeholder="Password">
    <input type="hidden" name="action" value="login">
    <button type="submit">Login</button>
</form>
<p class="footer">Register <a href="register.php" style="text-decoration: none;">Here</a> | <a href="../view/index.php" style="text-decoration: none;">Back to home</a></p>

<script>
$(document).ready(function() {
    $("#loginform").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "../model/auth.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    alert(response.message);
                    window.location.href = "../view/welcome.php"; 
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