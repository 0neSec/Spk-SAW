    <div class="row ">
        <div class="col-lg-6 mx-auto">
            <div class="card-body bg-light">
                <div class="container">
                    <form action="/kreteria/store" method="POST">
                        @csrf
                        <div class="controls">
                            <div class="form-group">
                                <label for="nama">Kreteria *</label>
                                <input id="nama" type="text" name="nama" class="form-control"
                                    placeholder="Please enter Name Kreteria"  required="required"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot *</label>
                                <input id="bobot" type="text" name="bobot" class="form-control"
                                    placeholder="Please enter Bobot Kreteria" required="required"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="lebel">Please specify your need *</label>
                                <select id="lebel" name="label" class="form-control" required="required"
                                    data-error="Please specify your need.">
                                    {{-- <option value=""  selected disabled>--Select Label--</option> --}}
                                    <option value="min">Min</option>
                                    <option value="max">Max</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-12">

                            <button type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="save" name="submit">
                                tambah data
                            </button>
                        </div>

                </div>
                </form>
                </div>
            </div>


        </div>
        <!-- /.8 -->
