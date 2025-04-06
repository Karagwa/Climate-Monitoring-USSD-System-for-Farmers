<!-- This should be the only wrapper needed -->
<div class="wrapper d-flex">
  <!-- Sidebar - fixed position -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #e3f2fd; position: fixed; top: 0; left: 0; height: 100vh; overflow-y: auto; z-index: 100; width: 250px;">
    <div class="sidebar-header" style="padding: 20px; text-align: center;">
      <h4 style="margin: 0; color: #1976d2;">Farm Management</h4>
    </div>
    
    <ul class="nav flex-column" style="padding: 0 15px;">
      <li class="nav-item nav-category" style="margin-top: 10px;">
        <span class="nav-link" style="color: #1976d2; font-weight: 600;">Navigation</span>
      </li>
      
      <li class="nav-item menu-items" style="margin: 5px 0;">
        <a class="nav-link" href="{{ route('admin.farmer.registration') }}" style="color: #0d47a1; border-radius: 4px;">
          <span class="menu-icon">
            <i class="mdi mdi-account-plus" style="color: #1976d2;"></i>
          </span>
          <span class="menu-title">Farmer Registration</span>
        </a>
      </li>
      
      <li class="nav-item menu-items" style="margin: 5px 0;">
        <a class="nav-link" href="{{ route('admin.farmers') }}" style="color: #0d47a1; border-radius: 4px;">
          <span class="menu-icon">
            <i class="mdi mdi-table-large" style="color: #1976d2;"></i>
          </span>
          <span class="menu-title">Registered Farmers</span>
        </a>
      </li>
      
      <li class="nav-item menu-items" style="margin: 5px 0;">
        <a class="nav-link" href="{{ route('admin.analytics') }}" style="color: #0d47a1; border-radius: 4px;">
          <span class="menu-icon">
            <i class="mdi mdi-chart-bar" style="color: #1976d2;"></i>
          </span>
          <span class="menu-title">Analytics</span>
        </a>
      </li>
    </ul>
  </nav>