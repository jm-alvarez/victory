<?php session_start();
    require("connection.php");
    require("authenticate.php");

    $uid = $_SESSION['uid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victory</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/victory-icon.png" type="image/x-icon">
</head>
<body>
        
    <header class="sticked bottom-shadow">
        <a href="#" class="navbar-brand"><img src="img/victory-logo.png" alt="logo" class="navbar-brand"></a>
        <button class="nav-burger" id="nav-burger"><div class="burger-line burger-line-1"></div>
        <div class="burger-line burger-line-2"></div>
        <div class="burger-line burger-line-3"></div></button>
    </header>

    <nav class="navbar left-shadow " id="navbar">
        <div class="offcanvas-header shadow">
            <h4 class="">Menu</h4>
            <button class="close-nav" id="close-nav">
                <div class="cross cross-1"></div>
                <div class="cross cross-2"></div>
            </button>
        </div>
            <div class="offcanvas-nav">
                <div class="user-container shadow">
                    <img src="./profile_pics/<?=$profile_pic;?>" alt="" class="profile-pic shadow"><p class="user text-shadow"><?=$ufname;?></p>
                    <button class="btn-edit-short" onclick="editProfile()"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.69,147.32,64l24-24L216,84.69Z"></path></svg></button>
                </div>
                <ul>
                    <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#events" class="nav-link">Events</a></li>
                    <li class="nav-item"><a href="#donations" class="nav-link btn-donate-now">Donate Now</a></li>
                    <li class="nav-item"><a href="#programs" class="nav-link">Programs</a></li>
                    <li class="nav-item"><a href="#communicate" class="nav-link">Contact</a></li>
                    <div class="logout-container">
                        <a href="logout.php" class="logout">Logout</a>
                    </div>
                </ul>   
                
            </div>
    </nav>

<main>
    <section id="home">
        <!-- <div class="bg"><img src="img/bg.png" alt="bg"> -->
        </div>
        <div class="col col-1">
            <h2>Welcome to <span>Victory Church!</span></h2> 
            <p>Whether you're new to faith or 
                a seasoned believer, we are thrilled to have you join us 
                today. We believe in a community where everyone is welcomed, 
                loved, and equipped to take their next step in their journey with Jesus. 
                Come as you are, and let's worship together.</p>
        </div>

        <div class="col col-2">
            <img src="" alt="">
        </div>
    </section>

    <!-- <div class="line-div"></div> -->

    <section id="events">
        
        <div class="event-container">
            <div class="event-row-1">
                <h2 class="container-header">
                    Events
                </h2>
            </div>

            <div class="event-row-2">
                <!-- <div class="card">
                        <img src="img/core-values.png" alt="" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">
                            Christmas
                        </h3>
                        <small>December 25, 2024</small>
                    </div>
                </div>

                <div class="card">
                    <img src="img/core-values.png" alt="event image" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">
                            Christmas
                        </h3>
                        <small>December 25, 2024</small>
                    </div>
                </div> -->

                <?php require("event_card.php");?>
            </div>

            

        </div>



    </section>

    <!-- <div class="line-div"></div> -->

    <section id="donations">
            <button type="button" class="btn btn-donate" id="donate">Donate Now</button>
    </section>

    <!-- <div class="line-div"></div> -->

    <section id="programs">
        <h2>Our Programs</h2>

        <div class="program-container">

            <?php require("program_card.php"); ?>

            <!-- <div class="box box-1">
                <h3>Sunday School</h3>

                <p>Weekly classes for children and adults.</p>

                <a href="#">Learn more.</a>
            </div>
            <div class="box box-2">
                <h3>Youth Ministry</h3>

                <p>Engaging activities for teenagers</p>

                <a href="#">Learn more.</a>
            </div>
            <div class="box box-3">
                <h3>Community Outreach</h3>

                <p>Servicing our local community.</p>

                <a href="#">Learn more.</a>
            </div>

            <div class="box box-1">
                <h3>Sunday School</h3>

                <p>Weekly classes for children and adults.</p>

                <a href="#">Learn more.</a>
            </div>
            <div class="box box-2">
                <h3>Youth Ministry</h3>

                <p>Engaging activities for teenagers</p>

                <a href="#">Learn more.</a>
            </div>
            <div class="box box-3">
                <h3>Community Outreach</h3>

                <p>Servicing our local community.</p>

                <a href="#">Learn more.</a>
            </div> -->

            
        </div>
    </section>

    <section id="communicate">
        <div class="communicate-container">
            
            <div class="communicate-col communicate-col-1">
                <h1 class="communicate-title">Get in Touch</h1>
                <div class="row-web contact">
                    <div class="web contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M128,24h0A104,104,0,1,0,232,128,104.12,104.12,0,0,0,128,24Zm88,104a87.61,87.61,0,0,1-3.33,24H174.16a157.44,157.44,0,0,0,0-48h38.51A87.61,87.61,0,0,1,216,128ZM102,168H154a115.11,115.11,0,0,1-26,45A115.27,115.27,0,0,1,102,168Zm-3.9-16a140.84,140.84,0,0,1,0-48h59.88a140.84,140.84,0,0,1,0,48ZM40,128a87.61,87.61,0,0,1,3.33-24H81.84a157.44,157.44,0,0,0,0,48H43.33A87.61,87.61,0,0,1,40,128ZM154,88H102a115.11,115.11,0,0,1,26-45A115.27,115.27,0,0,1,154,88Zm52.33,0H170.71a135.28,135.28,0,0,0-22.3-45.6A88.29,88.29,0,0,1,206.37,88ZM107.59,42.4A135.28,135.28,0,0,0,85.29,88H49.63A88.29,88.29,0,0,1,107.59,42.4ZM49.63,168H85.29a135.28,135.28,0,0,0,22.3,45.6A88.29,88.29,0,0,1,49.63,168Zm98.78,45.6a135.28,135.28,0,0,0,22.3-45.6h35.66A88.29,88.29,0,0,1,148.41,213.6Z"></path></svg>
                    <a href="https://church.victory.org.ph/">Victory Church Official Website</a>
                    </div>
                </div>
                <div class="row-facebook contact">
                    <div class="facebook contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm8,191.63V152h24a8,8,0,0,0,0-16H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,0-16H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0,0,16h24v63.63a88,88,0,1,1,16,0Z"></path></svg>
                        <a href="https://web.facebook.com/victorylemery">Victory Church-Lemery</a>
                    </div>
                </div>
                <div class="row-phone contact">
                    <div class="phone contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16,16,0,0,0,1.32-15.06l0-.12L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47L83.2,111.86a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.06,18.53,27.73,37.06,46.46,46.11a16,16,0,0,0,15.75-1.14,8.44,8.44,0,0,0,.74-.56L168.89,152l47,21.05h0s.08,0,.11,0A40.21,40.21,0,0,1,176,208Z"></path></svg>
                        <p>(+63)-996-9696-69</p>
                    </div>
                </div>
                <div class="row-email contact">
                    <div class="email contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-96,85.15L52.57,64H203.43ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z"></path></svg><a href="mailto:victory@email.com"  target="_blank" class="link-email">victory@email.com</a></div>
                </div>

                <button class="btn btn-inbox"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M216,80H184V48a16,16,0,0,0-16-16H40A16,16,0,0,0,24,48V176a8,8,0,0,0,13,6.22L72,154V184a16,16,0,0,0,16,16h93.59L219,230.22a8,8,0,0,0,5,1.78,8,8,0,0,0,8-8V96A16,16,0,0,0,216,80ZM66.55,137.78,40,159.25V48H168v88H71.58A8,8,0,0,0,66.55,137.78ZM216,207.25l-26.55-21.47a8,8,0,0,0-5-1.78H88V152h80a16,16,0,0,0,16-16V96h32Z"></path></svg><p>Inbox<p></button>
            </div>

            <div class="communicate-col communicate-col-2">
                <form action="" method="post" id="form-message" class="form-message">
                    
                    <select name="com-type" id="com-type" class="com-type">
                        <option value="concern" class="concern">Concern</option>
                        <option value="suggestion">Suggestion</option>
                    </select>

                    <textarea name="user-message" id="user-message" class="user-message" placeholder="Message..."></textarea>

                    <input type="submit" value="send" name="send-message" class="btn-send">

                    <?php
                        if(isset($_POST['send-message'])){
                            $message_type = $_POST['com-type'];
                            $message  = $_POST['user-message'];

                            $q_message = $mysqli->query("INSERT INTO comms_tbl SET message_type='$message_type', message='$message', uid='$uid'");

                            if(!$q_message){
                                $mysqli->error;
                                exit();
                            } elseif($mysqli->affected_rows == 0) {
                                ?>
                                    <p style="color: red; font-weight: bold;">Message not sent.</p>
                                <?php
                            } else {
                                ?>
                                    <p id="msg" style="color: green; font-weight: bold;">Message sent successfully.</p>
                                    <script>
                                        const msg = document.getElementById('msg');
                                        msg.addEventListener(setTimeout(function(){
                                            msg.innerHTML = "";
                                        }, 3000));
                                    </script>
                                <?php
                            }
                        }
                    ?>
                    
                </form>
            </div>
        </div>
    </section>


    <!-- <div class="line-div"></div> -->

    <section id="profile" class="">

            <div class="col col-1">
                <img src="./profile_pics/<?=$profile_pic;?>" alt="profile-pic">
            </div>
            <div class="col col-2">
                <h3><?=$ufname;?> <?=$mi;?> <?=$ulname;?></h3>
                <p class="bio"><?=$bio;?></p>
                <p class="email"><?=$email;?></p>
            </div>
            <div class="col col-3">

                <!-- <a href="edit_profile.php?id=<?=$_SESSION['uid'];?>" class="btn btn-edit" id="btn-edit" >Edit Profile</a> -->
                <button class="btn btn-edit" id="btn-edit-profile" onclick="editProfile()">Edit Profile</button>
            </div>

    </section>


</main>

<div class="edit-profile-container" id="edit-profile-container">
    <button type="button" class="btn btn-close btn-close-edit" id="btn-close-edit">Close</button>
    <iframe src="edit_profile.php" frameborder="0" id="edit-profile-frame" class="edit-profile-frame"></iframe>  
</div>

<div class="event-frame-container" id="event-frame-container">
    <!-- <div class="frame-container">
        <div class="event-frame-header">
            <button class="cross" id="close-event-frame">X</button>
            <h4>Event</h4>
        </div>
        <iframe src="" frameborder="0" class="event-frame" id="event-frame"></iframe>
    </div> -->
</div>
<script>
    const navbar = document.getElementById('navbar');

    
    const editProfileContainer = document.getElementById('edit-profile-container');
    const editFrame = document.getElementById('edit-profile-frame');
    const closeEdit = document.getElementById('btn-close-edit');

    document.getElementById('nav-burger').addEventListener("click", (e)=>{
        navbar.classList.add('navbar-active');
    });

    document.getElementById('close-nav').addEventListener("click", (e)=>{
        navbar.classList.remove('navbar-active');
    });

    function editProfile(){
        editProfileContainer.classList.add("show");
        editFrame.src = "edit_profile.php?id=<?=$_SESSION['uid'];?>";
    };

    closeEdit.addEventListener("click", ()=>{
        editProfileContainer.classList.remove('show');
        editFrame.src = '';
    });
</script>
</body>
<footer>
    <div class="row row-1">
        <div class="col col-1">
            <h4>Contact Us</h4>
            <p>(+63)-996-9696-69</p>
            <a href="#">info@email.com</a>
        </div>
        <div class="col col-2">
            <h4>Follow Us</h4>
        </div>
        <div class="col col-3">
            <h4>Address</h4>
            <p>Lemery, Batangas</p>
            <p>Sunday Service: 10:00 AM</p> 
        </div>
    </div>
    <div class="row row-2">
            <p><span>Group 3 : </span> &nbsp; John Mark Alvarez | Ashley Judd Libao | Niel Aldrich Macalintal <br></p>
            <br><p>&copy;&nbsp;2025 Victory Lemery</p>
            
    </div>
</footer>
</html>