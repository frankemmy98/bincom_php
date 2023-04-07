<?php
require_once("../inc/config.php");

$pageTitle = "Add Polling Unit Results";
$section = "section3";
include(ROOT_PATH . '../inc/header.php');

if (isset($_POST["submit"])) {
    $pu_id = $_POST["polling_unit_uniqueid"];
    $pty_abbr = $_POST["party_abbreviation"];
    $pty_scr = $_POST["party_score"];
    $entd_by_u = $_POST["entered_by_user"];
    $dt_entd = $_POST["date_entered"];
    $u_ip_addr = $_POST["user_ip_address"];

    $sql = "INSERT INTO announced_pu_results (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`, `date_entered`, `user_ip_address`) VALUES ('$pu_id', '$pty_abbr', '$pty_scr', '$entd_by_u', '$dt_entd', '$u_ip_addr')";

    $result = $conn->query($sql);

    header("location:section3.php?status=success");
}
?>

<section>
    <form action="section3.php" method="POST" id="add_pu_result">
        <h2>Fill in New PU Details</h2>
        <div class="pu_form--input">
            <label for="">pu_uniqueid:</label>
            <input type="text" name="polling_unit_uniqueid" required placeholder="Enter pu_uniqueid">
        </div>
        <div class="pu_form--input">
            <label for="">party_abbreviation:</label>
            <input type="text" name="party_abbreviation" required placeholder="Enter party_abbreviation">
        </div>
        <div class="pu_form--input">
            <label for="">party_score:</label>
            <input type="number" name="party_score" required placeholder="Enter party_score">
        </div>
        <div class="pu_form--input">
            <label for="">entered_by_user:</label>
            <input type="text" name="entered_by_user" required placeholder="Enter entered_by_user">
        </div>
        <div class="pu_form--input">
            <label for="">date_entered:</label>
            <input type="datetime-local" name="date_entered" required placeholder="Enter date_entered">
        </div>
        <div class="pu_form--input">
            <label for="">user_ip_address:</label>
            <input type="text" name="user_ip_address" required placeholder="Enter user_ip_address">
        </div>
        <button name="submit" type="submit">Submit</button>
    </form>
</section>