<?php require_once('../inc/config.php') ?>
<?php
$pageTitle = "LGA total Results";
$section = "section2";
include('../inc/header.php');
?>

<section>
    <?php
    global $conn;
    $sql = "SELECT lga_name FROM lga";
    $result = $conn->query($sql);
    // The Select form to display the results of each LGA
    ?>
    <article>
        <form method="POST" action="section2.php" class="lga_select">
            Select LGA:
            <select id="lga_result" name="lga" onchange="selectLGA()">
                <?php while ($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['lga_name'] ?>"><?php echo $row['lga_name'] ?></option>
                <?php
                }
                ?>
            </select>
            <div>
                <button class="select_btn" name="select" type="submit">Select</button>
            </div>
        </form>
    </article>
    <article>
        <?php
        if (isset($_POST["select"])) {
            $k = $_POST['lga'];
            global $conn;
            $sql = "SELECT * FROM announced_pu_results r
            INNER JOIN polling_unit p ON p.uniqueid = r.polling_unit_uniqueid
            INNER JOIN lga l ON l.lga_id = p.lga_id WHERE l.lga_name ='$k'";
            $result = $conn->query($sql);
        }
        // The Table to store the results
        ?>
        <table>
            <thead>
                <th>LGA Name</th>
                <th>Polling Unit Name</th>
                <th>Polling Unit ID</th>
                <th>Party</th>
                <th>Party Votes</th>
            </thead>

            <tbody id="display_LGA_result">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>";
                        echo $row['lga_name'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['polling_unit_name'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['polling_unit_uniqueid'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['party_abbreviation'];
                        echo "</td>";
                        echo "<td>";
                        echo number_format($row['party_score']);
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <div>
            <?php
            if (isset($_POST["select"])) {
                $k = $_POST['lga'];
                global $conn;
                $sql = "SELECT sum(party_score) as total_sum FROM announced_pu_results r
            INNER JOIN polling_unit p ON p.uniqueid = r.polling_unit_uniqueid
            INNER JOIN lga l ON l.lga_id = p.lga_id WHERE l.lga_name = '$k'";
                $result = $conn->query($sql);
            }
            // The Table to display the total votes result.
            ?>
            <h3 class="total_votes">
                Total votes:
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo $row['total_sum'];
                    }
                }
                ?>
            </h3>
        </div>
    </article>
</section>
</main>
</body>

</html>