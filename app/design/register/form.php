<div class="form">
    <h1>Registracija</h1>
    <form action="<?= $this->url('register/create') ?>" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required><br>
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" required><br>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" required><br>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone"><br>

        <label for="genderId">Pasirinkite a lyti: </label>
        <select name="gender_id" id="genderId">
            <?php
            foreach ($this->data['genders'] as $gender) {
                echo '<option value="' . $gender->getId() . '">' . $gender->getName() . '</option>';
            }
            ?>
        </select><br>
            <label for="genderId">Pasirinkite a amziu: </label>
            <select name="years_id" id="yearsId">
                <?php
                foreach ($this->data['years'] as $year) {
                    echo '<option value="' . $year->getId() . '">' . $year->getYear() . '</option>';
                }
                ?>
            </select><br>
        <label for="genderId">Pasirinkite a bureli: </label>
        <select name="society_id" id="societyId">
            <?php
            foreach ($this->data['societies'] as $society) {
                echo '<option value="' . $society->getId() . '">' . $society->getName() . '</option>';
            }
            ?>
        </select><br>
        <button type="submit">Registruotis</button>
    </form>
</div>