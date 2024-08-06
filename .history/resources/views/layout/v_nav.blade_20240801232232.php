<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>M2M</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="{{ request()->is('/soltemp') ? 'active' : '' }}">
              <a href="/soltemp">
                <i class="fa fa-bookmark"></i> <span>M2M SEOA</span>
              </a>
          </li>
          <li class="{{ request()->is('/soltemp') ? 'active' : '' }}">
              <a href="/m2msast">
                <i class="fa fa-bookmark"></i> <span>M2M SAST</span>
              </a>
          </li>

          <li class="{{ request()->is('/m2m') ? 'active' : '' }}">
              <a href="/m2mbwa">
                <i class="fa fa-bookmark"></i> <span>M2M BWA</span>
              </a>
          </li>
          </ul>
    </li>

    <li class="{{ request()->is('/sc1') ? 'active' : '' }}">
        <a href="/sc1">
          <i class="fa fa-book"></i> <span>SC1</span>
        </a>
    </li>

    <li class="{{ request()->is('/strava') ? 'active' : '' }}">
        <a href="/strava">
          <i class="fa fa-book"></i> <span>Strava</span>
        </a>
    </li>

    <li class="{{ request()->is('/revenue') ? 'active' : '' }}">
        <a href="/revenue">
          <i class="fa fa-money"></i> <span>Revenue POP</span>
        </a>
    </li>

    <li class="{{ request()->is('/ISR') ? 'active' : '' }}">
        <a href="/isr">
          <i class="fa fa-address-book"></i> <span>ISR</span>
        </a>
    </li>

    <li class="{{ request()->is('/logactivity') ? 'active' : '' }}">
        <a href="/logactivity">
          <i class="fa fa-book"></i> <span>Log Activity</span>
        </a>
    </li> 

</ul>
