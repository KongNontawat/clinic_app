<aside class="sidebar-nav-wrapper">
  <div class="navbar-logo mb-4">
    <a href="{{route('/home')}}">
      <img src="{{asset('image/LogoBeautyCare.png')}}" alt="logo" width="190"/>
    </a>
  </div>
  <hr class="m-0" style="border: 1px solid #E2E8EC;">
  <nav class="sidebar-nav">
    <ul id="sidebar-menu">

      <li class="nav-item dashboard">
        <a href="{{route('dashboard.index')}}">
          <span class="icon">
          <i class="fa-solid fa-chart-line"></i>
          </span>
          <span class="text">Dashboard</span>
        </a>
      </li>
<!-- 
      <li class="nav-item ">
        <a href="#!">
          <span class="icon">
          <i class="fa-solid fa-calendar-days"></i>
          </span>
          <span class="text">Schedule</span>
        </a>
      </li>

      <li class="nav-item ">
        <a href="#!">
          <span class="icon">
          <i class="fa-solid fa-clipboard-list"></i>
          </span>
          <span class="text">Appointment</span>
        </a>
      </li>

      <li class="nav-item ">
        <a href="#!">
          <span class="icon">
          <i class="fa-solid fa-calendar-check"></i>
          </span>
          <span class="text">Booking and Queue</span>
        </a>
      </li> -->

      <!-- <li class="nav-item patient">
        <a href="{{route('patient.patient')}}">
          <span class="icon">
          <i class="fa-solid fa-users"></i>
          </span>
          <span class="text">Patient</span>
        </a>
      </li> -->

      <li class="nav-item nav-item-has-children patient">
        <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item-patient">
          <span class="icon">
            <i class="fa-solid fa-users"></i>
          </span>
          <span class="text">Patient</span>
        </a>
        <ul id="menu-item-patient" class="collapse dropdown-nav">
          <li>
            <a href="{{route('patient.patient')}}" class="menu-item-patient"> Patient List </a>
          </li>
          <li>
            <a href="#!"> Member Group </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="#">
          <span class="icon">
          <i class="fa-solid fa-user-doctor"></i>
          </span>
          <span class="text">Doctor</span>
        </a>
      </li>

      <li class="nav-item ">
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3" aria-controls="ddmenu_3" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
          <i class="fa-solid fa-circle-user"></i>
          </span>
          <span class="text">User</span>
        </a>
      </li>

      <!-- <span class="divider">
        <hr />
      </span>
      <li class="nav-item">
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4" aria-controls="ddmenu_4" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.66675 4.58325V16.4999H19.2501V4.58325H3.66675ZM5.50008 14.6666V6.41659H8.25008V14.6666H5.50008ZM10.0834 14.6666V11.4583H12.8334V14.6666H10.0834ZM17.4167 14.6666H14.6667V11.4583H17.4167V14.6666ZM10.0834 9.62492V6.41659H17.4167V9.62492H10.0834Z" />
            </svg>
          </span>
          <span class="text">UI Elements </span>
        </a>
      </li> -->
      <!-- <li class="nav-item nav-item-has-children">
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_5" aria-controls="ddmenu_5" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.75 4.58325H16.5L15.125 6.41659L13.75 4.58325ZM4.58333 1.83325H17.4167C18.4342 1.83325 19.25 2.65825 19.25 3.66659V18.3333C19.25 19.3508 18.4342 20.1666 17.4167 20.1666H4.58333C3.575 20.1666 2.75 19.3508 2.75 18.3333V3.66659C2.75 2.65825 3.575 1.83325 4.58333 1.83325ZM4.58333 3.66659V7.33325H17.4167V3.66659H4.58333ZM4.58333 18.3333H17.4167V9.16659H4.58333V18.3333ZM6.41667 10.9999H15.5833V12.8333H6.41667V10.9999ZM6.41667 14.6666H15.5833V16.4999H6.41667V14.6666Z" />
            </svg>
          </span>
          <span class="text"> Forms </span>
        </a>
        <ul id="ddmenu_5" class="collapse dropdown-nav">
          <li>
            <a href="form-elements.html"> From Elements </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="tables.html">
          <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.58333 3.66675H17.4167C17.9029 3.66675 18.3692 3.8599 18.713 4.20372C19.0568 4.54754 19.25 5.01385 19.25 5.50008V16.5001C19.25 16.9863 19.0568 17.4526 18.713 17.7964C18.3692 18.1403 17.9029 18.3334 17.4167 18.3334H4.58333C4.0971 18.3334 3.63079 18.1403 3.28697 17.7964C2.94315 17.4526 2.75 16.9863 2.75 16.5001V5.50008C2.75 5.01385 2.94315 4.54754 3.28697 4.20372C3.63079 3.8599 4.0971 3.66675 4.58333 3.66675ZM4.58333 7.33341V11.0001H10.0833V7.33341H4.58333ZM11.9167 7.33341V11.0001H17.4167V7.33341H11.9167ZM4.58333 12.8334V16.5001H10.0833V12.8334H4.58333ZM11.9167 12.8334V16.5001H17.4167V12.8334H11.9167Z" />
            </svg>
          </span>
          <span class="text">Tables</span>
        </a>
      </li>
      <span class="divider">
        <hr />
      </span> -->

      <li class="nav-item">
        <a href="#!" style="justify-content:center;">
          <span class="text-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- <div class="promo-box">
    <span class="text-danger">Logout</span>
  </div> -->
</aside>