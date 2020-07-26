<nav class="col-md-3 bg-dark sidebar">
    <div class="sidebar-sticky">
        <ul  class="nav flex-column">
            <li class="nav-item active">
                <a id="dash" class="nav-link active" href="#"><i class="fas fa-home"></i>&nbsp;&nbsp;Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#studentFn"><i class="fas fa-users"></i>&nbsp;&nbsp;Students</a>
            </li>
            <div id="studentFn" class="collapse">
                <a class="sItem" href="enroll" >Enroll Students</a>
                <a class="sItem" href="#">Delete</a>
                <a class="sItem" href="#">Mod</a>
            </div>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#courseFn"><i class="fas fa-book"></i>&nbsp;&nbsp;Courses</a>
            </li>
            <div id="courseFn" class="collapse">
                <a class="cItem" href="create_course">Create Course</a>
                <a class="cItem" href="create_topic">Create Topic</a>
                <a class="cItem" href="critique_award">Critique and Award</a>    
            </div>
            <li class="nav-item">
            <a id="logout" class="nav-link" href="<?php echo $home_url; ?>logout">Logout</a>
            </li>
        </ul>
        <p class="copy" style="text-align:center;">&copy; ArtCritiq.com</p>
    </div>
    
</nav>