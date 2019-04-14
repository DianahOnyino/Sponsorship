<div class="card modal-space-top">
    <div class="card-header">Create Child Record</div>

    <div class="card-body no-padding">
        <div>
            <p class="form-label-header">Personal Details: </p>
            @include('partials._base_form')

            <div class="grid-x">
                <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                    <label class="centralized-label" for="village">Village:</label><br>
                </div>
                <div class="cell large-6 medium-6 small-12">
                    <input type="text" name="village">
                </div>
            </div>
        </div>
        <div>
            <p class="form-label-header">Education Details</p>

            <div class="grid-x">
                <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                    <label class="centralized-label" for="highest_level_of_education">Schooled/Schooling:</label><br>
                </div>
                <div class="cell large-6 medium-6 small-12">
                    Applicable: <input type="radio" name="highest_level_of_education" value="yes" checked> &nbsp;&nbsp;
                    Not Applicable: <input type="radio" name="highest_level_of_education" value="no">
                </div>
            </div>

            <div class="grid-x">
                <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                    <label class="centralized-label" for="level">Level:</label><br>
                </div>
                <div class="cell large-6 medium-6 small-12">
                    <input type="text" name="level">
                </div>
            </div>

            <div class="grid-x">
                <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                    <label class="centralized-label" for="class_level">Class Level:</label><br>
                </div>
                <div class="cell large-6 medium-6 small-12">
                    <input type="text" name="class_level">
                </div>
            </div>

            <div class="grid-x">
                <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                    <label class="centralized-label" for="school_name">School Name:</label><br>
                </div>
                <div class="cell large-6 medium-6 small-12">
                    <input type="text" name="school_name">
                </div>
            </div>
        </div>
    </div>
</div>

