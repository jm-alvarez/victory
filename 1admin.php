<?php session_start();
    require("connection.php");
    require("authenticate.php");
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
        <header id="">
            <nav>
                <div class="nav-logo">
                    <img src="img/victory-logo-white.png" alt="">
                    <input type="checkbox" name="close" id="close" class="cb">
                    <label class="burger" for="close" id="">
                        <div class="line line-1" id="line-1"></div>
                        <div class="line line-2" id="line-2"></div>
                        <div class="line line-3" id="line-3"></div>
                    </label>
                </div>
                    <ul>
                        <li class="nav-item" for=""><a href="#" class="nav-link" id="">Dashboard</a></li>
                        <li class="nav-item" for=""><a href="#" class="nav-link" id="">Volunteer Management</a></li>
                        <li class="nav-item" for=""><a href="#" class="nav-link" id="">Event Planning</a></li>
                        <li class="nav-item" for=""><a href="#" class="nav-link" id="">Communicaiton Center</a></li>
                        <li class="nav-item" for=""><a href="#" class="nav-link" id="">Reports</a></li>
                    </ul>
            </nav>
            
        </header>
    </div>

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
                        <h3>12</h3>
                    </div>
                    <div class="box box-2">
                        <h4>Upcoming Events</h4>
                        <h3>4</h3>
                    </div>
                    <div class="box box-3">
                        <h4>Active Projects</h4>
                        <h3>6</h3>
                    </div>
                </div>
            </section>

            <section id="volunteer">
                <h4>Quick Actions</h4>

                <div class="btn-divider">
                    <button type="button" class="btn btn-1">Add Volunteer</button>
                    <button type="button" class="btn btn-2">Schedule Event</button>
                </div>

                <div class="recent">
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
                </div>
               
            </section>
        </main>
    </div>
    
    
</body>
</html>