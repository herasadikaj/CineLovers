<?php
session_abort();

include("conn.php");
$conn = new connect();
if(isset($_POST["btn_submit"]))
   {
       $name = $_POST["namex"];
       $email = $_POST["emailx"];
       $number = $_POST["numberx"];
       $message = $_POST["messagex"];
      
       $sql = "INSERT INTO contact (namex, emailx, numberx, messagex) VALUES ($name', '$email', '$number', '$message')";



       if ($conn->insert($sql)) {
        header("Location: dashboard.php");
        exit();
    } else{
        echo"error";
    }


   }
   include("header.php");
?>

<section style="min-height:450px;"> 
      <div class="container"  style="color: #B03060;">
                  <div class="col-md-12">
                     
                     <center>
                      <h1> Contact Us</h1>
                      <p>GET IN TOUCH</p>
                     <p>
                        We'd love to talk about how we can work together.
                        Send us a message below and we'll respond as soon as possible.
                     </p>
                     </center>
                  </div>

         <div class="row" style="color: white" >
            <div class="col-md-6 mt-5 mb-5 pl-5"style="border-radius:30px; background-color: #B03060;">
                <h2 class= "mt-5"> Contact Information</h2>
                <p class= "mt-1">
                   Our team will get back to you within 24 hours.
                </p>

                <p class="mt-5"> <i class="fa fa-phone mt-3"></i>&nbsp; +35568666666</p>
                <p class="mt-3"> <i class="fa fa-envelope mt-3"></i>&nbsp; cinelovers@gmail.com</p>

        
            </div>  
            <div class="col-md-6"> 
               <form method="post">
                  <div class="container" style="color: #B03060;">
         
                   <label for="namex"><b>Your name</b></label>
                   <input type="text" style="border-radius:30px;" placeholder="Enter name" name="name"  required>
            
                   <label for="emailx"><b>Email</b></label>
                   <input type="text" style="border-radius:30px;" placeholder="Enter Email" name="email" id="email" required>

                   <label for="numberx"><b>Number</b></label>
                   <input type="tel" style="border-radius: 30px;" placeholder="Enter number" name="number" id="number" required>

                   <label for="messagex"><b>Message</b></label>
                   <textarea name="message" id="message" rows="4" style="resize: none; width: 100%; border-radius: 30px;" ></textarea>
                    <br>
                   <button type="submit" class="btn-submit" style="background-color:#B03060; color:white;">Send message</button>
           
                  </div>
               </form>
            </div>
         </div>
      </div>
           
</section>

<?php
include("footer.php");
?>

