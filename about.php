<?php
if (!isset($_SESSION)) {
    session_start();
}
include('includes/header.php');
echo '<link href="./css/about.css" rel="stylesheet">';
require "./backend/controllers/AboutController.php";
$about = new AboutController;
$all_about = $about->all();
?>
<div class="about-us">
    <div style="background-color: transparent">
        <h1>F L E X</h1>
        <h2>making the world a better space</h2>
        <h3>
            FLEX-Furniture was founded with a simple idea:
            interior design needed a redesign for the way we live now,
            <br>
            that is only
            possible by the help of our amazing team of professionals.
        </h3>
        <a href="#tms" class="btn-about">the team</button></a>
    </div>
</div>
<div class="team-section" id="tms">
    <h1>Our Team</h1>
    <p>Meet the best interior designers and renovation professionals.</p>
    <span class="border"></span>
    <div class="ps">
        <a href="#p1"><img src="assets/p1.jpg" alt=""></a>
        <a href="#p2"><img src="assets/download.jpg" alt=""></a>
        <a href="#p3"><img src="assets/p3.jpg" alt=""></a>
    </div>
    <div class="section" id="p1">
        <span class="name"><?php echo $all_about[0]["name"]; ?></span>
        <span class="border"></span>
        <p>
            <?php echo $all_about[0]["biography"]; ?>
        </p>
    </div>
    <div class="section" id="p2">
        <span class="name"><?php echo $all_about[1]["name"]; ?></span>
        <span class="border"></span>
        <p>
            <?php echo $all_about[1]["biography"]; ?>
        </p>
    </div>

    <div class="section" id="p3">
        <span class="name"><?php echo $all_about[2]["name"]; ?></span>
        <span class="border"></span>
        <p>
            <?php echo $all_about[2]["biography"]; ?>
        </p>
    </div>
</div>
<?php include('includes/footer.php') ?>
</div>

