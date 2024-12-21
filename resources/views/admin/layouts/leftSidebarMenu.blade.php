  <!-- Left Sidebar -->
  <aside id="leftsidebar" class="sidebar">
      <div class="navbar-brand">
          <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
          <a href="javascript:void(0);"><img src="{{ asset('assets/admin/images/logo.svg') }}" width="25"
                  alt="Aero"><span class="m-l-10">Aero</span></a>
      </div>
      <div class="menu">
          <ul class="list">
              <li>
                  <div class="user-info">
                      <a class="image" href="{{ route('profile') }}"><img
                              src="{{ asset('assets/admin/images/profile_av.jpg') }}" alt="User"></a>
                      <div class="detail">
                          <h4>Michael</h4>
                          <small>Super Admin</small>
                      </div>
                  </div>
              </li>
              <li class="active open"><a href="{{ route('admin.dashboard') }}"><i
                          class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
              {{-- <li><a href="javascript:void(0);" class="menu-toggle"><i
                          class="zmdi zmdi-hc-fw"></i><span>Members</span></a>
                  <ul class="ml-menu">
                      <li><a href="{{ route('user-list') }}">User List</a></li>
                      <li><a href="{{ route('block-user-list') }}">Block User List</a></li>
                  </ul>
              </li> --}}
              <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i>
                      <span>Address</span></a>
                  <ul class="ml-menu">
                      <li><a href="{{ route('address') }}">Address List</a></li>
                      <li><a href="">Address Create</a></li>
                      <li><a href="ticket-list.html">Unions List</a></li>
                  </ul>
              </li>
              <li class="active open">
                  <a href="{{ route('setting') }}">
                      <i class="zmdi zmdi-settings zmdi-hc-spin"></i><span>Dashboard</span></a>
              </li>
          </ul>
      </div>
  </aside>
