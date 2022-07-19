<?php 
include 'admin_session.php';
include 'config.php';

if(isset($_SESSION['login_user']) && $_SESSION['role'] == 'user') {
    header("location: dashboard.php?p=dashboard");
    die();
}

$CHALLENGES = "challenges";
$LEADERBOARD = "leaderboard";
$USERS = "users";
$SETTINGS = "settings";
$CATEGORIES = "categories";
$DASHBOARD = "dashboard";

$current_page = "";

if (isset($_GET["p"]) && $_GET["p"] == $LEADERBOARD) {
    $current_page = $LEADERBOARD;
} else if (isset($_GET["p"]) && $_GET["p"] == $CHALLENGES){
    $current_page = $CHALLENGES;
}else if (isset($_GET["p"]) && $_GET["p"] == $USERS){
    $current_page = $USERS;
} else if (isset($_GET["p"]) && $_GET["p"] == $SETTINGS){
    $current_page = $SETTINGS;
} else if (isset($_GET["p"]) && $_GET["p"] == $DASHBOARD){
    $current_page = $DASHBOARD;
} else if (isset($_GET["p"]) && $_GET["p"] == $CATEGORIES){
    $current_page = $CATEGORIES;
} else {
    header('Location: admin.php?p=dashboard');
    die();
}

?>

<!DOCTYPE html>
<html>
<?php include 'includes/header.php' ?>
<body>
    <div class="admin-nav">
        <div class="nav">
            <ul>
                <?php 
                    if($current_page == $DASHBOARD){
                        echo "<li><a href='?p=dashboard' class='active'>DashBoard</a></li>
                        <li><a href='?p=leaderboard' >LeaderBoard</a></li>
                        <li><a href='?p=challenges' >Challenges</a></li>
                        <li><a href='?p=categories'>Categories</a></li>
						<li><a href='?p=users'>Users</a></li>
                        <li><a href='?p=settings'>Settings</a></li>";
                    } else if ($current_page == $LEADERBOARD) {
                        echo "<li><a href='?p=dashboard' >DashBoard</a></li>
                            <li><a href='?p=leaderboard' class='active'>LeaderBoard</a></li>
                            <li><a href='?p=challenges' >Challenges</a></li>
                            <li><a href='?p=categories'>Categories</a></li>
							<li><a href='?p=users'>Users</a></li>
                            <li><a href='?p=settings'>Settings</a></li>";
                    }else if ($current_page == $CHALLENGES) {
                        echo "<li><a href='?p=dashboard' >DashBoard</a></li>
                        <li><a href='?p=leaderboard' >LeaderBoard</a></li>
                        <li><a href='?p=challenges' class='active'>Challenges</a></li>
                        <li><a href='?p=categories'>Categories</a></li>
						<li><a href='?p=users'>Users</a></li>
                        <li><a href='?p=settings'>Settings</a></li>";
                    }else if ($current_page == $CATEGORIES) {
                        echo "<li><a href='?p=dashboard' >DashBoard</a></li>
                            <li><a href='?p=leaderboard' >LeaderBoard</a></li>
                            <li><a href='?p=challenges' >Challenges</a></li>
                            <li><a href='?p=categories' class='active'>Categories</a></li>
							<li><a href='?p=users'>Users</a></li>
                            <li><a href='?p=settings'>Settings</a></li>";
                    }else if ($current_page == $USERS) {
                        echo "<li><a href='?p=dashboard' >DashBoard</a></li>
                        <li><a href='?p=leaderboard' >LeaderBoard</a></li>
                        <li><a href='?p=challenges' >Challenges</a></li>
                        <li><a href='?p=categories'>Categories</a></li>
						<li><a href='?p=users' class='active'>Users</a></li>
                        <li><a href='?p=settings'>Settings</a></li>";
                    }else if ($current_page == $SETTINGS) {
                        echo "<li><a href='?p=dashboard' >DashBoard</a></li>
                        <li><a href='?p=leaderboard' >LeaderBoard</a></li>
                        <li><a href='?p=challenges' >Challenges</a></li>
                        <li><a href='?p=categories'>Categories</a></li>
						<li><a href='?p=users'>Users</a></li>
                        <li><a href='?p=settings' class='active'>Settings</a></li>";
                    }
                ?>
            </ul>
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </div>
    <?php 
        if($current_page == $DASHBOARD){
            include 'admin/dashboard.php';
        } else if ($current_page == $LEADERBOARD) {
            include 'admin/leaderboard.php';
        }else if ($current_page == $CHALLENGES) {
           include 'admin/challenges.php';
        }else if ($current_page == $CATEGORIES) {
            include 'admin/categories.php';
        }else if ($current_page == $USERS) {
            // include 'admin/visitors.php';
            include 'admin/users.php';
        }else if ($current_page == $SETTINGS) {
            include 'admin/settings.php';
        }
    ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>