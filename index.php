<?php
include_once("inc/config.php");

$pageTitle = "Polling Unit Results";
$section = "section1";
include(ROOT_PATH . 'inc/header.php'); ?>

<section>
    <?php
    global $conn;
    $sql = "SELECT DISTINCT polling_unit_name FROM polling_unit where polling_unit_id > 0";
    $result = $conn->query($sql);
    // The Select form to display the results of each LGA
    ?>
    <form method="POST" action="index.php" class="pu_select">
        Select Polling Unit:
        <select id="polling_unit_result" name="pu" onchange="selectPollingUnit()">
            <?php while ($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['polling_unit_name']; ?>"><?php echo $row['polling_unit_name']; ?></option>
            <?php
            }
            ?>
        </select>
        <div>
            <button class="select_btn" name="select" type="submit">Select</button>
        </div>
    </form>
</section>

<section>
    <?php
    if (isset($_POST["select"])) {
        $k = $_POST['pu'];
        $sql = "SELECT * FROM announced_pu_results r
        INNER JOIN polling_unit p ON p.uniqueid = r.polling_unit_uniqueid WHERE p.polling_unit_name ='$k'";
        $result = $conn->query($sql);
    }
    // The Table to display the results
    ?>
    <table>
        <thead>
            <th>Polling Unit Name</th>
            <th>Party Abbreviation</th>
            <th>Number of Votes</th>
        </thead>

        <tbody id="display_PU_result">

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row['polling_unit_name'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['party_abbreviation'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['party_score'];
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>

    </table>

</section>
</main>
</body>

</html>