<!DOCTYPE html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <title>User Profile & Contact</title>
    <link rel="stylesheet" href="userprofile.css">
</head>
<body>
    <div class="container">
        <h1>Create Profile</h1>
        <form action="register.php" method="POST" id = "register">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <textarea name="additional_info" placeholder="Additional Information"></textarea>
        </form>
        
        <h2>Contact</h2>
        <form id ="myForm">
            <textarea name="message" placeholder="Your message here" required></textarea>
            <button type="submit">Send Message</button>
        </form><br>
        <button id = "submit">Create Profile </button>
    </div>
    <script>
    $("#myForm").submit(function(e) {
        
e.preventDefault(); 

var form = $(this);
var actionUrl = form.attr('action');

$.ajax({
    type: "POST",
    url: "submit_message.php",
    data: form.serialize(), 
    success: function(data)
    {
      alert(data); 
    }
});
});

$("#submit").click(function (e) {
    e.preventDefault();
    var form = $('#register');
    $.ajax({
        type: "POST",
        url: "register.php",
        data: form.serialize(),
        success: function(data) {
            window.location.href = 'http://localhost/college2ndyear/thankyou.html';
        }
    });
})
</script>
</body>
</html>
