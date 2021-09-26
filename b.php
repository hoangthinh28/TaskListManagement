<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $arraytask = filter_input(INPUT_POST, 'addtask', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    if ($arraytask == NULL) {
        $arraytask = [];
    }
    if (isset($_POST['tasknew'])) {
        $arraytask[] = $_POST['tasknew'];
    }

    if (isset($_POST["taskrm"])) {
        $taskrm = $_POST['taskrm'];
        unset($arraytask[array_search($taskrm, $arraytask)]);
    }
    ?>
    <div class="head">
        <h1>Task List Management</h1>
        <h1 class="date"><?php echo date("d-m-Y");?></h1>
    </div>
    <div class="part-one">
        <h3>Tasks</h3>
        <?php
        if (isset($arraytask)) {
            foreach ($arraytask as $key => $value) {
                echo '<p class="anoun">' . ($key + 1) . " : " . $value . '</p>';
            }
        }
        ?>
    </div>

    <div class="add-task">
        <h3>Add Task</h3>
        <form action="b.php" method="post">
            <label for="">Task</label>
            <?php foreach ($arraytask as $key => $value) : ?>
                <input type="hidden" name=addtask[] value="<?php echo $value; ?>" id="task">
            <?php endforeach; ?>
            <input type="text" name="tasknew" id="task">
            <input type="submit" value="Add" id="submit">
        </form>
    </div>

    <div class="remove-task">
            <h3>Delete Task</h3>
        <form action="b.php" method="post">
            <label for="">Task</label>
            <?php foreach ($arraytask as $key => $value) : ?>
                <input type="hidden" name=addtask[] value="<?php echo $value; ?>" id="task">
            <?php endforeach; ?>
            <select name="taskrm" id="delete">
                <?php
                foreach ($arraytask as $key => $value) {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                }
                ?>
            </select>
            <input type="submit" value="Delete" id="submit">
        </form>
    </div>
</body>

</html>