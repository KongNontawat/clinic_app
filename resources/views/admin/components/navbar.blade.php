      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-30">
                  <button id="menu-toggle" class="main-btn light-btn rounded-md btn-hover py-2 d-flex align-items-center">
                    <i class="fa-solid fa-bars"></i>
                  </button>
                </div>
                <div class="header-menu d-none d-md-flex">
                  <a href="#!" class="d-flex align-items-center mx-2 mx-lg-3 text-dark">
                    <i class="fa-solid fa-house me-1"></i> Menu
                  </a>

                  <a href="#!" class="d-flex align-items-center mx-2 mx-lg-3 text-dark">
                    <i class="fa-solid fa-user-plus me-1"></i> New Patient
                  </a>

                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- notification start -->
                <div class="notification-box ml-15 d-none d-md-flex">
                  <button class="dropdown-toggle" type="button" id="notification" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bell"></i>
                    <span>2</span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notification">
                    <li>
                      <a href="#0">
                        <div class="image">
                          <img src="assets/images/lead/lead-6.png" alt="" />
                        </div>
                        <div class="content">
                          <h6>
                            John Doe
                            <span class="text-regular">
                              comment on a product.
                            </span>
                          </h6>
                          <p>
                            Lorem ipsum dolor sit amet, consect etur adipiscing
                            elit Vivamus tortor.
                          </p>
                          <span>10 mins ago</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#0">
                        <div class="image">
                          <img src="assets/images/lead/lead-1.png" alt="" />
                        </div>
                        <div class="content">
                          <h6>
                            Jonathon
                            <span class="text-regular">
                              like on a product.
                            </span>
                          </h6>
                          <p>
                            Lorem ipsum dolor sit amet, consect etur adipiscing
                            elit Vivamus tortor.
                          </p>
                          <span>10 mins ago</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- notification end -->
                <!-- message start -->
                <div class="header-message-box ml-15 d-none d-md-flex">
                  <button class="dropdown-toggle" type="button" id="message" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-message"></i>
                    <span>3</span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="message">
                    <li>
                      <a href="#0">
                        <div class="image">
                          <img src="assets/images/lead/lead-5.png" alt="" />
                        </div>
                        <div class="content">
                          <h6>Jacob Jones</h6>
                          <p>Hey!I can across your profile and ...</p>
                          <span>10 mins ago</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#0">
                        <div class="image">
                          <img src="assets/images/lead/lead-3.png" alt="" />
                        </div>
                        <div class="content">
                          <h6>John Doe</h6>
                          <p>Would you mind please checking out</p>
                          <span>12 mins ago</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#0">
                        <div class="image">
                          <img src="assets/images/lead/lead-2.png" alt="" />
                        </div>
                        <div class="content">
                          <h6>Anee Lee</h6>
                          <p>Hey! are you available for freelance?</p>
                          <span>1h ago</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- message end -->
                <!-- filter start -->
                <div class="filter-box ml-15 d-none d-md-flex">
                  <button class="" type="button" id="filter">
                    <!-- <i class="lni lni-funnel"></i> -->
                    <i class="fa-solid fa-filter"></i>
                  </button>
                </div>
                <!-- filter end -->
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-info">
                      <div class="info">
                        <h6>John Doe</h6>
                        <div class="image">
                          <img src="{{asset('/image/profile.png')}}" alt="" />
                          <span class="status"></span>
                        </div>
                      </div>
                    </div>
                    <i class="fa-solid fa-caret-down "></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                    <li>
                      <a href="#0">
                        <i class="fa-solid fa-user me-2"></i> View Profile
                      </a>
                    </li>
                    <li>
                      <a href="#0">
                        <i class="fa-solid fa-bell me-2"></i> Notifications
                      </a>
                    </li>
                    <li>
                      <a href="#0"> <i class="fa-solid fa-message me-2"></i> Messages </a>
                    </li>
                    <li>
                      <a href="#0"> <i class="fa-solid fa-gear me-2"></i> Settings </a>
                    </li>
                    <li>
                      <!-- <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a> -->
                      <a href="#0" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>

                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>



      <!-- Modal -->
      <div class="follow-up-modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content card-style text-center">
              <div class="modal-body">
                <div class="image mb-30">
                  <i class="fa-solid fa-right-from-bracket" style="font-size: 72px;"></i>
                </div>
                <div class="content mb-30">
                  <h2 class="mb-15">Logout</h2>
                  <p class="text-sm text-medium">
                    Are you sure you want to log out?
                  </p>
                </div>
                <div class="action d-flex flex-wrap justify-content-center">
                  <a class="main-btn deactive-btn rounded-md square-btn btn-hover m-1 " data-bs-dismiss="modal">
                    Cancel
                  </a>
                  <a class="main-btn danger-btn rounded-md square-btn btn-hover m-1" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" type="button" class="btn btn-primary">Yes</a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ========== header end ========== -->