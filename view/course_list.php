<?php include('view/header.php') ?>

<?php if ($courses) { ?>


    <section class="list" id="list">
        <header class="list-header">
            <h1>Course List</h1>
        </header>


        <!--  Looping through the $courses -->
        <?php foreach ($courses as $course) : ?>
            <div class="list-row">
                <div class="list-item">
                    <p class="bold"><?= $course['courseName']; ?></p>
                </div>
                <div class="list-removeitem">

                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_course">
                        <input type="hidden" name="course_id" value="<?= $course['courseID']; ?>">
                        <button class="remove-button">❌</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php } else { ?>
    <p>No categories exist yet.</p>
<?php } ?>


<!--- Adding a course -->
<section id="add" class="add">
    <h2>Add Courses</h2>
    <form action="." method="post" id="add-form" class="add-form">
        <input type="hidden" name="action" value="add_course">
        <div class="add-inputs">
            <label>Course Name:</label><br />
            <input type="text" name="course_name" maxlength="30" placeholder="Name" autofocus required>
        </div>
        <div class="add-item">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<br>

<p><a href=".">View &amp; Add Assignments</a></p>


<?php include('view/footer.php'); ?>