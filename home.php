<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>∞Infinity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* heard and footer */
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    html, body {
    height: 100%;
    width: 100%;
    padding: 0;
    margin: 0;
    }
    body {
    display: flex;
    flex-direction: column;
    }   
    main {
    flex: auto;
    }

    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    a:hover{
        text-decoration: none;
        color: #007ee5;
    }
    header div{
        display: flex;
        gap: 10px;
    }
    header ul{
        background-color:#5cc6ee;
    }
    header div a,p{
        font-weight: 500;
    }
    header ul{
        background-color:#5cc6ee;
    }
    
    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color:#6665ee;
        color: white;
        text-align: center;
    }  
    /* main */
    main .hello{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);    
    }
    main .hello a{
        font-size:60px;
    }

    main{
        color: #ffff;
        background-image: url("https://forococheselectricos.com/wp-content/uploads/2021/06/Infinity-Lithium.jpg");
        background-color: #cccccc; /* Used if the image is unavailable */
        height: 500px; /* You must set a specified height */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover; /* Resize the background image to cover the entire container */
    }
    </style>
  
</head>
<body>
    <header>
        <nav class="navbar">
            <a class="navbar-brand" href="#">∞Infinity</a>
            <div>
                <button type="button" class="btn btn-light"><a href="login-user.php">Login</a></button>
                <button type="button" class="btn btn-light"><a href="signup-user.php">Signup</a></button>
            </div>
        </nav>
    </header>
    <main>
        <div class='hello'>
            <h1>Welcome to Infinity</h1>
            <h3>Infinity is the network social networking application built to help you interact with everyone.</h3>
        </div>
    </main>
    <footer>
        <p>©Infinity 2021 , Inc.</p>
    </footer>
</body>
</html>