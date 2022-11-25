<div>
    <div class="home-wrap">
        <div class="form-outr">
            <div class="cmn-hdr">
                <h4>Edit Personal Info</h4>
            </div>
            <div class="form-wrap m-form-wrap">
                <form wire:submit.prevent="saveOrUpdate">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" name="first_name"
                            class="form-control {{ $errors->has('Pro_First_Name') ? 'is-invalid' : '' }}"
                            wire:model.defer="Pro_First_Name" />
                        @error('Pro_First_Name')
                            <div class="invalid-feedback error_text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" name="last_name"
                            class="form-control {{ $errors->has('Pro_Last_Name') ? 'is-invalid' : '' }}"
                            wire:model.defer="Pro_Last_Name" />
                        @error('Pro_Last_Name')
                            <div class="invalid-feedback error_text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            wire:model.defer="email" />
                        @error('email')
                            <div class="invalid-feedback error_text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mobile Phone:</label>

                        <div class="row fr-row">
                            <div class="col-md-3 fr-col">
                                <input id="a" type="text" maxlength="3" class="form-control "
                                    wire:model.defer='Pro_Mobile_one'
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                            </div>
                            <div class="col-md-3 fr-col">
                                <input id="b" type="text" maxlength="3" class="form-control "
                                    wire:model.defer='Pro_Mobile_two'
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                            </div>
                            <div class="col-md-6 fr-col">
                                <input id="c" type="text" maxlength="4" class="form-control "
                                    wire:model.defer='Pro_Mobile_three'
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                            </div>
                        </div>
                        @error('Pro_Mobile')
                            <div class="error error_text">{{ $message }}</div>
                        @enderror
                        <script>
                            let a = document.getElementById("a"),
                                b = document.getElementById("b"),
                                c = document.getElementById("c");

                            a.onkeyup = function() {
                                if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
                                    b.focus();
                                }
                            }
                            b.onkeyup = function() {
                                if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
                                    c.focus();
                                }
                            }
                        </script>
                    </div>
                    <div class="form-btn text-center">
                        <input type="submit" value="Update" class="sub-btn" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
