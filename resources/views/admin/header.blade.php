<!DOCTYPE html>
<html lang="en">
  <head>
<style>
.navbar .btn-logout {
  color: white;
  background-color: #dc3545;
  border-color: #dc3545;
}

.navbar .btn-logout:hover {
  background-color: #c82333;
  border-color: #bd2130;
}
</style>
  </head>
  <body><nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    
    <!-- Brand/Logo -->
    <a class="navbar-brand" href="{{ route('dashboard') }}">
      <img src="{{ asset('admin/assets/images/logo.svg') }}" alt="Logo" width="30" height="30">
      <span class="ms-2">Farm Management</span>
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="mdi mdi-speedometer me-1"></i> Dashboard
          </a>
        </li>

        <!-- Farmers Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="farmersDropdown" role="button" data-bs-toggle="dropdown">
            <i class="mdi mdi-account-cowboy-hat me-1"></i> Farmers
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('admin.farmer.registration') }}">Register New</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.farmers') }}">View All</a></li>
          </ul>
        </li>

        <!-- Analytics -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.analytics') }}">
            <i class="mdi mdi-chart-bar me-1"></i> Analytics
          </a>
        </li>

      </ul>

      <!-- Right-Aligned Features -->
      <ul class="navbar-nav ms-auto">
        
        <!-- Notifications -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="notificationsDropdown" role="button" data-bs-toggle="dropdown">
            <i class="mdi mdi-bell-outline"></i>
            <span class="badge bg-danger rounded-pill">3</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><h6 class="dropdown-header">Notifications</h6></li>
            <li><a class="dropdown-item" href="#">New farmer registered</a></li>
            <li><a class="dropdown-item" href="#">System alert</a></li>
          </ul>
        </li>

        <!-- User Profile -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" data-bs-toggle="dropdown">
            <i class="mdi mdi-account-circle me-1"></i> {{ Auth::user()->name }}
          </a>
       
            <li>
               <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn btn-danger ml-2">
        <i class="mdi mdi-logout"></i> Logout
      </button>
    </form>
            </li>
          </ul>
        </li>

        <!-- Quick Actions (Visible on Desktop) -->
        <li class="nav-item ms-2 d-none d-lg-block">
          <button class="btn btn-primary btn-sm">
            <i class="mdi mdi-plus"></i> Quick Task
          </button>
        </li>

      </ul>
    </div>
  </div>
</nav>
