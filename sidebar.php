<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 bg-dark p-3 vh-100" style="width:250px; position: fixed; top: 0; left: 0;">

      <!-- Dashboard Heading -->
      <h3 class="text-warning mb-4 text-center mt-1">Distribution Management System</h3>

      <!-- Links -->
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link text-white bg-primary mb-1 rounded" href="dashboard.php">
            <i class="bi bi-house-door"></i> Dashboard
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white bg-primary mb-1 rounded" href="products.php">
            <i class="bi bi-house-door"></i> product management
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white bg-primary mb-1 rounded" href="orders.php">
            <i class="bi bi-people"></i> order management
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white bg-primary mb-1 rounded" href="inventory.php">
            <i class="bi bi-journal-bookmark"></i> Inventory management
          </a>
        </li>
        <li>
          <select name="sell" class="form-select mt-2 bg-primary text-white" onchange="window.location.href=this.value;">
            <option value="" disabled selected></i>&nbsp;Sell</option>
            <option value="add_sell.php">Add Sell</option>
            <option value="sell_details.php">Sell Details</option>
          </select>

        </li>

        <li class="nav-item mt-2">
          <a class="nav-link text-white bg-primary mb-1 rounded" href="sellers.php">
            <i class="bi bi-person-walking"></i> customers
          </a>
        </li>
        <li>
          <select name="sell" class="form-select mt-2 bg-primary text-white" onchange="window.location.href=this.value;">
            <option value="" disabled selected></i>&nbsp;Reports</option>
            <option value="customer_ledger.php">Customer ledger</option> 
          </select>

        </li>


      </ul>

    </div>