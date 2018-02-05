<!DOCTYPE html>
<html>
    <head>
        <meta charset=”utf-8” />
        <title >Operating systems</title>
        <link href="styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <!--outer "div"-->
    <body style="background-color:#99ccff;">
    <center>
    
   
    <!--<header><h1> Operating Systems</h1></header>-->
    <h1><span class="rainbow">Operating systems</h1>
    <div>
<!--    <nav> <hr width="50%"/>-->
<!--    <a href="index.php"> <u>Home</u> </a>-->
<!--     <a href="windows.php"> Windows </a>-->
<!--     <a href="mac.php"> Mac OS X</a>-->
<!--     <a href="linux.php"> Linux</a>-->
<!--    </nav>-->
    <ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="windows.php">Windows</a></li>
  <li><a href="mac.php">Mac OS X</a></li>
  <li><a href="linux.php">Linux</a></li>
  <!--<li style="float:right"><a class="active" href="#about">About</a></li>-->
</ul>
    </div>
    </center>
    <br />
    <main>

    
      <div>
        <center>
   This website will be presenting the main operating systems that are currently available. <br>
   You will get an overview of microsoft Windows, Mac OS X and Linux <br>
    An operating system (OS) represents all the programs which pilot the various components (hard disk, screen, processor, memory etc. ...) of the computer device and allows it to work.
It allows the user and the computer equipment to interact , it is also loaded first when starting the device.

The operating system makes it possible to operate the different peripherals (sound card, graphics card, mouse, keyboard, etc.) thanks to the use of drivers which allow the operating system to communicate and give instructions to devices that could not function without them.
          </center>
    </div>    
     
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div><center>
  <img src="img/operating-system.jpg" style="width:50%"></center>
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img/evolution.png" style="width:100%">
  <div class="text">Evolution of windows</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div><center>
  <img src="img/firstos.png" style="width:65%"></center>
  <div class="text">The first Mac OS</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>


       

    <!--slidwesho-->
    
    
    
    
    
    
    
    
    
    
    
    <footer>
            <hr><center>
            Alexandre MICHAUDET <br>
            CST336 : Internet Programming. 2017&copy; Jason Henderson <br/>
            <strong>Disclaimer:</strong> This webpage is used for academic purposes only.<br/>
            </center>
        </footer>
    
    </main>
