<div>
    <form class="kt-form" id="kt_form" wire:submit.prevent="saveOrUpdate">
        <div class="kt-heading kt-heading--md heading1">Edit Parent Statement</div>
        @if ($getParentStatement)
            {{-- dd($getParentStatement) --}}
            <div class="kt-heading kt-heading--md">
                <p>Do you have family members who have attended SI?</p>
                <small><b> NOTE:</b> Sibling alums should be listed in the Sibling Info section.</small>
            </div>
            <div class="kt-form__section kt-form__section--first">
                <div class="kt-wizard-v2__form">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Why do you desire St. Ignatius as a high school option for your
                                    child(ren)?</label>
                                 <small class="sub-lable">(500 characters maximum, approximately 75 words)</small>
                                <textarea class="form-control {{ $errors->has('getParentStatement.parent_statement') ? 'is-invalid' : '' }}"
                                    name="parent_statement" wire:model.defer='getParentStatement.parent_statement'></textarea>
                                @error('getParentStatement.parent_statement')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @foreach ($parentStatementInformation as $key => $info)

                        <div class="row student__count">
                            <div class="col-xl-12 student-count__child">
                                <span class=""># Student {{ $key + 1 }}</span>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>List all high schools, colleges, or graduate schools you have
                                        attended:</label>
                                    <small class="sub-lable">(500 characters maximum, approximately 75 words)</small>
                                    <textarea
                                        class="form-control {{ $errors->has('parentStatementInformation.' . $key . '.child_endearing_quality_growth') ? 'is-invalid' : '' }}"
                                        name="first_name" wire:model.defer='parentStatementInformation.{{ $key }}.child_endearing_quality_growth'></textarea>
                                    @error('parentStatementInformation.*.child_endearing_quality_growth')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>List all high schools, colleges, or graduate schools you have
                                        attended:</label>
                                    <small class="sub-lable">(500 characters maximum, approximately 75 words)</small>
                                    <textarea
                                        class="form-control {{ $errors->has('parentStatementInformation.' . $key . '.tell_something_about_your_child') ? 'is-invalid' : '' }}"
                                        name="first_name" wire:model.defer='parentStatementInformation.{{ $key }}.tell_something_about_your_child'></textarea>
                                    @error('parentStatementInformation.*.tell_something_about_your_child')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Parent Statement Submitted By:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('getParentStatement.statement_submitted_by') ? 'is-invalid' : '' }}"
                                    name="getParentStatement.statement_submitted_by" placeholder="First Name"
                                    wire:model.defer='getParentStatement.statement_submitted_by'>
                                @error('getParentStatement.statement_submitted_by')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Relationship to Student(s):</label>
                                <select
                                    class="form-control {{ $errors->has('getParentStatement.relationship_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="relationship_id"
                                    wire:model.defer='getParentStatement.relationship_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($relationshipList as $relationship)
                                        <option value="{{ $relationship['id'] }}">
                                            {{ $relationship['relationship_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('getParentStatement.relationship_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin: Form Actions -->
            <div class="kt-form__actions">
                <a href="{{ route('application.index') }}"
                    class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Back</a>
                <button type="submit"
                    class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
            </div>
            <!--end: Form Actions -->
        @else
            <div class="no_data__found">
                <h3>no data found</h3>
            </div>
        @endif
    </form>
</div>
