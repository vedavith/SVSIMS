
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <!-- <a class="navbar-brand" href="javascript:void(0)">Logo</a> -->
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navb">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <button class=" btn btn-danger width" style="background-color:#343a40;border: #343a40; font-size:13px;" name="home" value="home" formnovalidate> <b>HOME</b> </button>&nbsp;
                        </li>
                        
                        
                        <?php
                        if($_SESSION['role'] == "user")
                        {
                            echo "";
                        }
                        else
                        {
                        ?>
                        <li class="nav-item">
                            <button class="btn btn-danger width" style="background-color:#343a40;border: #343a40;font-size:13px;" name="masters" value="masters" formnovalidate><b> MASTERS</b> </button>&nbsp;
                        </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <button class="btn btn-danger width" style="background-color:#343a40;border: #343a40;font-size:13px;" name="manage_inventory" value="manage_inventory" formnovalidate> <b>INVENTORY</b> </button>&nbsp;
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-danger width" style="background-color:#343a40;border: #343a40;font-size:13px;" name="user_details" value="user_details" formnovalidate> <b>EMPLOYEES</b> </button>&nbsp;
                        </li>
                        <!-- <li class="nav-item">
                            <button class="btn btn-outline-info width" name="reports" value="reports"> Reports </button>&nbsp;
                        </li> -->
                    </ul>
                    <div class="my-2 my-lg-0">
                        <button class="btn btn-outline-danger my-2 my-sm-0"  name="logout" value="logout" formnovalidate>Logout</button>
                    </div>
                </div>
            </nav>