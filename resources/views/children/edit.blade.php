<div class="card modal-space-top" ng-controller="MainController">
    <div class="card-header">Edit Child Record</div>
    <div class="card-body no-padding">
        <form>
            @csrf
            <div>
                <p class="form-label-header">Personal Details: </p>
                @include('partials._base_form_edit')

                <div class="grid-x">
                    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                        <label class="centralized-label" for="village">Village:</label><br>
                    </div>
                    <div class="cell large-6 medium-6 small-12">
                        <input type="text" id="village" name="village" ng-model="child_record.village" required>
                            <input type="text" id="person_id" name="person_id" data-ng-model="child_record.person_id">
                        <span class="help-text error"
                              ng-show="errors.village"
                              ng-bind="errors.village">
                        </span>
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
                    <div class="cell large-6 medium-6 small-12 applicable-radios">
                        Applicable:
                        <input type="radio" name="highest_level_of_education"
                               ng-model="child_record.highest_level_of_education"
                               value="applicable"
                               id="applicable"
                               ng-checked="true"/> &nbsp;&nbsp;
                        <span class="help-text error"
                              ng-show="errors.highest_level_of_education"
                              ng-bind="errors.highest_level_of_education">
                        </span>

                        Not Applicable:
                        <input type="radio" name="highest_level_of_education"
                               ng-model="child_record.highest_level_of_education"
                               id="not_applicable"
                               value="not_applicable"/>
                        <span class="help-text error"
                              ng-show="errors.highest_level_of_education"
                              ng-bind="errors.highest_level_of_education">
                        </span>
                    </div>

                </div>

                <div ng-show="child_record.highest_level_of_education == 'applicable'" ng-cloak>
                    <div class="grid-x">
                        <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                            <label class="centralized-label" for="level">Level:</label><br>
                        </div>
                        <div class="cell large-6 medium-6 small-12">
                            <input type="text"
                                   name="level"
                                   id="level"
                                   class="require-if-active"
                                   ng-model="child_record.level"
                                   data-require-pair="#applicable"
                                   required>
                            <span class="help-text error"
                                  ng-show="errors.level"
                                  ng-bind="errors.level">
                        </span>
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
                                   ng-model="child_record.class_level"
                                   required
                                   data-require-pair="#applicable">
                            <span class="help-text error"
                                  ng-show="errors.class_level"
                                  ng-bind="errors.class_level">
                        </span>
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
                                   ng-model="child_record.school_name"
                                   required
                                   data-require-pair="#applicable">
                            <span class="help-text error"
                                  ng-show="errors.school_name"
                                  ng-bind="errors.school_name">
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-submit-section">
                <a href="" ng-click="updateChildEducationDetails(child_record)">Edit</a>
                {{--<button type="submit" class="btn btn-primary px4 padded-botton">Edit</button>--}}
            </div>
        </form>

        @if (count($errors) > 0)
            <script type="text/javascript">
                $(document).ready(function () {
                    jQuery('#createChildRecordModal').foundation('open')
                });
            </script>
        @endif
    </div>
</div>

