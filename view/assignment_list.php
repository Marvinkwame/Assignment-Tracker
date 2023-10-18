<?php
//just taking all the content in the header.php and copying it in this file
include('view/header.php');
?>

<section id="list" class="list">
    <header class="list_row list_header">
        <h1>Assignments</h1>
        <form action="." method="get" id="lis_header_select" class="list_header_select">
            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required>
                <option value="0">View All</option>
                <?php foreach ($courses as $course) :  ?>
                    <?php if ($course_id == $course['courseID']) { ?>
                        <option value="<?= $course['courseID'] ?>" selected>
                        <?php } else { ?>
                        <option value="<?= $course['courseID'] ?>">
                        <?php } ?>
                        <?= $course['courseName'] ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <button class="add-button bold">Go</button>
        </form>
    </header>
    <?php if ($assignments) { ?>
        <?php foreach ($assignments as $assignment) : ?>
            <div class="list-row">
                <div class="list-item">
                    <p class="bold"><?= "{$assignment['courseName']}" ?></p>
                    <p><?= $assignment['Description'];  ?></p>
                </div>
                <div class="list-removeitem">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_assignment">
                        <input type="hidden" name="assignment_id" value="<?= $assignment['ID']; ?>">
                        <button class="remove-button">❌</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } else { ?>
        <br>
        <?php if ($course_id) { ?>
            <p>No assignment exits for this course yet.</p>
        <?php } else { ?>
            <p>No assignment exits yet.</p>
        <?php } ?>
        <br>
    <?php } ?>
</section>


<section class="add" id="add">
    <h2>Add Assignments</h2>
    <form action="." method="post" class="add-form" id="add-form">
        <input type="hidden" name="action" value="add_assignment">
        <div class="add_inputs">
            <label for="">Course:</label>
            <select name="course_id" required>
                <option value="">Please select</option>
                <?php foreach ($courses as $course) : ?>
                    <option value="<?= $course['courseID']; ?>">
                        <?= $course['courseName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="">Description</label>
            <input type="text" name="description" maxlength="120" placeholder="Enter Description" required>
        </div>
        <div class="add-item">
            <button class="add-button">
                Add
            </button>
        </div>
    </form>
</section>

<br>
<p><a href=".?action=list_courses">View/Edit Courses</a></p>

<?php
include('view/footer.php');
?>