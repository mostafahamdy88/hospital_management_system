<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <title>HMIS</title>
        <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
:root{
    --blue:#1F8FC3;
    --black:#444;
    --light-color:#777;
    --box-shadow:.5rem .5rem 0 rgba(22, 139, 160, 0.2);
    --text-shadow:.4rem .4rem 0 rgba(0, 0, 0, .2);
    --border:.2rem solid var(--blue);
}

*{
    font-family: 'Poppins', sans-serif;
    margin:0; padding: 0;
    
    
    text-transform: capitalize;
    transition: all .2s ease-out;
    text-decoration: none;
    
}

html{
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-padding-top: 7rem;
    scroll-behavior: smooth;
}

section{
    padding:2rem 9%;
}

section:nth-child(even){
    background: #f5f5f5;
}

.heading{
    text-align: center;
    padding-bottom: 2rem;
    text-shadow: var(--text-shadow);
    text-transform: uppercase;
    color:var(--black);
    font-size: 5rem;
    letter-spacing: .4rem;
}

.heading span{
    text-transform: uppercase;
    color:var(--blue);
}

.header{
    padding:2rem 9%;
    position: fixed;
    top:0; left: 0; right: 0;
    z-index: 1000;
    box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
}

.header .logo{
    font-size: 2.5rem;
    color: var(--black);
}

.header .logo i{
    color: var(--blue);
}


.home{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap:1.5rem;
    padding-top: 10rem;
}


.book form{
    margin-left: 100px;
    margin-right: 100px;
    flex:auto;
    background: #F5F5F5;
    border:var(--border);
    box-shadow: var(--box-shadow);
    text-align: center;
    padding: 2rem;
    border-radius: .5rem;
    text-align: center;
    
}

.btn{
    display: inline-block;
    margin-top: 1rem;
    padding: .5rem;
    padding-left: 1rem;
    border:var(--border);
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    color:var(--blue);
    cursor: pointer;
    font-size: 1.7rem;
    background: #fff;
    
}



.btn span{
    padding:.7rem 1rem;
    border-radius: .5rem;
    background: var(--blue);
    color:#fff;
    margin-left: .5rem;
}

.btn:hover{
    background: var(--blue);
    color:#fff;
}

.btn:hover span{
    color: var(--blue);
    background:#fff;
    margin-left: 1rem;
}

@media (max-width:991px){

    html{
        font-size: 55%;
    }

    .header{
        padding: 2rem;
    }

    section{
        padding:2rem;
    }

}

@media (max-width:768px){

    #menu-btn{
        display: initial;
    }


}

@media (max-width:450px){

    html{
        font-size: 50%;
    }
    

}

    </style>
    </head>
    <body>
    <header class="header">
        <a href="../first.html" class="logo"> <i class="fas fa-heartbeat"></i> HMS </a>

    </header>
    <section class="home" id="home">

    </section>
    <section class="book" id="book">

        <h1 class="heading"> <span>Pneumonia</span>Detection<span>using Chest X-ray</span> </h1>
    <div class="input-box">
        <form action="chest-xray-img-upload.php" method="POST" enctype="multipart/form-data">
            <label style="font-size: 18px; margin-right:20px;">Upload sample image:</label>
            <input required type="file" name="img" accept=".jpg,.jpeg,.png"><br><br><br><br>
            <input class="btn" type="submit" name="submit-img" value="Upload image">
            </div>
        </form>
    </body>
</html>