

<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ion-android-close">X</span></button>
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">User</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="frm-donation" name="frm-donation" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <input hidden="hidden" name="id_user" value="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                    </div>
                    <div class="form-group">
                        <label for="level">Level:</label>
                        <select class="form-control" name="level">
                            <option value="1" selected="selected" >Admin</option>
                            <option value="2">Customer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birth_of_date">Birth of date:</label>
                        <input type="date" class="form-control" id="birth_of_date" name="birth_of_date">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number" class="form-control" id="phone" name="phone">
                    </div>
                    {{csrf_field()}}
                    <input hidden="hidden" name="base_url" value="{{url('/')}}">
                    <div class="modal-body">
                        <div class="modal-footer" id="modal_footer">
                            <button type="submit" class="btn btn-default-border-blk" id="submit-btn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="user_error" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ion-android-close">X</span></button>
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Error!</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <h4>User not found!please try again</h4>
            </div>
        </div>
    </div>
</div>

