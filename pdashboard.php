<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p_style.css">
    <title>E-Healthcare Home</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">E-Healthcare</div>
            <ul>
                <li><a href="pdashboard.php">Dashboard</a></li>
                <li><a href="pre.php">Prescription</a></li>
                <li><a href="appointments.php">Book Appointments</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="dashboard-container">
            <div class="option">
                <img src="https://cdn.iconscout.com/icon/free/png-256/free-profile-3352424-2791060.png" alt="Profile Picture" class="profile-picture">
                <div class="profile_name"><a href="pprofile.php">My Profile</a></div>
            </div>
             <div class="option">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/003/501/833/small/calendar-icon-concept-of-schedule-appointment-free-vector.jpg" alt="Book Appointments" class="profile-picture">
                 <div class="profile_name"><a href="appointments.php">Book Appointments</a></div>
             </div>
             <div class="option">
                <img src="https://cdn4.iconfinder.com/data/icons/files-time-solid-style/24/time-view-512.png" alt="View History" class="profile-picture">
                 <div class="profile_name"><a href="aphistory.php">Appointment History</a></div>
             </div>
            </div>
    </main>

    <footer>
        <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
    </footer>
</body>
</html