<?php session_start();
    require("connection.php");
    require("authenticate.php");
    require("active_volunteer.php");
    require("volunteer.php");
    require("fetch_users.php");

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
    <div class="col col-1">
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
                    <ul>
                        <li class="nav-item" for=""><a href="#dashboard" class="nav-link" id=""><img class="icon icon-1" src="icons/bar-chart.png" alt="icon">Dashboard</a></li>
                        <li class="nav-item" for=""><a href="#volunteer" class="nav-link" id=""><img class="icon icon-2" src="icons/people.png" alt="icon">Volunteer Management</a></li>
                        <li class="nav-item" for=""><a href="#event" class="nav-link" id=""><img class="icon icon-3" src="icons/calendar.png" alt="icon">Event Planning</a></li>
                        <li class="nav-item" for=""><a href="#communication-center" class="nav-link" id=""><img class="icon icon-4" src="icons/speech-bubble.png" alt="icon">Communicaiton Center</a></li>
                        <li class="nav-item" for=""><a href="#reports" class="nav-link" id=""><img class="icon icon-5" src="icons/report.png" alt="icon">Reports</a></li>
                    </ul>
            </nav>
            
        </header>
    </div>

    <div class="col-3"><a href="#" class=>
        <div class="container"></div>
    </div>

    <div class="col col-2">
        <div class="title-bar">
            <h2>Admin Dashboard</h2>
            <a href="logout.php" class="btn-logout">Logout</a>
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
                    <!-- <h4><?=$monthNow;?> <?=$yearNow;?></h4>

                    <div class="calendar-row-1">
                        <div class="calendar-day-header">
                            <h5>Sun</h5>
                            <h5>Mon</h5>
                            <h5>Tue</h5>
                            <h5>Wed</h5>
                            <h5>Thu</h5>
                            <h5>Fri</h5>
                            <h5>Sat</h5>
                        </div>

                        <div class="calendar-box">
                            <div class="box box-1">
                                    
                            </div>
                            <div class="box box-2">

                            </div>
                            <div class="box box-3">

                            </div>
                            <div class="box box-4">

                            </div>
                            <div class="box box-5">

                            </div>
                            <div class="box box-6">

                            </div>
                            <div class="box box-7">

                            </div>
                            <div class="box box-8">

                            </div>
                            <div class="box box-9">

                            </div>
                            <div class="box box-10">

                            </div>
                            <div class="box box-11">

                            </div>
                            <div class="box box-12">

                            </div>
                            <div class="box box-13">

                            </div>
                            <div class="box box-14">

                            </div>
                            <div class="box box-15">

                            </div>
                            <div class="box box-16">

                            </div>
                            <div class="box box-17">

                            </div>
                            <div class="box box-18">

                            </div>
                            <div class="box box-19">

                            </div>
                            <div class="box box-20">

                            </div>
                            <div class="box box-21">

                            </div>
                            <div class="box box-22">

                            </div>
                            <div class="box box-23">

                            </div>
                            <div class="box box-24">

                            </div>
                            <div class="box box-25">

                            </div>
                            <div class="box box-26">

                            </div>
                            <div class="box box-27">

                            </div>
                            <div class="box box-28">

                            </div>
                            <div class="box box-29">

                            </div>
                            <div class="box box-30">

                            </div>
                        </div>
                    </div> -->

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
                                                <button type="button" class="btn btn-reply">Reply</button>
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
                <h2>Reports</h2>
                <div class="reports-container">
                    <div class="f-container vol-charts-container">
                        <h4>Volunteers</h4>
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
    <!-- -------------------------------------------------------------- -->
    <script src="script.js"></script>

</body>
</html>