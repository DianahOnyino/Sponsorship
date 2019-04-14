<div class="card modal-space-top" ng-controller="MainController" ng-init="highest_level_of_education = 'applicable'">
    <div class="card-header">Create Child Record</div>

    <div class="card-body no-padding">
        <form method="POST" action="{!! route('child-create') !!}">
            @csrf
            <div>
                <p class="form-label-header">Personal Details: </p>
                @include('partials._base_form')

                <div class="grid-x">
                    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                        <label class="centralized-label" for="village">Village:</label><br>
                    </div>
                    <div class="cell large-6 medium-6 small-12">
                        <input type="text" name="village" ng-model="village" required>
                    </div>
                </div>
            </div>
            <div>
                <p class="form-label-header">Education Details</p>

                <div class="grid-x">
                    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                        <label class="centralized-label"
                               for="highest_level_of_education">Schooled/Schooling:</label><br>
                    </div>
                    <div class="cell large-6 medium-6 small-12">
                        Applicable:
                        <input type="radio" name="highest_level_of_education"
                               ng-model="highest_level_of_education"
                               value="applicable"
                               id="applicable"
                               ng-checked="true"/> &nbsp;&nbsp;

                        Not Applicable:
                        <input type="radio" name="highest_level_of_education"
                               ng-model="highest_level_of_education"
                               id="not_applicable"
                               value="not_applicable"/>
                    </div>

                </div>

                <div ng-if="highest_level_of_education == 'applicable'" ng-cloak>
                    <div class="grid-x">
                        <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                            <label class="centralized-label" for="level">Level:</label><br>
                        </div>
                        <div class="cell large-6 medium-6 small-12">
                            <input type="text"
                                   name="level"
                                   id="level"
                                   class="require-if-active"
                                   ng-model="level"
                                   required
                                   data-require-pair="#applicable">
                        </div>
                    </div>

                    <div class="grid-x">
                        <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                            <label class="centralized-label" for="class_level">Class Level:</label><br>
                        </div>
                        <div class="cell large-6 medium-6 small-12">
                            <input type="text"
                                   name="class_level"
                                   id="class_level"
                                   class="require-if-active"
                                   ng-model="class_level"
                                   required
                                   data-require-pair="#applicable">
                        </div>
                    </div>

                    <div class="grid-x">
                        <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                            <label class="centralized-label" for="school_name">School Name:</label><br>
                        </div>
                        <div class="cell large-6 medium-6 small-12">
                            <input type="text"
                                   name="school_name"
                                   id="school_name"
                                   class="require-if-active"
                                   ng-model="school_name"
                                   required
                                   data-require-pair="#applicable">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary px4">Create</button>
        </form>
    </div>
</div>

