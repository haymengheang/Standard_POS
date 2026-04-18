@include('layouts.LinkHeader')
<!-- BEGIN: Custom Styles -->
<style data-purpose="layout-variables">
    :root {
      --primary-orange: #ff6b00;
      --primary-orange-hover: #e66000;
      --sidebar-bg: #ffffff;
      --main-bg: #f8f9fa;
      --text-main: #334155;
      --text-muted: #64748b;
      --border-color: #e2e8f0;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      background-color: var(--main-bg);
      color: var(--text-main);
      overflow-x: hidden;
    }
  </style>
<style data-purpose="sidebar-navigation">
    .sidebar {
      width: 260px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background-color: var(--sidebar-bg);
      border-right: 1px solid var(--border-color);
      z-index: 1000;
      padding: 1.5rem 1rem;
    }

    .nav-link {
      color: var(--text-muted);
      padding: 0.75rem 1rem;
      border-radius: 8px;
      margin-bottom: 0.25rem;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .nav-link:hover {
      background-color: #f1f5f9;
      color: var(--primary-orange);
    }

    .nav-link.active {
      background-color: #fff4ed;
      color: var(--primary-orange);
      font-weight: 600;
    }

    .sidebar-brand {
      font-weight: 700;
      font-size: 1.25rem;
      color: var(--primary-orange);
      margin-bottom: 2.5rem;
      padding-left: 1rem;
    }
  </style>
<style data-purpose="top-navigation">
    .top-navbar {
      margin-left: 260px;
      height: 70px;
      background-color: #fff;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 2rem;
      position: sticky;
      top: 0;
      z-index: 999;
    }

    .search-bar-top {
      width: 300px;
      position: relative;
    }

    .search-bar-top .form-control {
      background-color: #f1f5f9;
      border: none;
      padding-left: 2.5rem;
      border-radius: 10px;
    }

    .search-bar-top i {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
    }
  </style>
<style data-purpose="content-area">
    .main-wrapper {
      margin-left: 260px;
      padding: 2rem;
      min-height: calc(100vh - 120px);
    }

    .card {
      border: 1px solid var(--border-color);
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      border-radius: 12px;
      margin-bottom: 1.5rem;
    }

    .btn-orange {
      background-color: var(--primary-orange);
      color: white;
      border: none;
      padding: 0.6rem 1.25rem;
      border-radius: 8px;
      font-weight: 500;
      transition: background 0.2s;
    }

    .btn-orange:hover {
      background-color: var(--primary-orange-hover);
      color: white;
    }

    .table thead th {
      background-color: #f8fafc;
      color: var(--text-muted);
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.75rem;
      letter-spacing: 0.025em;
      border-bottom: 1px solid var(--border-color);
      padding: 1rem;
    }

    .table td {
      padding: 1rem;
      vertical-align: middle;
      font-size: 0.875rem;
    }

    .product-img {
      width: 40px;
      height: 40px;
      object-fit: cover;
      border-radius: 6px;
    }

    .badge-stock {
      padding: 0.35em 0.65em;
      font-size: 0.75em;
      border-radius: 6px;
    }
  </style>
<!-- END: Custom Styles -->
</head>
<body>
<!-- BEGIN: Sidebar -->
@include('layouts.LayoutHeader')
 <!-- END: Top Navigation -->
<!-- BEGIN: Main Content Area -->
    @yield('content')
<!-- BEGIN: Footer -->
@include('Layouts.Footer')
<script data-purpose="ui-interactivity">
    // Simple script to handle visual feedback on interactions
    document.addEventListener('DOMContentLoaded', function() {
      // Clear filters mock action
      const clearBtn = document.getElementById('clear-filters');
      if(clearBtn) {
        clearBtn.addEventListener('click', function(e) {
          e.preventDefault();
          document.querySelectorAll('select').forEach(sel => sel.selectedIndex = 0);
          document.querySelectorAll('input[type="text"]').forEach(input => input.value = '');
          console.log('Filters cleared');
        });
      }

      // Add product button log
      const addBtn = document.getElementById('add-product-btn');
      if(addBtn) {
        addBtn.addEventListener('click', function() {
          alert('Opening "Add New Product" modal...');
        });
      }
    });
  </script>
<!-- END: JavaScript Functionality -->
<!-- Bootstrap 5 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body></html>