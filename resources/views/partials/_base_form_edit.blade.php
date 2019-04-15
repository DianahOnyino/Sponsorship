<div class="grid-x">
    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
        <label class="centralized-label" for="first_name">First name:</label><br>
    </div>

    <div class="cell large-6 medium-6 small-12">
        <input type="text" name="first_name"
               ng-model="edit_record.first_name"
               id="first_name"
               required>
        <span class="help-text error"
              ng-show="errors.first_name"
              ng-bind="errors.first_name">
        </span>
    </div>
</div>

<div class="grid-x">
    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
        <label class="centralized-label" for="middle_name">Middle name:</label><br>
    </div>
    <div class="cell large-6 medium-6 small-12">
        <input type="text" name="middle_name" ng-model="edit_record.middle_name" id="middle_name">
        <span class="help-text error"
              ng-show="errors.middle_name"
              ng-bind="errors.middle_name">
        </span>
    </div>
</div>

<div class="grid-x">
    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
        <label class="centralized-label" for="last_name">Last name:</label><br>
    </div>
    <div class="cell large-6 medium-6 small-12">
        <input type="text" name="last_name" ng-model="edit_record.last_name" id="last_name" required>
        <span class="help-text error"
              ng-show="errors.last_name"
              ng-bind="errors.last_name">
        </span>
    </div>
</div>

<div class="grid-x">
    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
        <label class="centralized-label" for="date_of_birth">Date of Birth:</label><br>
    </div>
    <div class="cell large-6 medium-6 small-12">
        <input type="text" name="date_of_birth" ng-model="edit_record.date_of_birth" id="date_of_birth" required>
        <span class="help-text error"
              ng-show="errors.date_of_birth"
              ng-bind="errors.date_of_birth">
        </span>
    </div>
</div>

<div class="grid-x">
    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
        <label class="centralized-label" for="age">Age:</label><br>
    </div>
    <div class="cell large-6 medium-6 small-12">
        <input type="text" name="age" ng-model="edit_record.age" id="age" required>
        <span class="help-text error"
              ng-show="errors.age"
              ng-bind="errors.age">
        </span>
    </div>
</div>

<div class="grid-x">
    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
        <label class="centralized-label" for="gender">Gender:</label><br>
    </div>
    <div class="cell large-6 medium-6 small-12">
        <input type="text" name="gender" ng-model="edit_record.gender" id="gender" required>
        <span class="help-text error"
              ng-show="errors.gender"
              ng-bind="errors.gender">
        </span>
    </div>
</div>

<div class="grid-x">
    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
        <label class="centralized-label" for="country">Country:</label><br>
    </div>
    <div class="cell large-6 medium-6 small-12">
        <input type="text" name="country" ng-model="edit_record.country" id="country" required>
        <span class="help-text error"
              ng-show="errors.country"
              ng-bind="errors.country">
        </span>
    </div>
</div>

<div class="grid-x">
    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
        <label class="centralized-label" for="city">City:</label><br>
    </div>
    <div class="cell large-6 medium-6 small-12">
        <input type="text" name="city" ng-model="edit_record.city" id="city" required>
        <span class="help-text error"
              ng-show="errors.city"
              ng-bind="errors.city">
        </span>
    </div>
</div>
