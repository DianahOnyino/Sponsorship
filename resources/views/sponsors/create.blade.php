<div class="card modal-space-top" ng-controller="SponsorController">
    <div class="card-header">Create Sponsor Record</div>

    <div class="card-body no-padding">
        <form ng-submit="saveSponsorDetails()">
            @csrf
            <div>
                <p class="form-label-header">Personal Details: </p>
                @include('partials._base_form_create')

                <div class="grid-x">
                    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                        <label class="centralized-label" for="motivation">Motivation for Sponsoring:</label><br>
                    </div>
                    <div class="cell large-6 medium-6 small-12">
                        <input type="text" id="motivation" name="motivation" ng-model="motivation" required>
                        <span class="help-text error"
                              ng-show="errors.motivation"
                              ng-bind="errors.motivation">
                        </span>
                    </div>
                </div>

                <div class="grid-x">
                    <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                        <label class="centralized-label" for="occupation">Occupation:</label><br>
                    </div>
                    <div class="cell large-6 medium-6 small-12">
                        <input type="text" id="occupation" name="occupation" ng-model="occupation" required>
                        <span class="help-text error"
                              ng-show="errors.occupation"
                              ng-bind="errors.occupation">
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-submit-section">
                <button type="submit" class="btn btn-primary px4 padded-botton">Create</button>
            </div>
        </form>
    </div>
</div>

