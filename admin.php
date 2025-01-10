<?php session_start();
    require("connection.php");
    require("authenticate.php");
    require("active_volunteer.php");
    require("volunteer.php");
    require("fetch_users.php");

    $session_uid = $_SESSION['uid'];

    $q_user = $mysqli->query("SELECT * FROM users_tbl WHERE uid = $session_uid");

    $f_user = $q_user->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" href="img/victory-icon.png" type="x-icon/image">
</head>
<body id="">
        <header class="">
            <nav>
                <div class="nav-logo" id="nav-logo">
                    <img src="img/victory-logo-white.png" alt="" id="logo">
                    <div class="container">
                        <input type="checkbox" name="close" id="close" class="cb" >
                        <label class="cross" for="close" id="cross">
                            <div class="line line-1" id="line-1"></div>
                            <div class="line line-2" id="line-2"></div>
                            <div class="line line-3" id="line-3"></div>
                        </label>
                    </div>
                </div>
                <div class="user-container">
                    <img src="profile_pics/<?=$f_user['profile_pic'];?>" alt="profile-pic" class="profile-pic">
                    <div class="profile-col-1">
                        <p class="user-name"><?=$f_user['ufname'];?> <?=$f_user['mi'];?> <?=$f_user['ulname'];?></p>
                        <a href="#communication-center" class="message-icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-96,85.15L52.57,64H203.43ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z"></path></svg><p>Messages</p></a>
                    </div>
                    <button class="btn-edit-short" onclick="editProfile()"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.69,147.32,64l24-24L216,84.69Z"></path></svg></button>
                </div>
            
                    
                    <ul>
                        <li class="nav-item" for=""><a href="#dashboard" class="nav-link" id=""><img class="icon icon-1" src="icons/bar-chart.png" alt="icon"><p>Dashboard</p></a></li>
                        <li class="nav-item" for=""><a href="#volunteer" class="nav-link" id=""><img class="icon icon-2" src="icons/people.png" alt="icon"><p>Volunteer Management</p></a></li>
                        <li class="nav-item" for=""><a href="#event" class="nav-link" id=""><img class="icon icon-3" src="icons/calendar.png" alt="icon"><p>Event Planning</p></a></li>
                        <!-- <li class="nav-item" for=""><a href="#communication-center" class="nav-link" id=""><img class="icon icon-4" src="icons/speech-bubble.png" alt="icon"><p>Communicaiton Center</p></a></li> -->
                        <li class="nav-item" for=""><a href="#reports" class="nav-link" id=""><img class="icon icon-5" src="icons/report.png" alt="icon"><p>Reports</p></a></li>
                    </ul>

                    <a href="logout.php" class="btn-logout">Logout</a>
            </nav>
            
        </header>

    <div class="col col-2">
        <div class="title-bar">
            <h2>Admin Dashboard</h2>
            
        </div>

        <main>
            <section id="dashboard">
                <h3>Dashboard Overview</h3>
                <div class="stats">
                    <div class="box box-1">
                        <h4>Total Volunteer</h4>
                        <h3><?=$v_count;?></h3>
                    </div>
                    <div class="box box-2">
                        <h4>Active Volunteer</h4>
                        <h3><?=$v_active_cnt;?></h3>
                    </div>
                    <div class="box box-3">
                        <h4>Active Projects</h4>
                        <h3>6</h3>
                    </div>
                </div>
            </section>

    <!-- ---------------------- VOLUNTEER MANAGEMENT ---------------------- --> 

            <section id="volunteer">
                <h2>Volunter Management</h2>

                <div class="volunteer-container">
                    <div class="row row-1">
                        <h4>Volunteer List</h4>
                        <button type="button" class="btn btn-add-volunteer" id="btn-add-volunteer"><div class="plus"><div class="line line-1"></div>
                        <div class="line line-2"></div></div>Add Volunteer</button>
                    </div>
                    
                    <div class="row row-2">
                        <div class="container-header shadow">
                            <h5 class="name" >Name</h5>
                            <h5 class="role">Role</h5>
                            <h5 class="status">Status</h5>
                            <h5 class="hours">Hours</h5>
                            <h5 class="actions">Actions</h5>
                        </div>

                    <div class="v-list">
            <!-- --------------------- VOLUNTEER LIST FETCH --------------------- -->
                            <?php
                                require("volunteer_list.php");
                            ?>
            <!-- --------------------------------------------------------------- -->
                    </div>

                </div>

                <!-- <div class="recent shadow">
                    <h4>Recent Activity</h4>

                    <div class="recent-list">
                        <div class="list list-1">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                        <div class="list list-2">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                        <div class="list list-3">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                        <div class="list list-4">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                        <div class="list list-5">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                        <div class="list list-6">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                        <div class="list list-7">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                        <div class="list list-8">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                        <div class="list list-9">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                        <div class="list list-10">
                            <p class="uname">Juan Delacruz</p>
                            <small>Signed up for youth event.</small>
                            <small>1 hour ago.</small>
                        </div>
                    </div>
                </div> -->
               
            </section>
    <!-- ------------------------------------------------------------------ -->

    <!-- ----------------------- EVENT PLANNING ----------------------- -->
            <section id="event">
                <h2>Event Planning</h2>
                <div class="event-row-1">
                    <div class="row-col-1">
                        <button class="btn btn-new-event" id="btn-add-event"><div class="plus">
                            <div class="line line-1"></div>
                            <div class="line line-2"></div></div>New Event</button>

                            <button class="btn btn-new-event" id="btn-add-program"><div class="plus">
                            <div class="line line-1"></div>
                            <div class="line line-2"></div></div>Add Program</button>

                        <a href="#" class="btn filter-event">Filter</a>
                    </div>
                    
                    <div class="row-col-2">
                        <form action="" method="post">
                            <input type="search" name="search_event" id="search-event" placeholder="Search Events...">
                        </form>
                    </div>
                </div>
                    <?php
                        require("date.php");
                    ?>
                <div class="event-row-2">

                    <iframe src="calendar_page.php" class="calendar-frame" frameborder="0"></iframe>
                </div>

                <div class="event-row-3">
                    <div class="row-header">
                        <h4>Upcomming Events</h4>
                    </div>
                    
                    <div class="row-event-3-1">
                        <div class="event-container">
                            <!-- <div class="event-list">
                                <div class="list-col-1">
                                    <img src="icons/event.png" alt="event">
                                    <div class="list-row-1">
                                        <p>Sunday Service</p>
                                        <small>January 7, 2025 | 9:00 AM</small>
                                    </div>
                                </div>

                                <div class="list-col-2">
                                    <a href="#" class="more vertical">
                                        <div class="dot dot-1"></div>
                                        <div class="dot dot-2"></div>
                                        <div class="dot dot-3"></div>
                                    </a>
                                </div>
                            </div> -->

                            <?php
                                require("event_list.php");
                            ?>
                        </div>
                    </div>
                    
                </div>

                <div class="program-row">
                    <div class="row-header">
                        <h4>Programs</h4>
                    </div>
                    <div class="program-row-1">
                        <div class="program-container">
                            <?php require("program_list.php"); ?>
                        </div>
                    </div>
                </div>
                
                
            </section>
    <!-- ---------------------------------------------- -->

            <section id="communication-center">
                <h2>Communication Center</h2>
                <div class="messages shadow">
                    <h4>Messages</h4>
                    <div class="messages-container">
                        <?php
                            $q_mlist = $mysqli->query("SELECT * FROM comms_tbl INNER JOIN users_tbl ON comms_tbl.uid = users_tbl.uid ORDER BY sent_date DESC");

                            while($f_mlist = $q_mlist->fetch_assoc()){
                                $m_name = $f_mlist['ufname'] . " " . $f_mlist['mi']. " " . $f_mlist['ulname'];
                                $m_message = $f_mlist['message'];
                                $m_profile = $f_mlist['profile_pic'];
                                $m_date = $f_mlist['sent_date'];
                                $m_uid = $f_mlist['uid'];
                                $m_id = $f_mlist['message_id'];

                                ?>
                                    <div class="messages-box">

                                        <div class="messages-col-1">
                                           <img src="profile_pics/<?=$m_profile;?>" alt="user-img" class="user-img">
                                            <div class="s-info">
                                                <p class="username"><?=$m_name;?></p>
                                                <small><?=$m_date;?></small>
                                                <details>
                                                    <summary>Show message...</summary>
                                                    <p class="s-message"><?=$m_message;?></p>
                                                </details>

                                            </div>
                                        </div>
                                        <div class="messages-col-2">
                                                <a href="admin_reply.php?uid=<?=$m_uid;?>&mid=<?=$m_id;?>" type="button" class="btn btn-reply">Reply</a>
                                                <button type="button" class="btn btn-archive">Archive</button>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>


                <!-- <div class="concerns shadow">
                    <h4>Concerns</h4>
                        <div class="concerns-container">
                                    
                            <div class="concerns-box">
                                    
                                <div class="concerns-col-1">
                                   <img src="img/jm1x1.jpg" alt="user-img" class="user-img">
                                    <div class="s-info">
                                        <p class="username">John Mark</p>
                                        <small>Dec 28, 2024</small>
                                        <details>
                                            <summary>
                                                <p class="s-message">Concern about parking lot...</p>
                                            </summary>
                                        </details>
                                    </div>
                                </div>
                                <div class="concerns-col-2">
                                        <button type="button" class="btn btn-reply">Reply</button>
                                        <button type="button" class="btn btn-archive">Archive</button>
                                </div>
                            </div>
                                    
                        </div>
                    </div>
                </div> -->

            </section>

            <!-- --------------------- REPORTS --------------------- -->
            <section id="reports">
                
                <div class="reports-container">
                <h2>Reports</h2>
                    <div class="f-container vol-charts-container">
                        <h4>Volunteers of <?php echo date("Y"); ?></h4>
                        <iframe src="volunteer_charts.php" frameborder="0" class="frame volunteer-frame"></iframe>
                    </div>
                    <div class="f-container donations-chart-container">
                        <h4>Donations</h4>
                        <iframe src="donations_chart.php" frameborder="0" class="frame donations-frame"></iframe>
                    </div>
                </div>

                <!-- <button id="open-edit" class=" btn open-edit">Edit</button> -->
            </section>
            <!-- --------------------------------------------------------------- -->
        </main>
    </div>

    <!-- ----------------------------- IFRAMES ---------------------- -->
        <div class="add-event-container" id="add-event-container">
            <button type="button" class="btn btn-close btn-close-event" id="btn-close-event">Close</button>
            <iframe src="" frameborder="0" id="add-event-frame" class="add-event-frame show"></iframe>
        </div>

        <div class="add-event-container" id="edit-event-container">
            <button type="button" class="btn btn-close btn-close-event" id="btn-close-edit-event">Close</button>
            <iframe src="" frameborder="0" id="edit-event-frame" class="add-event-frame show"></iframe>
        </div>

        <div class="add-program-container" id="add-program-container">
            <button type="button" class="btn btn-close btn-close-program" id="btn-close-program">Close</button>
            <iframe src="" frameborder="0" id="add-program-frame" class="add-program-frame show"></iframe>
        </div>

        <div class="edit-volunteer-container" id="edit-volunteer-container">
            <button type="button" class="btn btn-close btn-close-edit" id="btn-close-edit">Close</button>
            <iframe src="" frameborder="0" id="edit-volunteer-frame" class="edit-volunteer-frame"></iframe>  
        </div>

        <div class="add-volunteer-container" id="add-volunteer-container">
            <button type="button" class="btn btn-close btn-close-vol" id="btn-close-vol">Close</button>
            <iframe src="" frameborder="0" id="add-volunteer-frame" class="add-volunteer-frame"></iframe>
        </div>

        <div class="edit-profile-container" id="edit-profile-container">
            <button type="button" class="btn btn-close-edit-profile" id="btn-close-profile">Close</button>
            <iframe src="" frameborder="0" id="edit-profile-frame" class="edit-profile-frame"></iframe>
        </div>
    <!-- -------------------------------------------------------------- -->
    <script src="script.js"></script>
    <script>
        const editProfileContainer = document.getElementById('edit-profile-container');
        const editProfileFrame = document.getElementById('edit-profile-frame');
        const closeEditProfile = document.getElementById("btn-close-profile");

        function editProfile() {
            editProfileContainer.classList.add('show-edit-frame');
            editProfileFrame.src = "edit_profile.php?id=<?=$_SESSION['uid'];?>";
        }

        closeEditProfile.addEventListener("click", (e)=>{
            editProfileContainer.classList.remove('show-edit-frame');
            editProfileFrame.src = "";
        });
    </script>
</body>
</html>