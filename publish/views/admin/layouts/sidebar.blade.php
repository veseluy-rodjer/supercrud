<!-- left menu starts -->
<div class="col-sm-2 col-lg-2">
    <div class="sidebar-nav">
        <div class="nav-canvas">
            <div class="nav-sm nav nav-stacked">

            </div>
            <ul class="nav nav-pills nav-stacked main-menu">
                <li class="nav-header">Main</li>

                @include('admin.layouts.list')

                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Accordion Menu</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">Child Menu 1</a></li>
                        <li><a href="#">Child Menu 2</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--/span-->
<!-- left menu ends -->
